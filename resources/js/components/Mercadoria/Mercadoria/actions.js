const set_list_mercadorias = async  ({commit}) => {
    const list = (await  axios.get('/mercadorias')).data;
    commit ('SET_LIST_MERCADORIA',{list})
}

const open_form_mercadoria = ({commit}) => {
    commit('OPEN_FORM_MERCADORIA')
}

export default {
    set_list_mercadorias,
    open_form_mercadoria
}