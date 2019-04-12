<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'categoria';

    protected $fillable = [
        'id',
        'nome'
    ];

    public static function list($columns = ['*'])
    {
        return parent::all($columns)->where('ativo','=',1);
    }
}
