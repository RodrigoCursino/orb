const SET_LIST_FUNCIONARIOS = (state, obj) => {
    state.list_funcionarios = obj.list;
};

const VIEW = (state, obj) => {
    console.log('obj ', obj);
    state.view_controller  = !state.view_controller;
    state.funcionario      = obj.form;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.funcionario = obj.form;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_FUNCIONARIOS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
}