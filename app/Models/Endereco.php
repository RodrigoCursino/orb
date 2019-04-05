<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'enderecos';

    protected $fillable = [
        "logradouro",
        "numero",
        "bairro",
        "complemento",
        "cep",
        "cidade",
        "estado"
    ];
}
