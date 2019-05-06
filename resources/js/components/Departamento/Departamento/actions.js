
const setList = async ({ commit }) => {
    const list = (await http.get('departamentos')).data;
    commit('SET_LIST_DEPARTAMENTOS',{list});
};

const get_departamentos_by_unidade = async ({commit}, id) => {
    const list = (await  http.get(`departamentos/${id}`)).data;
    commit('GET_DEPARATAMENTOS_BY_UNIDADE',{list})
}

const save_form = ({ commit, dispatch }, fabricante) => {

    let response = false;

    if (fabricante.id) {
        response = http.put('departamentos',fabricante);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('departamentos',fabricante);

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
            (await http.deleteForm('departamentos',fabricanteRequest));
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
    get_departamentos_by_unidade,
    save_form,
    close_form,
    delete_form,
    view,
    add
}