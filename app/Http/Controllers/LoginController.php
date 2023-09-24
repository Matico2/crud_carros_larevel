<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    // Método para exibir o formulário de registro de usuário
    public function showRegistrationForm()
    {
        return view('registration'); // Substitua 'registration' pelo nome da sua view de registro
    }

    // Método para processar o formulário de registro de usuário
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('welcome'); // Substitua 'welcome' pela rota de boas-vindas
    }

    // Método para exibir o formulário de recuperação de senha
    public function showPasswordResetForm()
    {
        return view('password.reset'); // Substitua 'password.reset' pelo nome da sua view de recuperação de senha
    }

    // Método para processar a solicitação de recuperação de senha
    public function sendPasswordResetLink(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // Método para lidar com a autenticação de usuário
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('welcome'); // Substitua 'welcome' pela rota de boas-vindas
        }

        return back()->withErrors([
            'email' => 'Email ou senha inválidos',
        ])->onlyInput('email');
    }
}


    

