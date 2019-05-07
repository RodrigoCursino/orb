const SET_LIST_LINHAS = (state, obj) => {
    state.list_linhas = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.linha       = obj.linha;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.linha = obj.linha;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_LINHAS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};