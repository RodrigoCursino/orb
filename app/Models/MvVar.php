<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MvVar extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'mv_var';
    protected $fillable = [
        'id',
        'mercadoria_variacao_id',
        'variacao_id'
    ];
}
