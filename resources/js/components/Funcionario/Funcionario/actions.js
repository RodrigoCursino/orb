
const setList = async ({ commit }) => {
    const list = (await http.get('funcionarios')).data;
    commit('SET_LIST_FUNCIONARIOS',{list});
};



export default {
    setList,
}