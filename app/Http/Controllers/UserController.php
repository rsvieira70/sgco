<?php

namespace App\Http\Controllers;

use App\Class\Useful;
use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\NewUser;
use App\Models\Position;
use App\Notifications\SystemErrorAlert;
use App\Rules\FullName;
use App\Rules\TenantUnique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $title =  __('List of users');
        $userAuth = Auth()->User();
        $users = NewUser::orderBy('name', 'asc')->get();
        return view('users.index', compact('title', 'userAuth', 'users'));
    }
    public function create()
    {
        $title =  __('New user registration');
        $userAuth = Auth()->User();
        $positions = Position::orderBy('description', 'asc')->get();
        $departments = Department::orderBy('description', 'asc')->get();
        return view('users.create', compact('title', 'userAuth', 'positions', 'departments'));
    }
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        db::beginTransaction();
        try {
            NewUser::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('User') . __(' successfully added!'));
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('user');
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('users.index');
        }
    }
    public function show($id)
    {
        $user = NewUser::with(['Department', 'Position', 'Tenant'])->find($id);
        
        if ($user) {
            $user->social_security_number = Useful::class::ssn($user->social_security_number);
            $user->zip_code = Useful::class::zip_code($user->zip_code);
            $user->telephone = Useful::class::phone($user->telephone);
            $user->cell_phone = Useful::class::phone($user->cell_phone);
            $user->whatsapp = Useful::class::phone($user->whatsapp);
            $user->telegram = Useful::class::phone($user->telegram);
            $title =  __('User show');
            $userAuth = Auth()->User();
            return view('users.show', compact('title', 'userAuth', 'user'));
        }
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user = NewUser::find($id);
        if ($user) {
            $title =  __('User update');
            $userAuth = Auth()->User();
            $positions = Position::orderBy('description', 'asc')->get();
            $departments = Department::orderBy('description', 'asc')->get();
            return view('users.edit', compact('title', 'userAuth', 'user', 'positions', 'departments'));
        }
        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(!$request->get('administrative_responsible')){ $data['administrative_responsible'] = null; }
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
                'password_confirmation',
                'administrative_responsible'
            ]);
            if(!$request->get('administrative_responsible')){ $data['administrative_responsible'] = null; }
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
                        'administrative_responsible' =>['nullable', new TenantUnique('users',$id)]
                    ],
                    [],
                    [
                        'name' => __('Name'),
                        'email' => __('Email'),
                        'user_note' => __('User note'),
                        'user_type' => __('Type user'),
                        'department_id' => __('department'),
                        'position_id' => __('position'),
                        'registration_date' => __('Registration date'),
                        'administrative_responsible' => __('Administrative responsible')
                        ]
                );
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->user_note = $data['user_note'];
                $user->user_type = $data['user_type'];
                $user->department_id = $data['department_id'];
                $user->position_id = $data['position_id'];
                $user->registration_date = $data['registration_date'];
                $user->administrative_responsible = $data['administrative_responsible'];
            } else {
                $validator = Validator::make(
                    $data,
                    [
                        'name' => ['required', 'string', 'max:60', new FullName()],
                        'email' => ['required', 'string', 'email', 'max:100', "unique:users,email,{$id}"],
                        'user_note' => ['nullable', 'string'],
                        'administrative_responsible' =>['nullable', new TenantUnique('users',$id)]
                    ],
                    [],
                    [
                        'name' => __('Name'),
                        'email' => __('Email'),
                        'user_note' => __('User note'),
                        'administrative_responsible' => __('Administrative responsible')
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
                return redirect()->route('users.edit', $id)->withErrors($validator);
            };
        };
        db::beginTransaction();
        try {
            $user->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('User') . __(' successfully changed!'));
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('user') . ' -> ' . __('Key') . ' ' . $id;
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('users.index');
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
            if ($user->suspension_date == null) {
                Alert::alert()->success(__('Reactivated'), __('User') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('User') . __(' successfully suspended!'));
            }
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('user') . ' -> ' . __('Key') . ' ' . $id;
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('users.index');
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
                Alert::alert()->success(__('Excluded'), __('User') . __(' successfully deleted!'));
                return redirect()->route('users.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' ' . __('user') . ' -> ' . __('Key') . ' ' . $id;
            $users = NewUser::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('users.index');
        }
    }
}
