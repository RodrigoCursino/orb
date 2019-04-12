<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NCM extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'ncm';

    protected $fillable = [
        'id',
        'nome',
        'descricao'
    ];

    public static function list($columns = ['*'])
    {
        return parent::all($columns)->where('ativo','=',1);
    }
}
