const set_list_sub_grupos = async ({commit}, id) => {
    console.log('grupo', id);
    const list = (await  axios.get(`/subgrupos/${id}`)).data;
    commit('SET_LIST_SUB_GRUPOS',{list})
}


export default {
    set_list_sub_grupos,
}