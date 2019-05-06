
const setList = async ({ commit }) => {
    const list = (await http.get('fornecedores')).data;
    commit('SET_LIST_FORNECEDORES',{list});
};

const save_fornecedor = ({ commit, dispatch }, fornecedor) => {

    let response = false;

    if (fornecedor.id) {
        response = http.put('fornecedores',fornecedor);
        commit('CLOSE_VIEW_FORNECEDOR');
    } else {
        response = http.post('fornecedores',fornecedor);
    }

    if(response) {
        commit('CLOSE_FORM_FORNECEDOR');
        dispatch('setList');
    }
};

const close_form = ({commit}) => {
    commit('CLOSE_FORM_FORNECEDOR');
}

const delete_fornecedor = ({commit,dispatch}, array) => {

    commit('DELETED');

    swal({
        title: "Você tem certeza?",
        text: "Cuidado você está prestes a deletar estes dados!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(async (willDelete) => {
        for (let i in array) {
            let fornecedorRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('fornecedores',fornecedorRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');

};

const viewFornecedor = ({ commit },obj) => {
    const fornecedor = obj;
    commit('VIEW_FORNECEDOR',{fornecedor});
};

const add_fornecedor = ({ commit }, fornecedor ) => {
    console.log(fornecedor);
    commit('ADD_FORNECEDOR',{fornecedor});
};

const set_endereco = ({ commit }, endereco ) => {
    commit('SET_ENDERECO',{endereco});
};


const set_fornecedor = ({ commit }, fornecedor) => {
    commit('SET_FORNECEDOR',{fornecedor});
};

export default {
    setList,
    set_fornecedor,
    viewFornecedor,
    save_fornecedor,
    delete_fornecedor,
    set_endereco,
    add_fornecedor,
    close_form
}