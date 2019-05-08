const SET_LIST_DEPARTAMENTOS = (state, obj) => {
    state.list_departamentos = obj.list;
};

const GET_DEPARATAMENTOS_BY_UNIDADE = (state, obj) => {
    state.list_departamentos = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.cargo      = obj.cargo;
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
    SET_LIST_DEPARTAMENTOS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
    GET_DEPARATAMENTOS_BY_UNIDADE
}