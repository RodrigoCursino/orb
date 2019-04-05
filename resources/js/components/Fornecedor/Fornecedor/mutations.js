const SET_LIST_FORNECEDORES = (state, obj) => {
    state.list_fornecedores = obj.list
}

const VIEW_FORNECEDOR = (state, obj) => {
    state.view_fornecedor = !state.view_fornecedor
    state.fornecedor      = obj.fornecedor
}

export default {
    SET_LIST_FORNECEDORES,
    VIEW_FORNECEDOR
}