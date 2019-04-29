const set_list_linhas = async ({commit}) => {
    const list = (await  http.get('linhas')).data;
    commit('SET_LIST_LINHAS',{list})
}


export default {
    set_list_linhas,
}