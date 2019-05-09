const SET_LIST_CENTRO_CUSTO = (state, obj) => {
    state.list_centro_custos = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.centro_custo       = obj.centro_custo;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.centro_custo = obj.centro_custo;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_CENTRO_CUSTO,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
}