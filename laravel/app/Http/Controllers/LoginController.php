<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('tasks');
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

        
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            
            return redirect()->route('tasks.index')->with('success', 'Login realizado com sucesso!');
        }

        
        return back()->withErrors([
            'name' => 'Nome ou senha incorretos.',
        ]);
    }

    
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks', ['tasks' => $tasks]);
    }
}
