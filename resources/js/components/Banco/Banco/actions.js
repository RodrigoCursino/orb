import axios from 'axios'

const get_list_bancos = async ({ commit }) => {
    const list = (await http.get('bancos')).data;
    commit('SET_LIST_BANCOS',{list})
};

export default {
    get_list_bancos
}