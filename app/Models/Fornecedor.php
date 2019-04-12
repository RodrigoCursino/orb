<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'fornecedores';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'ie',
        'observacao',
        'forn_mercadoria'
    ];

    public function contato ()
    {
       return $this->belongsTo(Contato::class);
    }

    public function endereco ()
    {
       return $this->belongsTo(Endereco::class);
    }

    public function dadosBancarios ()
    {
       return $this->belongsTo(DadosBancarios::class);
    }
}
