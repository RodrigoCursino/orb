import axios from 'axios'

const setList = async ({ commit }, obj ) => {
    const list = (await axios.get('/fornecedores')).data
    commit('SET_LIST_FORNECEDORES',{list})
};

const viewFornecedor = ({ commit },obj) => {
    const fornecedor = obj
    commit('VIEW_FORNECEDOR',{fornecedor})
};

export default {
    setList,
    viewFornecedor
}