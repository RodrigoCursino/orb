const set_list_unidades_caixa = async ({commit}) => {
    const list = (await  http.get('unidadescaixa')).data;
    commit('SET_LIST_UNIDADES_CAIXA',{list})
}


export default {
    set_list_unidades_caixa,
}