const set_list_grupos = async ({commit}) => {
    const list = (await  axios.get('/grupos')).data;
    commit('SET_LIST_GRUPOS',{list})
}


export default {
    set_list_grupos,
}