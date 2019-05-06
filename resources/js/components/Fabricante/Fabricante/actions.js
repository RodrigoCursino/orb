const setList = async ({ commit }) => {
    const list = (await http.get('fabricantes')).data;
    commit('SET_LIST_FABRICANTES',{list});
};

const save_form = ({ commit, dispatch }, fabricante) => {

    let response = false;

    if (fabricante.id) {
        response = http.put('fabricantes',fabricante);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('fabricantes',fabricante);

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
            (await http.deleteForm('fabricantes',fabricanteRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');

};

const view = ({ commit },obj) => {
    const fabricante = obj;
    commit('VIEW',{fabricante});
};

const add = ({ commit }, fabricante ) => {
    commit('ADD',{fabricante});
};


export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}