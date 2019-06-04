<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPagamento extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'forma_pagamento';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'codigo',
        'nome_tipo',
        'taxa_desconto',
        'dias_credito',
        'observacao',
        'id_pai',
        'cod_forma',
        'nome_ecf',
        'taxa_desc',
        'porc_entrada',
        'quant_parcela',
        'intervalo',
        'dia_mes',
        'cheque',
        'crediario',
        'troca',
        'desconto',
        'contacontabil_id',
        'resumocaixa_id',
    ];
}
