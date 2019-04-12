<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabricante extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'fabricantes';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'nome',
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'ie',
        'observacao',
        'natureza_juridica'
    ];

    public function contato ()
    {
        return $this->belongsTo(Contato::class);
    }

    public function endereco ()
    {
        return $this->belongsTo(Endereco::class);
    }
}
