<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaPreco extends Model
{
    use SoftDeletes;
    protected $table = 'tabela_preco';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'descricao',
        'observacao',
        'desconto_maximo',
        'validade'
    ];
}
