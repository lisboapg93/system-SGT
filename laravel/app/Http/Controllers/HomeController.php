<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        // Validação dos dados de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tenta autenticar o usuário com as credenciais fornecidas
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Redireciona para a rota 'tasks' se o login for bem-sucedido
            return redirect()->route('tasks')->with('success', 'Login realizado com sucesso!');
        }

        
        return back()->withErrors([
            'name' => 'Nome ou senha incorreto.',
        ]);
    }

    public function logout(Request $request)
    {
    Auth::logout(); // Desloga o usuário

    // Invalida a sessão e gera um novo token CSRF
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // Redireciona para a página de login
}

    
}
