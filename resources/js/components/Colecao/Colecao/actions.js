const set_list_colecoes = async ({commit}) => {
    const list = (await  axios.get('/colecoes')).data;
    commit('SET_LIST_COLECOES',{list})
}


export default {
    set_list_colecoes,
}