const setList = async ({commit}) => {
    const list = (await  http.get('grupos')).data;
    commit('SET_LIST_GRUPOS',{list})
};

const save_form = ({ commit, dispatch }, grupo) => {

    let response = false;

    if (grupo.id) {
        response = http.put('grupos',grupo);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('grupos',grupo);
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
            let grupoRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('grupos',grupoRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const grupo = obj;
    commit('VIEW',{grupo});
};

const add = ({ commit }, grupo ) => {
    commit('ADD',{grupo});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}