const setList = async ({commit}) => {
    const list = (await  http.get('unidades-varejo')).data;
    commit('SET_LIST_UNIDADES_VAREJO',{list})
};

const save_form = ({ commit, dispatch }, unidadeCaixa) => {

    let response = false;

    if (unidadeCaixa.id) {
        response = http.put('unidades-varejo',unidadeCaixa);
        commit('CLOSE_VIEW');
    } else {
        response = http.post('unidades-varejo',unidadeCaixa);
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
            let unidadeCaixaRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('unidades-varejo',unidadeCaixaRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const unidadeVarejo = obj;
    commit('VIEW',{unidadeVarejo});
};

const add = ({ commit }, unidadeVarejo ) => {
    commit('ADD',{unidadeVarejo});
};

export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add
}