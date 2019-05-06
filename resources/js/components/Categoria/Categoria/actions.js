const setList = async ({commit}) => {
    const list = (await  http.get('categorias')).data;
    commit('SET_LIST_CATEGORIAS',{list})
}

const save_form = ({ commit, dispatch }, categoria) => {

    let response = false;

    debugger;
    if (categoria.id) {
        response = http.put('categorias',categoria);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('categorias',categoria);

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
            let categoriaRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('categorias',categoriaRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');

};

const view = ({ commit },obj) => {
    const categoria = obj;
    commit('VIEW',{categoria});
};

const add = ({ commit }, categoria ) => {
    commit('ADD',{categoria});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}