const setList = async ({commit}) => {
    const list = (await  http.get('bancos')).data;
    commit('SET_LIST_BANCOS',{list})
};

const get_list_bancos = ({commit}) => {

};

const save_form = ({ commit, dispatch }, banco) => {

    let response = false;

    if (banco.id) {
        response = http.put('bancos',banco);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('bancos',banco);
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
            let bancoRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('bancos',bancoRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const banco = obj;
    commit('VIEW',{banco});
};

const add = ({ commit }, banco ) => {
    commit('ADD',{banco});
};

export default {
    get_list_bancos,
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}