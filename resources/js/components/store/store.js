import Vue                from 'vue'
import Vuex               from 'vuex'

/**
 * importação de modulos
**/

import Banco              from '../Banco/Banco'
import Departamento       from '../Departamento/Departamento'
import Cargo              from '../Cargo/Cargo'
import CentroCusto        from '../CentroCusto/CentroCusto'
import Linha              from '../Linha/Linha'
import Marca              from '../Marca/Marca'
import UnidadeCaixa       from '../UnidadeCaixa/UnidadeCaixa'
import UnidadeMedida      from '../UnidadeMedida/UnidadeMedida'
import Unidade            from '../Unidade/Unidade'
import Grupo              from '../Grupo/Grupo'
import SubGrupo           from '../SubGrupo/SubGrupo'
import NCM                from '../NCM/NCM'
import Categoria          from '../Categoria/Categoria'
import Colecao            from '../Colecao/Colecao'
import Fabricante         from '../Fabricante/Fabricante'
import Fornecedor         from '../Fornecedor/Fornecedor'
import Funcionario        from '../Funcionario/Funcionario'
import Endereco           from '../shared/EnderecoForm/Endereco'
import Contato            from '../shared/ContatoForm/Contato'
import Mercadoria         from '../Mercadoria/Mercadoria'
import DadosBancarios     from '../shared/DadosBancariosForm/DadosBancarios'
import Main               from '../Main/store'

Vue.use(Vuex);

const modules = {
    Banco,
    Categoria,
    Cargo,
    CentroCusto,
    Colecao,
    Contato,
    Departamento,
    DadosBancarios,
    Endereco,
    Fabricante,
    Fornecedor,
    Funcionario,
    Grupo,
    Linha,
    Main,
    Marca,
    Mercadoria,
    NCM,
    SubGrupo,
    Unidade,
    UnidadeCaixa,
    UnidadeMedida
};

const store = new Vuex.Store({
    modules
});

export default store