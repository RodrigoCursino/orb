
const setList = async ({ commit }) => {
    const list = (await http.get('unidades')).data;
    commit('SET_LIST_UNIDADES',{list});
};



export default {
    setList,
}