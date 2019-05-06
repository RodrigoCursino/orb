<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrecoCusto extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'preco_custo';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'valor',
        'data'
    ];
}
