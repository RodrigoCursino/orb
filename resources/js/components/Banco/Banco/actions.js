import axios from 'axios'

const get_list_bancos = async ({ commit }) => {
    const list = (await axios.get('/bancos')).data;
    console.log('Bancos', list);
    commit('SET_LIST_BANCOS',{list})
};

export default {
    get_list_bancos
}