<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();

        return view('FuncionarioList')->with(['funcionarios' => $funcionarios]);
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('FuncionarioForm')->with(['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:120',
            'telefone' => 'required|max:20',
            'email' => 'required|max:100',
            'categoria_id' => 'required',
            'data' => 'required|date',
            'imagem' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $dados = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
            'data' => $request->data,
        ];

        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        Funcionario::create($dados);

        return redirect('funcionario')->with('success', 'Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('FuncionarioForm')->with([
            'funcionario' => $funcionario,
            'categorias' => $categorias,
        ]);
    }

    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('FuncionarioForm')->with([
            'funcionario' => $funcionario,
            'categorias' => $categorias,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:120',
            'telefone' => 'required|max:20',
            'email' => 'required|max:100',
            'categoria_id' => 'required',
            'data' => 'required|date',
            'imagem' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $dados =  [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
            'data' => $request->data,
        ];

        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        Funcionario::updateOrCreate(
            ['id' => $id],
            $dados
        );

        return redirect('funcionario')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        if (!empty($funcionario->imagem)) {
            if (Storage::disk('public')->exists($funcionario->imagem)) {
                Storage::disk('public')->delete($funcionario->imagem);
            }
        }

        $funcionario->delete();

        return redirect('funcionario')->with('success', 'Removido com sucesso!');
    }

    public function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $funcionarios = Funcionario::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $funcionarios = Funcionario::all();
        }

        return view('FuncionarioList')->with(['funcionarios' => $funcionarios]);
    }
}
