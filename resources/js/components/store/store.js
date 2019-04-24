import Vue                from 'vue'
import Vuex               from 'vuex'

/**
 * importação de modulos
**/

import Banco              from '../Banco/Banco'
import Fornecedor         from '../Fornecedor/Fornecedor'
import Endereco           from '../shared/EnderecoForm/Endereco'
import Contato            from '../shared/ContatoForm/Contato'
import Mercadoria         from '../Mercadoria/Mercadoria'
import DadosBancarios     from '../shared/DadosBancariosForm/DadosBancarios'
import Main               from '../Main/store'

Vue.use(Vuex);

const modules = {
    Banco,
    Fornecedor,
    Main,
    Endereco,
    Contato,
    DadosBancarios,
    Mercadoria
};

const store = new Vuex.Store({
    modules
});

export default store