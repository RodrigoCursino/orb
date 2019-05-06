<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentroCusto extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'centro_custo';

    protected $fillable = [
        'id',
        'nome'
    ];

    public function dadosBancarios()
    {
       return $this->belongsTo(DadosBancarios::class);
    }
}
