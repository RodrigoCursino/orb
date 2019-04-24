const SET_LIST_MERCADORIA = (state, list) => {
    state.list_mercadorias = list.list;
}

const OPEN_FORM_MERCADORIA = (state) => {
    state.openFormMercadoria = !state.openFormMercadoria;
}

export default {
    SET_LIST_MERCADORIA,
    OPEN_FORM_MERCADORIA
}