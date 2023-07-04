<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('ProdutoList')->with(['produtos' => $produtos]);
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('ProdutoForm')->with(['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate(Produto::rules(), Produto::messages());

        $dados = $request->except('imagem');
        $dados['data'] = $request->input('data');
        $dados['hora'] = $request->input('hora');

        $imagem = $request->file('imagem');
        $diretorio = 'imagem/';

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        Produto::create($dados);

        return redirect('produto')->with('success', 'Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('ProdutoForm')->with([
            'produto' => $produto,
            'categorias' => $categorias,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(Produto::rules(), Produto::messages());

        $dados = $request->except(['imagem', '_method', '_token']);
        $dados['data'] = $request->input('data');
        $dados['hora'] = $request->input('hora');

        $produto = Produto::findOrFail($id);

        $imagem = $request->file('imagem');
        $diretorio = 'imagem/';

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        if (!empty($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->update($dados);

        return redirect('produto')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        if (!empty($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect('produto')->with('success', 'Removido com sucesso!');
    }

    public function search(Request $request)
    {
        $campo = $request->input('campo');
        $valor = $request->input('valor');

        if ($campo === 'nome') {
            $produtos = Produto::where('nome', 'like', "%$valor%")->get();
        } elseif ($campo === 'telefone') {
            $produtos = Produto::where('telefone', 'like', "%$valor%")->get();
        } else {
            $produtos = Produto::all();
        }

        return view('ProdutoList')->with(['produtos' => $produtos]);
    }
}
