const setList = async ({ commit }) => {
    const list = (await http.get('unidades')).data;
    commit('SET_LIST_UNIDADES',{list});
};

const getEstoqueList = async ({ commit }) => {
    const list = (await http.get('unidades-estoque')).data;
    commit('SET_LIST_UNIDADES_ESTOQUE',{list});
};

const save_form = ({ commit, dispatch }, unidade) => {

    let response = false;

    if (unidade.id) {
        response = http.put('unidades',unidade);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('unidades',unidade);
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
             let unidadeRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('unidades',unidadeRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const unidade = obj;
    commit('VIEW',{unidade});
};

const add = ({ commit }, unidade ) => {
    commit('ADD',{unidade});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    getEstoqueList,
    add
}