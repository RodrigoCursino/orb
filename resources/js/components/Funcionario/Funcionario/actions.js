const setList = async ({ commit }) => {
    const list = (await http.get('funcionarios')).data;
    commit('SET_LIST_FUNCIONARIOS',{list});
};

const save_form = ({ commit, dispatch }, form) => {

    let response = false;

    if (form.id) {
        response = http.put('funcionarios',form);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('funcionarios',form);

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
            let fabricanteRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('funcionarios',fabricanteRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');

};

const view = ({ commit },obj) => {
    const form = obj;
    commit('VIEW',{form});
};

const add = ({ commit }, form ) => {
    commit('ADD',{form});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}