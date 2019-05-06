const setList = async ({commit}) => {
    const list = (await  http.get('colecoes')).data;
    commit('SET_LIST_COLECOES',{list})
};

const save_form = ({ commit, dispatch }, colecao) => {

    let response = false;

    if (colecao.id) {
        response = http.put('colecoes',colecao);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('colecoes',colecao);
    }

    if(response) {
        commit('CLOSE_FORM');
        dispatch('setList');
    }
};

const close_form = ({commit}) => {
    commit('CLOSE_FORM');
};

const delete_form = ({commit,dispatch}, array) => {

    commit('DELETED');

    swal({
        title: "Você tem certeza?",
        text: "Cuidado você está prestes a deletar estes dados!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(async (willDelete) => {
        for (let i in array) {
            let colecaoRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('colecoes',colecaoRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const colecao = obj;
    commit('VIEW',{colecao});
};

const add = ({ commit }, colecao ) => {
    commit('ADD',{colecao});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}