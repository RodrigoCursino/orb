const setList = async ({commit}) => {
    const list = (await  http.get('linhas')).data;
    commit('SET_LIST_LINHAS',{list})
};

const save_form = ({ commit, dispatch }, linha) => {

    let response = false;

    if (linha.id) {
        response = http.put('linhas',linha);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('linhas',linha);
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
            let linhaRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('linhas',linhaRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const linha = obj;
    commit('VIEW',{linha});
};

const add = ({ commit }, linha ) => {
    commit('ADD',{linha});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}