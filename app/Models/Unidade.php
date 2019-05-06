<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes, TmontecHelper;

    protected $dates = ['deleted_at'];

    protected $table = 'unidades';

    protected $fillable = [
        'id',
        'nome',
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'ie',
        'loja',
        'observacao',
        'natureza_juridica'
    ];

    public function centroCusto ()
    {
        return $this->belongsTo(CentroCusto::class);
    }

    public function contato ()
    {
        return $this->belongsTo(Contato::class);
    }

    public function endereco ()
    {
        return $this->belongsTo(Endereco::class);
    }


}
