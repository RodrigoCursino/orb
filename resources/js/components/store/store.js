import Vue                from 'vue'
import Vuex               from 'vuex'

/**
 * importação de modulos
**/

import Banco              from '../Banco/Banco'
import Grupo              from '../Grupo/Grupo'
import SubGrupo           from '../SubGrupo/SubGrupo'
import NCM                from '../NCM/NCM'
import Categoria          from '../Categoria/Categoria'
import Colecao            from '../Colecao/Colecao'
import Fornecedor         from '../Fornecedor/Fornecedor'
import Endereco           from '../shared/EnderecoForm/Endereco'
import Contato            from '../shared/ContatoForm/Contato'
import Mercadoria         from '../Mercadoria/Mercadoria'
import DadosBancarios     from '../shared/DadosBancariosForm/DadosBancarios'
import Main               from '../Main/store'

Vue.use(Vuex);

const modules = {
    Banco,
    Categoria,
    Colecao,
    Fornecedor,
    Grupo,
    DadosBancarios,
    Endereco,
    Contato,
    Main,
    Mercadoria,
    NCM,
    SubGrupo
};

const store = new Vuex.Store({
    modules
});

export default store