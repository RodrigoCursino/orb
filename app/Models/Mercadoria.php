<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mercadoria extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'mercadorias';

    protected $fillable = [
       'nome',
       'ncm',
       'unidade_medida',
       'unidade_caixa',
       'observacao'
    ];

    public function precoVenda()
    {
        return $this->hasMany(PrecoVenda::class)->with('observacoes');
    }

    public function subGrupo()
    {
        return $this->belongsTo(SubGrupo::class);
    }

    public function precoCusto()
    {
        return $this->hasMany(PrecoCusto::class);
    }
}
