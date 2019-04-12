<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaPreco extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'tabela_preco';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'descricao',
        'observacao',
        'desconto_maximo',
        'validade'
    ];
}
