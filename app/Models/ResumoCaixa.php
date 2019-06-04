<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResumoCaixa extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'resumo_caixa';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'nome',
        'ativo'
    ];
}
