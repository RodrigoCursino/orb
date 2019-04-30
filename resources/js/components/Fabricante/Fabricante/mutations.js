const SET_LIST_FABRICANTES = (state, obj) => {
    state.list_fabricantes = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.fabricante      = obj.fabricante;
}

const DELETED = (state) => {
    state.deleted = !state.deleted;
}

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
}

const ADD = (state, obj) => {
    state.fabricante = obj.fabricante;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
}



export default {
    SET_LIST_FABRICANTES,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
}