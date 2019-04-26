const set_list_marcas = async ({commit}) => {
    const list = (await  axios.get('/marcas')).data;
    commit('SET_LIST_MARCAS',{list})
}


export default {
    set_list_marcas,
}