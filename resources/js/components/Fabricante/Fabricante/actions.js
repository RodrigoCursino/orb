
const setList = async ({ commit }) => {
    const list = (await http.get('fabricantes')).data;
    commit('SET_LIST_FABRICANTES',{list});
};



export default {
    setList,
}