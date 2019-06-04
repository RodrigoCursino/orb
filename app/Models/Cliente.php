<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'clientes';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'nome',
        'natureza_juridica',
        'nome_fantasia',
        'data_nascimento',
        'classificacao',
        'observacao',
        'ativo',
        'contato_id',
        'endereco_id',
        'unidade_id',
    ];
}
