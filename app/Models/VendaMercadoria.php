<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendaMercadoria extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'venda_mercadoria';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'quantidade',
        'venda_id',
        'mercadoria_id'
    ];
}
