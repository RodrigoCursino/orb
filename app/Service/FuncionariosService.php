<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 29/03/2019
 * Time: 14:26
 */

namespace App\Service;



use App\Http\Requests\FuncionariosCreateRequest;
use App\Models\Departamento;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\Unidade;
use App\Traits\DadosComunsCadastro;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class FuncionariosService
{
    public function create(FuncionariosCreateRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $dados_bancario = DadosComunsCadastro::saveDadosBancarios($request);
            $endereco       = DadosComunsCadastro::saveEndereco($request);
            $contato        = DadosComunsCadastro::saveContato($request);
            $departamentoId = str_replace("'","",$request->input('departamento_select'));

            $funcionario = new Funcionario();

            $funcionario->nome               = $request->input('nome_funcionario');
            $funcionario->data_nascimento    = $request->input('data_nascimento');
            $funcionario->cargo_id           = $request->input('cargo_id');
            $funcionario->salario            = $request->input('salario');
            $funcionario->apelido            = $request->input('apelido');
            $funcionario->rg                 = $request->input('rg');
            $funcionario->cpf                = $request->input('cpf');
            $funcionario->sexo               = $request->input('sexo');
            $funcionario->estado_civil       = $request->input('estado_civil');
            $funcionario->login              = $request->input('login');
            $funcionario->senha              = $request->input('senha');
            $funcionario->observacao         = $request->input('observacao');
            $unidade                         = Unidade::findOrfail($request->input('unidade_id'));
            $funcionario->unidade_id         = $unidade->id;
            $departamento                    = Departamento::findOrFail($departamentoId);
            $funcionario->departamento_id    = $departamento->id;
            $funcionario->endereco_id        = $endereco->id;
            $funcionario->contato_id         = $contato->id;
            $funcionario->dados_bancarios_id = $dados_bancario->id;

            $funcionario->save();

            return $funcionario;
        });
    }


    public function update(FuncionariosCreateRequest $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            //Fornecedor
            $funcionario = Funcionario::findOrFail($id);

            $departamentoId                 = str_replace("'","",$request->input('departamento_select'));


            $funcionario->nome              = $request->input('nome_funcionario');
            $funcionario->data_nascimento   = $request->input('data_nascimento');
            $funcionario->cargo_id          = $request->input('cargo_id');
            $funcionario->salario           = $request->input('salario');
            $funcionario->apelido           = $request->input('apelido');
            $funcionario->rg                = $request->input('rg');
            $funcionario->cpf               = $request->input('cpf');
            $funcionario->sexo              = $request->input('sexo');
            $funcionario->estado_civil      = $request->input('estado_civil');
            $funcionario->login             = $request->input('login');
            $funcionario->senha             = $request->input('senha');
            $funcionario->observacao        = $request->input('observacao');
            $unidade                        = Unidade::findOrfail($request->input('unidade_id'));
            $funcionario->unidade_id        = $unidade->id;
            $departamento                   = Departamento::findOrFail($departamentoId);
            $funcionario->departamento_id   = $departamento->id;

            $funcionario->save();

            // Endereco
            DadosComunsCadastro::findEndereco($request, $funcionario->endereco_id);

            //Contato
            DadosComunsCadastro::findContato($request, $funcionario->contato_id);

            // Dados Bancários
            DadosComunsCadastro::findDadosBancarios($request, $funcionario->dados_bancarios_id);

            return $funcionario;

        });

    }

    public function destroy($id)
    {

      return DB::transaction(function () use ($id) {
       $funcionario = Funcionario::findOrFail($id);

       // Contato
       DadosComunsCadastro::deleteContato($funcionario->contato_id);

       // Endereco
       DadosComunsCadastro::deleteEndereco($funcionario->endereco_id);

       // Dados Bancários
       DadosComunsCadastro::deleteDadosBancarios($funcionario->dados_bancarios_id);

       $funcionario->ativo = 0;
       $funcionario->save();

       return true;

      });
    }
}