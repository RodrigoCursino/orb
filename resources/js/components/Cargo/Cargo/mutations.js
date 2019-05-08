const SET_LIST_CARGOS = (state, obj) => {
    state.list_cargos = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.cargo           = obj.cargo;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.cargo = obj.cargo;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_CARGOS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
}