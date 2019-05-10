const setList = async ({commit}) => {
    const list = (await  http.get('cargos')).data;
    commit('SET_LIST_CARGOS',{list})
};

const save_form = ({ commit, dispatch }, cargo) => {

    let response = false;

    if (cargo.id) {
        response = http.put('cargos',cargo);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('cargos',cargo);
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
            let cargoRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('cargos',cargoRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const cargo = obj;
    commit('VIEW',{cargo});
};

const add = ({ commit }, cargo ) => {
    commit('ADD',{cargo});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}