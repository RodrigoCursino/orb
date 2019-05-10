const SET_LIST_BANCOS = (state, obj) => {
    state.list_bancos = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.banco           = obj.banco;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.banco = obj.banco;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_BANCOS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};