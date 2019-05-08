<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banco extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'bancos';

    protected $fillable = [
        'nome',
        'cod'
    ];
}
