<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'departamento';

    protected $fillable = [
        'id',
        'nome',
        'descricao'
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
