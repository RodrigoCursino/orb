<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'contatos';

    protected $fillable = [
        "nome",
        "telefone",
        "celular",
        "email"
    ];
}
