<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'grupos';

    protected $dates = ['deleted_at'];

    protected $fillable = [
       'id',
       'nome',
       'ncm',
       'observacao'
    ];

    public function ncm()
    {
      return $this->belongsTo(NCM::class);
    }

}
