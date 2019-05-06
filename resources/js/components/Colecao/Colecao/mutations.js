const SET_LIST_COLECOES = (state, list) => {
    console.log('coleção ', list.list);
    state.listColeoces = list.list;
}


export default {
    SET_LIST_COLECOES,
}