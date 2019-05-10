const SET_LIST_MERCADORIAS = (state, obj) => {
    state.list_mercadorias = obj.list;
};

const SET_LIST_PRICE_BY_MERCADORIA = (state, obj) => {
    state.list_price = obj.list;
}

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.mercadoria      = obj.mercadoria;
}

const DELETED = (state) => {
    state.deleted = !state.deleted;
}

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
}

const ADD = (state, obj) => {
    state.mercadoria = obj.mercadoria;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
}



export default {
    SET_LIST_MERCADORIAS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
    SET_LIST_PRICE_BY_MERCADORIA
}