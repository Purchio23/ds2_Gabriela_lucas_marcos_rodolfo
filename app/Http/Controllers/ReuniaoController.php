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
        $request->validate(Reuniao::rules(), Reuniao::messages());

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

    public function update(Request $request, $id)
    {
        $request->validate(Reuniao::rules(), Reuniao::messages());

        $dados = $request->except(['imagem', '_method', '_token']);
        $dados['data'] = $request->input('data');
        $dados['hora'] = $request->input('hora');

        $reuniao = Reuniao::findOrFail($id);

        $imagem = $request->file('imagem');
        $diretorio = 'imagem/';

        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        if (!empty($reuniao->imagem)) {
            Storage::disk('public')->delete($reuniao->imagem);
        }

        $reuniao->update($dados);

        return redirect('reuniao')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $reuniao = Reuniao::findOrFail($id);

        if (!empty($reuniao->imagem)) {
            Storage::disk('public')->delete($reuniao->imagem);
        }

        $reuniao->delete();

        return redirect('reuniao')->with('success', 'Removido com sucesso!');
    }

    public function search(Request $request)
    {
        $campo = $request->input('campo');
        $valor = $request->input('valor');

        if ($campo === 'nome') {
            $reuniaos = Reuniao::where('nome', 'like', "%$valor%")->get();
        } elseif ($campo === 'telefone') {
            $reuniaos = Reuniao::where('telefone', 'like', "%$valor%")->get();
        } else {
            $reuniaos = Reuniao::all();
        }

        return view('ReuniaoList')->with(['reuniaos' => $reuniaos]);
    }
}
