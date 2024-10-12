<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateAccount extends Controller
{
    public function index()
    {
        return view('createaccount');
    }

    public function create(Request $request)
    {
        // Valida os dados de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Cria um novo usuário
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash para a senha
        ]);

        // Redireciona ou retorna uma resposta
        return redirect()->route('home')->with('success', 'Conta criada com sucesso!');
    }
}
