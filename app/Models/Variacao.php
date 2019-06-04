<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variacao extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'variacao';
    protected $fillable = [
        'id',
        'descricao',
        'id_pai',
        'ativo',
    ];
}
