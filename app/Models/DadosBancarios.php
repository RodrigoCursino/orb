<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DadosBancarios extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'dados_bancarios';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'agencia',
        'conta'
    ];
}
