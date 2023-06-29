<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reuniao;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ReuniaoController extends Controller
{
    public function index()
    {
        $reuniaos = Reuniao::all();

        return view('ReuniaoList')->with(['reuniaos' => $reuniaos]);
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('ReuniaoForm')->with(['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:120',
            'telefone' => 'required|max:20',
            'email' => 'required|max:100',
            'categoria_id' => 'required',
            'imagem' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $imagem = $request->file('imagem');
        $nome_arquivo = '';

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        $dados = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
            'imagem' => $diretorio . $nome_arquivo,
        ];

        Reuniao::create($dados);

        return redirect('reuniao')->with('success', 'Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $reuniao = Reuniao::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('ReuniaoForm')->with([
            'reuniao' => $reuniao,
            'categorias' => $categorias,
        ]);
    }

    public function show($id)
    {
        $reuniao = Reuniao::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('ReuniaoForm')->with([
            'reuniao' => $reuniao,
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
            'imagem' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $dados =  [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
        ];

        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        Reuniao::updateOrCreate(
            ['id' => $id],
            $dados
        );

        return redirect('reuniao')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $reuniao = Reuniao::findOrFail($id);

        if (!empty($reuniao->imagem)) {
            if (Storage::disk('public')->exists($reuniao->imagem)) {
                Storage::disk('public')->delete($reuniao->imagem);
            }
        }

        $reuniao->delete();

        return redirect('reuniao')->with('success', 'Removido com sucesso!');
    }

    public function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $reuniaos = Reuniao::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $reuniaos = Reuniao::all();
        }

        return view('ReuniaoList')->with(['reuniaos' => $reuniaos]);
    }
}
