<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;
    protected $table = 'grupos';

    protected $dates = ['deleted_at'];

    protected $fillable = [
       'nome',
       'ncm',
       'observacao'
    ];
}
