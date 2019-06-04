<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'vendas';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'codigo_venda',
        'estacao',
        'caixa',
        'func_cancelamento',
        'motivo_cancelamento',
        'situacao',
        'data',
        'cliente_id',
        'funcionario_id',
        'unidade_id',
    ];
}
