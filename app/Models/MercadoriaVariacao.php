<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MercadoriaVariacao extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'mercadoria_variacao';
    protected $fillable = [
        'id',
        'codigo_ean',
        'imagem',
        'descricao',
        'ativo',
        'mercadoria_id'
    ];
}
