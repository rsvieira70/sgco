<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use App\Models\NewUser;
use App\Models\Position;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Notifications\SystemErrorAlert;
use App\Rules\FullName;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title =  __('List of users');
        $reference = __('User');
        $userAuth = Auth()->User();
        $users = NewUser::orderBy('name', 'asc')->get();
        return view('users.index', compact('title', 'reference', 'userAuth', 'users'));
    }
    public function create()
    {
        $title =  __('New user registration');
        $reference = __('user');
        $userAuth = Auth()->User();
        $positions = Position::orderBy('description', 'asc')->get();
        $departments = Department::orderBy('description', 'asc')->get();
        return view('users.create', compact('title', 'reference', 'userAuth', 'positions', 'departments'));
    }
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        db::beginTransaction();
        try {
            NewUser::create($data);
            db::commit();
            return redirect()->route('users.index')->with('alert', 'store-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('user');
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('users.create')->with('alert', 'errors');
        }
    }
    public function show($id)
    {
        $user = NewUser::with(['Department', 'Position'])->find($id);
        if ($user) {
            $title =  __('User show');
            $reference = __('user');
            $userAuth = Auth()->User();
            return view('users.show', compact('title', 'reference', 'userAuth', 'user'));
        }
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user = NewUser::find($id);
        if ($user) {
            $title =  __('User update');
            $reference = __('user');
            $userAuth = Auth()->User();
            $positions = Position::orderBy('description', 'asc')->get();
            $departments = Department::orderBy('description', 'asc')->get();
            return view('users.edit', compact('title', 'reference', 'userAuth', 'user', 'positions', 'departments'));
        }
        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = NewUser::find($id);
        if ($user) {
            $data = $request->only([
                'name',
                'department_id',
                'position_id',
                'registration_date',
                'user_type',
                'user_note',
                'email',
                'password',
                'password_confirmation'
            ]);
            if ($user->user_type == 2 || $user->user_type == 3) {
                $validator = Validator::make(
                    $data,
                    [
                        'name' => ['required', 'string', 'max:60', new FullName],
                        'email' => ['required', 'string', 'email', 'max:100', "unique:users,email,{$id}"],
                        'user_note' => ['nullable', 'string'],
                        'user_type' => ['required'],
                        'department_id' => ['required', 'min:1'],
                        'position_id' => ['required', 'min:1'],
                        'registration_date' => ['required', 'date'],
                    ],
                    [],
                    [
                        'name' => __('Name'),
                        'email' => __('Email'),
                        'user_note' => __('User note'),
                        'user_type' => __('Type user'),
                        'department_id' => __('department'),
                        'position_id' => __('position'),
                        'registration_date' => __('Registration date')
                    ]
                );
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->user_note = $data['user_note'];
                $user->user_type = $data['user_type'];
                $user->department_id = $data['department_id'];
                $user->position_id = $data['position_id'];
                $user->registration_date = $data['registration_date'];
            } else {
                $validator = Validator::make(
                    $data,
                    [
                        'name' => ['required', 'string', 'max:60', new FullName()],
                        'email' => ['required', 'string', 'email', 'max:100', "unique:users,email,{$id}"],
                        'user_note' => ['nullable', 'string'],
                    ],
                    [],
                    [
                        'name' => __('Name'),
                        'email' => __('Email'),
                        'user_note' => __('User note')
                    ]
                );
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->user_note = $data['user_note'];
            };
            if (!empty($data['password'])) {
                if (strlen($data['password']) >= 8) {
                    if ($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => __('Password'),
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => __('Password'),
                        'min' => 8
                    ]));
                }
            };
            if (count($validator->errors()) > 0) {
                return redirect()->route('users.edit', ['user' => $id])->withErrors($validator);
            };
        };
        db::beginTransaction();
        try {
            $user->save();
            db::commit();
            return redirect()->route('users.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('user') . ' -> ' . __('Key') . ' ' . $id;
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('users.edit')->with('alert', 'errors');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $user = NewUser::find($id);
            if ($user->suspension_date == null) {
                $user->suspension_date = now();
            } else {
                $user->suspension_date = null;
            }
            $user->save();

            db::commit();
            return redirect()->route('users.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('user') . ' -> ' . __('Key') . ' ' . $id;
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('users.index')->with('alert', 'errors');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $user = NewUser::findOrFail($id);
            if ($user) {
                $user->delete();
                db::commit();
                return redirect()->route('users.index')->with('alert', 'destroy-ok');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' ' . __('user') . ' -> ' . __('Key') . ' ' . $id;
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('users.index')->with('alert', 'errors');
        }
    }
}
