<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function show()
    {
        return view('public.contato');
    }

    public function index()
    {
        return view('public.contato');
    }

    public function enviar(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensagem' => 'required|string',
        ]);

        // Aqui você pode enviar email, salvar no banco ou o que preferir.
        // Por enquanto, vamos só retornar uma mensagem de sucesso.

        return redirect()->route('contato.show')->with('success', 'Mensagem enviada com sucesso!');
    }
}
