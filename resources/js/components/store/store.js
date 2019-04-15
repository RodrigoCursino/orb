import Vue                from 'vue'
import Vuex               from 'vuex'
import Fornecedor         from '../Fornecedor/Fornecedor'
import Endereco           from '../shared/EnderecoForm/Endereco'
import Main               from '../Main/store'

Vue.use(Vuex)

const modules = {
    Fornecedor,
    Main,
    Endereco
};

const store = new Vuex.Store({
    modules
});

export default store