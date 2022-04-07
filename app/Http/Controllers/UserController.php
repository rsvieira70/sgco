<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Relação de usuários';
        $referencia = 'usuário';
        $userAuth = Auth()->User();
        $users = User::with(['profile', 'workuser'])->get();
        $loggedId = intval(Auth::id());
        return view('users.index', [
            'title' => $title,
            'referencia' => $referencia,
            'userAuth' => $userAuth,
            'users' => $users,
            'loggedId' => $loggedId
        ]);
    }
    public function create()
    {
        $title = 'Cadastro de novo usuário';
        $referencia = 'usuário';
        $cargos = Cargo::orderBy('descricao','asc')->get();
        $departamentos = Departamento::orderBy('descricao','asc')->get();
        $userAuth = Auth()->User();
        return view('users.create', [
            'title' => $title,
            'referencia' => $referencia,
            'departamentos' => $departamentos,
            'cargos' => $cargos,
            'userAuth' => $userAuth
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['role'] = 'user';
        dd($data);
        db::beginTransaction();
        try {
            $user = User::create($data['user']);
            $user->profile()->create(['nomesocial' => '']);
            $user->workuser()->create($data['workuser']);
        
            db::commit();
            return redirect()->route('users.index')->with('alert', 'store-ok');
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $user = User::find($id);
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
        $user = User::find($id);
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
                $hasEmail = User::where('email', $data['email'])->get();
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
            $user = User::find($id);
            $user->delete();
        }
        return redirect()->route('users.index')->with('alert', 'destroy-ok');
    }
    public function suspend($id)
    {
        //
    }

}
