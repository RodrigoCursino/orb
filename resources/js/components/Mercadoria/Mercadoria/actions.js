const set_list_mercadorias = async  ({commit}) => {
    const list = (await  axios.get('/mercadorias')).data;
    commit ('SET_LIST_MERCADORIA',{list})
}

const save_mercadoria = async ({commit, dispatch}, mercadoria) => {
    let MercadoriaRequest = JSON.parse(JSON.stringify(mercadoria));
    const saved  = (await axios.post('/mercadorias',MercadoriaRequest));
    if(saved.status === 201) {
        swal({
            title: "Operação realizada com sucesso",
            text: "O fornecedor foi editado com sucesso!!!",
            icon: "success"
        }).then((willDelete) => {
            if (willDelete) {
                dispatch('open_form_mercadoria');
                dispatch('set_list_mercadorias');
            }
        });
    }
}

const open_form_mercadoria = ({commit}) => {
    commit('OPEN_FORM_MERCADORIA')
}

export default {
    set_list_mercadorias,
    save_mercadoria,
    open_form_mercadoria
}