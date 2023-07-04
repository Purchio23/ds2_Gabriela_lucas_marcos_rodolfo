<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::all();

        return view('CurriculumList')->with(['curriculums' => $curriculums]);
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('CurriculumForm')->with(['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate(
            Curriculum::rules(),
            Curriculum::messages()
        );

        //adiciono os dados do formulário ao vetor
        $dados = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'idade' => $request->idade,
        ];

        $imagem = $request->file('imagem');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        //passa o vetor com os dados do formulário como parametro para ser salvo
        Curriculum::create($dados);

        return redirect('curriculum')->with('success', 'Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('CurriculumForm')->with([
            'curriculum' => $curriculum,
            'categorias' => $categorias,
        ]);
    }

    public function show($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('CurriculumForm')->with([
            'curriculum' => $curriculum,
            'categorias' => $categorias,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate(
            Curriculum::rules(),
            Curriculum::messages()
        );

        //adiciono os dados do formulário ao vetor
        $dados =  [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'idade' => $request->idade,
        ];

        $imagem = $request->file('imagem');
        //verifica se o campo imagem foi passado uma imagem
        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        //metodo para atualizar passando o vetor com os dados do form e o id
        Curriculum::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('curriculum')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        if (!empty($curriculum->imagem)) {
            if (Storage::disk('public')->exists($curriculum->imagem)) {
                Storage::disk('public')->delete($curriculum->imagem);
            }
        }

        $curriculum->delete();

        return redirect('curriculum')->with('success', 'Removido com sucesso!');
    }

    public function search(Request $request)
    {
        $campo = $request->campo;
        $valor = $request->valor;

        $curriculums = Curriculum::when($campo, function ($query) use ($campo, $valor) {
            if ($campo === 'nome') {
                $query->where('nome', 'like', '%' . $valor . '%');
            } elseif ($campo === 'telefone') {
                $query->where('telefone', 'like', '%' . $valor . '%');
            } elseif ($campo === 'email') {
                $query->where('email', 'like', '%' . $valor . '%');
            }
        })->get();

        return view('CurriculumList')->with(['curriculums' => $curriculums]);
    }
}
