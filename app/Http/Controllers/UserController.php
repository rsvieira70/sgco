<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Models\NewUser;
use App\Models\Position;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Notifications\SystemErrorAlert;


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
        db::beginTransaction();
        try {
            NewUser::create($data);
            db::commit();
            return redirect()->route('users.index')->with('alert', 'store-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' '. __('user');
            $users = NewUser::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('users.create')->with('alert', 'errors');
        }
    }





    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $user = NewUser::find($id);
        if ($user) {
            $title = 'Alteração de usuário';
            $referencia = 'usuário';
            $userAuth = Auth()->User();
            return view('users.edit', [
                'title' => $title,
                'referencia' => $referencia,
                'userAuth' => $userAuth,
                'user' => $user
            ]);
        }
        return redirect()->route('users.index');
    }
    public function update(Request $request, $id)
    {
        $user = NewUser::find($id);
        if ($user) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);
            $validator = Validator::make(
                $data,
                [
                    'name' => ['required', 'string', 'max:50'],
                    'email' => ['required', 'string', 'email', 'max:100']
                ],
                [],
                [
                    'name' => 'Nome',
                    'email' => 'E-mail'
                ]
            );
            $user->name = $data['name'];
            if ($user->email != $data['email']) {
                $hasEmail = NewUser::where('email', $data['email'])->get();
                if (count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', ['attribute' => 'E-mail']));
                }
            }
            if (!empty($data['password'])) {
                if (strlen($data['password']) >= 4) {
                    if ($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'Senha',
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'Senha',
                        'min' => 4
                    ]));
                }
            }
            if (count($validator->errors()) > 0) {
                return redirect()->route('users.edit', ['user' => $id])->withErrors($validator);
            }
            $user->save();
            return redirect()->route('users.index')->with('alert', 'update-ok');
        } else {
            return redirect()->route('users.index')->with('alert', 'update-erro');
        }
    }

    public function destroy($id)
    {
        $loggedId = intval(Auth::id());
        if ($loggedId !== intval($id)) {
            $user = NewUser::find($id);
            $user->delete();
        }
        return redirect()->route('users.index')->with('alert', 'destroy-ok');
    }
    public function suspend($id)
    {
        //
    }
}
