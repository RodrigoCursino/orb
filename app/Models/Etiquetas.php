<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etiquetas extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'etiquetas';
    protected $fillable = [
        'id',
        'nome',
        'observacao',
        'ativo',
        'mercadoria_variacao_id'
    ];
}
