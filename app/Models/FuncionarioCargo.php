<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncionarioCargo extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'funcionario_cargo';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'funcionario_id',
        'cargo_id',
        'ativo'
    ];
}
