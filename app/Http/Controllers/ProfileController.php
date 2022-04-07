<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Perfil do usuário';
        $referencia = 'usuário';
        $userAuth = Auth()->User();
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);
        if ($user) {
            return view('profile.index', [
                'title' => $title,
                'referencia' => $referencia,
                'userAuth' => $userAuth,
                'user' => $user
            ]);
        }
        return redirect()->route('home');
    }
    public function save(Request $request)
    {
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);
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
                    'email' => ['required', 'string', 'email:rfc,dns', 'max:100']
                ],
                [],
                [
                    'name' => 'Nome',
                    'email' => 'E-mail'
                ]
            );
            $user->name = ucwords(strtolower($data['name']));
            if ($user->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();
                if (count($hasEmail) === 0) {
                    $user->email = strtolower($data['email']);
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
                return redirect()->route('profile', ['user' => $loggedId])->withErrors($validator);
            }
            $user->save();
            return redirect()->route('profile')->with('alert', 'ok');
        } else {
            return redirect()->route('profile')->with('alert', 'erro');
        }
    }
}
