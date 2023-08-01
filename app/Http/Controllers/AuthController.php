<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        private User $user,
        private Perfil $perfil
    ) {
    }

    public function create()
    {
        $id_perfil = request('id_perfil');
        $v['title'] = 'Criar Usuário';
        $v['perfis'] = $this->perfil->selectListId($id_perfil);
        return view('user.create', $v);
    }

    public function store(LoginRequest $req)
    {
        try {
            $user = $this->user->newInstance();
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = Hash::make($req->input('password'));
            $user->id_perfil = $req->input('id_perfil');
            if ($user->save()) {
                return redirect()->route('user.login')
                    ->with('success', 'Usuário registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário: ' . $ex->getMessage());
        }
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
    }

    public function show()
    {
        $v['user'] = $this->user->find(Auth::id());
        return view('user.show', $v);
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
        }
    }
}
