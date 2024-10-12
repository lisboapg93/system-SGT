<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('tasks'); // Assumindo que você tenha uma view chamada 'login'
    }

    // Método para processar o login
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

        // Tentativa de autenticação
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Redireciona para a rota 'tasks.index' se o login for bem-sucedido
            return redirect()->route('tasks.index')->with('success', 'Login realizado com sucesso!');
        }

        // Retorna com erro caso as credenciais sejam inválidas
        return back()->withErrors([
            'name' => 'Nome ou senha incorreto.',
        ]);
    }

    // Método para listar tarefas (exemplo de como o método index poderia ser estruturado)
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks', ['tasks' => $tasks]);
    }
}
