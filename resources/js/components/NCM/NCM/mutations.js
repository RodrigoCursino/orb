const SET_LIST_NCMS = (state, obj) => {
    state.list_ncms = obj.list;
};

const VIEW = (state, obj) => {
    state.view_controller = !state.view_controller;
    state.ncm             = obj.ncm;
};

const DELETED = (state) => {
    state.deleted = !state.deleted;
};

const CLOSE_FORM = (state) => {
    state.closeForm = !state.closeForm;
};

const ADD = (state, obj) => {
    state.ncm = obj.ncm;
};

const CLOSE_VIEW = (state) => {
    state.view_controller = !state.view_controller;
};

export default {
    SET_LIST_NCMS,
    VIEW,
    DELETED,
    CLOSE_FORM,
    ADD,
    CLOSE_VIEW,
};