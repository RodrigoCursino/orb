<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DadosBancarios extends Model
{
    use SoftDeletes;
    protected $table = 'dados_bancarios';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'agencia',
        'conta'
    ];
}
