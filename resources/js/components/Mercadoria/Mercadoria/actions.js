const set_list_mercadorias = async  ({commit}) => {
    const list = (await  http.get('mercadorias')).data;
    commit ('SET_LIST_MERCADORIA',{list})
}

const save_mercadoria = async ({commit, dispatch}, mercadoria) => {
    const saved  = (await http.post('mercadorias',mercadoria));
    if(saved.status === 201) {
        dispatch('open_form_mercadoria');
        dispatch('set_list_mercadorias');
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