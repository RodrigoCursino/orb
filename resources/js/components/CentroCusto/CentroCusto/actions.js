const setList = async ({commit}) => {
    const list = (await  http.get('centroscusto')).data;
    commit('SET_LIST_CENTRO_CUSTO',{list})
};

const save_form = ({ commit, dispatch }, centro_custo) => {

    let response = false;

    if (centro_custo.id) {
        response = http.put('centroscusto',centro_custo);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('centroscusto',centro_custo);

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
            let centro_custoRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('centroscusto',centro_custoRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');

};

const view = ({ commit },obj) => {
    const centro_custo = obj;
    commit('VIEW',{centro_custo});
};

const add = ({ commit }, centro_custo ) => {
    commit('ADD',{centro_custo});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}