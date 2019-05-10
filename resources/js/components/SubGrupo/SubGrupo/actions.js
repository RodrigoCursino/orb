const setList = async ({commit}) => {
    const list = (await  http.get(`subgrupos`)).data;
    commit('SET_LIST_SUB_GRUPOS',{list})
}

const set_list_sub_grupos = async ({commit}, id) => {
    const list = (await  http.get(`subgrupos/${id}`)).data;
    commit('SET_LIST_SUB_GRUPOS',{list})
}


export default {
    set_list_sub_grupos,
    setList
}