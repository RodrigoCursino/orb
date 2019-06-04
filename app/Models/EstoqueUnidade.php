<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstoqueUnidade extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'estoque_unidade';
    protected $fillable = [
        'id',
        'estoque',
        'estoque_min',
        'estoque_max',
        'unidade_id',
        'mercadoria_id'
    ];
}
