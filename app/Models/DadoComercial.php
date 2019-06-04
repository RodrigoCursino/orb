<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DadoComercial extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'dados_comerciais';
    protected $fillable = [
        'id',
        'empregador',
        'funcao',
        'telefone',
        'admissao',
        'cliente_id'
    ];
}
