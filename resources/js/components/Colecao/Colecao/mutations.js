const SET_LIST_COLECOES = (state, obj) => {
    state.list_colecoes = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.colecao         = obj.colecao;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.colecao = obj.colecao;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_COLECOES,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};