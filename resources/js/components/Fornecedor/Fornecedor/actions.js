// import axios from 'axios';

const setList = async ({ commit }) => {
    const list = (await axios.get('/fornecedores')).data;
    commit('SET_LIST_FORNECEDORES',{list});
};

const save_fornecedor = async ({ commit }, fornecedor) => {
    let fornecedorRequest = JSON.parse(JSON.stringify(fornecedor));
    const saved = (await axios.put(`/fornecedores/${fornecedorRequest}`,fornecedorRequest));
    if(saved.status === 200) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "success",
            buttons: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    commit('CLOSE_VIEW_FORNECEDOR');
                }
            });
    }

}

const viewFornecedor = ({ commit },obj) => {
    const fornecedor = obj;
    commit('VIEW_FORNECEDOR',{fornecedor});
};

const set_fornecedor = ({ commit }, fornecedor) => {
    commit('SET_FORNECEDOR',{fornecedor});
};

export default {
    setList,
    set_fornecedor,
    viewFornecedor,
    save_fornecedor
}