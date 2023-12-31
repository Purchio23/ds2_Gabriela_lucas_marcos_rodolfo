<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = "funcionario";

    protected $fillable = [
        'nome', 'telefone', 'email','categoria_id', 'imagem','data'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id','id');
    }

    public static function rules(){
        return  [
            'nome' => 'required | max: 120',
            'telefone' => 'required | max: 20',
            'email' => ' required | max: 100',
            'categoria_id' => ' nullable',
            'imagem' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'data' => 'required|date',
        ];
    }

    public static function messages(){
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'Só é permitido 120 caracteres',
            'telefone.required' => 'O telefone é obrigatório',
            'telefone.max' => 'Só é permitido 20 caracteres',
            'email.max' => 'Só é permitido 100 caracteres',
            'categoria_id.required' => 'O salário é obrigatório',
            'imagem.required' => 'A imagem é obrigatória',
            'data.required' => 'A data é obrigatória',
        ];
    }

}
