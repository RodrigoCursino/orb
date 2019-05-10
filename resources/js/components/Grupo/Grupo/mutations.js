const SET_LIST_GRUPOS = (state, obj) => {
    state.list_grupos = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.grupo           = obj.grupo;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.grupo = obj.grupo;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_GRUPOS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};