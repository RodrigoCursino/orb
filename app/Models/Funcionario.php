<?php

namespace App\Models;

use App\Traits\TmontecHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes, TmontecHelper;
    protected $table = 'funcionarios';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'salario',
        'nome',
        'apelido',
        'data_nascimento',
        'rg',
        'cpf',
        'estado_civil',
        'sexo',
        'observacao',
        'senha',
        'login'
    ];

    protected $hidden = [
        'senha',
        'login'
    ];


    public function unidade ()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function cargo ()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function departamento ()
    {
        return $this->belongsTo(Departamento::class);
    }


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
