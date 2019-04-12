<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubGrupo extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];
    protected $table = 'sub_grupos';

    protected $fillable = [
        'nome'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
