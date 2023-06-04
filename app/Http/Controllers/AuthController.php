<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct(
        private User $user
    ) {
    }

    public function create()
    {

        $v['title'] = 'Criar Usuário';
        return view('user.create', $v);
    }

    public function store(LoginRequest $req)
    {
        try {
            $user = $this->user->newInstance();
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = Hash::make($req->input('password'));
            if ($user->save()) {
                return redirect()->route('user.login')
                    ->with('success', 'Usuário registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
    }

    public function login()
    {
        $v['title'] = 'Login';

        return view('user.login', $v);
    }


    public function autenticar(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('user.login');
    }

    public function enviarEmailForm()
    {
        return view('user.enviar_email');
    }

    public function enviarEmail(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            $idUser = $user->id;
            return redirect()->route('user.trocar.senha.get', ['id' => $idUser]);
        } else {
            return redirect()->back()->with('error', 'O email não está registrado.');
        }
    }

    public function trocarSenhaForm($id)
    {
        $v ['title'] = 'Trocar Senha';
        return view('user.trocar_senha');
    }

    public function trocarSenha(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->password = Hash::make($request->input('password'));
            if ($user->save()) {
                return redirect()->route('user.login');
            }
        } catch (\Exception $ex) {
            redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $ex->getMessage());
            dump($ex->getMessage());
        }
    }
}
