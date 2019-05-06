const set_list_unidades_medida = async ({commit}) => {
    const list = (await  http.get('unidadesmedida')).data;
    commit('SET_LIST_UNIDADES_MEDIDA',{list})
}


export default {
    set_list_unidades_medida,
}