<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubGrupo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'sub_grupos';

    protected $fillable = [
        'nome'
    ];
}
