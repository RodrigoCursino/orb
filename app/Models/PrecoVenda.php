<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrecoVenda extends Model
{
    use SoftDeletes;
    protected $table = 'preco_venda';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'valor',
        'data',
    ];

    public function observacoes()
    {
      return $this->belongsTo(TabelaPreco::class,'tabela_preco_id');
    }
}
