import axios from 'axios';

const setList = async ({ commit }) => {
    const list = (await axios.get('/fornecedores')).data;
    commit('SET_LIST_FORNECEDORES',{list});
};

const viewFornecedor = ({ commit },obj) => {
    const fornecedor = obj;
    commit('VIEW_FORNECEDOR',{fornecedor});
};

const set_fornecedor = ({ commit }, fornecedor) => {
    commit('SET_FORNECEDOR',{fornecedor});
};

export default {
    setList,
    set_fornecedor,
    viewFornecedor
}