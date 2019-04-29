const set_list_categorias = async ({commit}) => {
    const list = (await  http.get('categorias')).data;
    commit('SET_LIST_CATEGORIAS',{list})
}


export default {
    set_list_categorias,
}