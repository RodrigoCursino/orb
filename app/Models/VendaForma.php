<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendaForma extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $table = 'venda_forma';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'venda_id',
        'forma_pagamento_id'
    ];
}
