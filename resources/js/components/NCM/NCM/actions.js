const set_list_ncms = async ({commit}) => {
    const list = (await  http.get('ncms')).data;
    commit('SET_LIST_NCMS',{list})
}


export default {
    set_list_ncms,
}