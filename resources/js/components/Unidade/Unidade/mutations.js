const SET_LIST_UNIDADES = (state, obj) => {
    state.list_unidades = obj.list;
};

const SET_LIST_UNIDADES_ESTOQUE = (state, obj) => {
    state.list_unidades_estoque = obj.list;
}

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.unidade      = obj.unidade;
}

const DELETED = (state) => {
    state.deleted = !state.deleted;
}

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
}

const ADD = (state, obj) => {
    state.unidade = obj.unidade;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
}



export default {
    SET_LIST_UNIDADES,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    SET_LIST_UNIDADES_ESTOQUE,
    CLOSE_VIEW,
}