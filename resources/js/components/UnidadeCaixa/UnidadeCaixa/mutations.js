const SET_LIST_UNIDADES_VAREJO = (state, obj) => {
    state.list_unidades_varejo = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.unidade_varejo   = obj.unidade_varejo;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.unidade_varejo = obj.unidade_varejo;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_UNIDADES_VAREJO,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};