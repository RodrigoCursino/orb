<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'marca';

    protected $fillable = [
        'id',
        'nome'
    ];

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

}
