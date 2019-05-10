const SET_LIST_MARCAS = (state, obj) => {
    state.list_marcas = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.marca       = obj.marca;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.marca = obj.marca;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_MARCAS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};