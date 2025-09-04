<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class ClientController extends Controller
{
   
public function index()
{
    $clients = Client::all();
    return view('users.index', compact('clients'));
}

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cep' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|string|size:2',
        ]);

        Client::create($request->all());

        return redirect()->route('client.index')
                         ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function buscarCep(Request $request)
{
    $cep = $request->input('cep');
    $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

    if ($response->successful() && !$response->json('erro')) {
        return response()->json($response->json());
    } else {
        return response()->json(['erro' => 'CEP não encontrado'], 404);
    }
}

   
}
