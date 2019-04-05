import Vue                from 'vue'
import Vuex               from 'vuex'
import Fornecedor   from '../Fornecedor/Fornecedor'
import Main               from '../Main/store'

Vue.use(Vuex)

const modules = {
    Fornecedor,
    Main,
};

const store = new Vuex.Store({
    modules
});

export default store