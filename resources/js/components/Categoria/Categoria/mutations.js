const SET_LIST_CATEGORIAS = (state, obj) => {
    state.list_categorias = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.categoria       = obj.categoria;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.categoria = obj.categoria;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_CATEGORIAS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};