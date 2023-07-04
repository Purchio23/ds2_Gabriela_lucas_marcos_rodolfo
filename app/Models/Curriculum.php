<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $table = "Curriculum";

    protected $fillable = [
        'nome', 'telefone', 'email', 'idade', 'imagem'
    ];

    public static function rules()
    {
        return  [
            'nome' => 'required|max:120',
            'telefone' => 'required|max:20',
            'email' => 'required|email|max:100',
            'idade' => 'required|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public static function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'Só é permitido 120 caracteres',
            'telefone.required' => 'O telefone é obrigatório',
            'telefone.max' => 'Só é permitido 20 caracteres',
            'idade.required' => 'A idade é obrigatória',
            'idade.max' => 'Só é permitido 100 caracteres',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser válido',
            'email.max' => 'Só é permitido 100 caracteres',
            'imagem.image' => 'A imagem deve ser um arquivo de imagem válido',
            'imagem.mimes' => 'A imagem deve estar no formato JPEG, JPG ou PNG',
            'imagem.max' => 'O tamanho máximo da imagem é 2048KB',
        ];
    }
}
