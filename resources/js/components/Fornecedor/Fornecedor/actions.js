// import axios from 'axios';

const setList = async ({ commit }) => {
    const list = (await axios.get('/fornecedores')).data;
    commit('SET_LIST_FORNECEDORES',{list});
};

const save_fornecedor = async ({ commit, dispatch }, fornecedor) => {
    let fornecedorRequest = JSON.parse(JSON.stringify(fornecedor));

    let saved = 0;

    if (fornecedor.id == 0) {
        saved = (await axios.post(`/fornecedores`,fornecedorRequest));
    } else {
        saved = (await axios.put(`/fornecedores/${fornecedorRequest}`,fornecedorRequest));
    }


    if(saved.status === 200) {
        swal({
            title: "Operação realizada com sucesso",
            text: "O fornecedor foi editado com sucesso!!!",
            icon: "success",
            buttons: true,
        }).then((willDelete) => {
                if (willDelete) {
                    commit('CLOSE_VIEW_FORNECEDOR');
                }
            });
    } else if (saved.status === 201) {
        swal({
            title: "Operação realizada com sucesso",
            text: "O fornecedor foi salvo com sucesso!!!",
            icon: "success",
            buttons: true,
        }).then((willDelete) => {
            if (willDelete) {
                dispatch('setList');
                commit('CLOSE_FORM_FORNECEDOR')
            }
        });
    }

};

const close_form = ({commit}) => {
    commit('CLOSE_FORM_FORNECEDOR');
}

const delete_fornecedor = async ({commit,dispatch}, array) => {
    commit('DELETED');
    for (let i in array) {
        let fornecedorRequest = JSON.parse(JSON.stringify(array[i].id));
        const saved = (await axios.delete(`/fornecedores/${fornecedorRequest}`,fornecedorRequest));
    }
    dispatch('setList');
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