const setList = async ({commit}) => {
    const list = (await  http.get('marcas')).data;
    commit('SET_LIST_MARCAS',{list})
};

const save_form = ({ commit, dispatch }, marca) => {

    let response = false;

    if (marca.id) {
        response = http.put('marcas',marca);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('marcas',marca);
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
            let marcaRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('marcas',marcaRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const marca = obj;
    commit('VIEW',{marca});
};

const add = ({ commit }, marca ) => {
    commit('ADD',{marca});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}