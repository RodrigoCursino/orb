const setList = async ({commit}) => {
    const list = (await  http.get('ncms')).data;
    commit('SET_LIST_NCMS',{list})
};

const save_form = ({ commit, dispatch }, ncm) => {

    let response = false;

    if (ncm.id) {
        response = http.put('ncms',ncm);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('ncms',ncm);
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
            let ncmRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('ncms',ncmRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const ncm = obj;
    commit('VIEW',{ncm});
};

const add = ({ commit }, ncm ) => {
    commit('ADD',{ncm});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}