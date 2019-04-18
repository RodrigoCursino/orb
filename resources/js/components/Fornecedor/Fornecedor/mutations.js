const SET_LIST_FORNECEDORES = (state, obj) => {
    state.list_fornecedores = obj.list;
};

const VIEW_FORNECEDOR = (state, obj) => {
    state.view_fornecedor = !state.view_fornecedor;
    state.fornecedor      = obj.fornecedor;
}

const SET_FORNECEDOR = (state, obj) => {

        state.fornecedor_edit.cnpj               = obj.fornecedor.cnpj,
        state.fornecedor_edit.contato_id         = obj.fornecedor.contato_id,
        state.fornecedor_edit.dados_bancarios_id = obj.fornecedor.dados_bancarios_id,
        state.fornecedor_edit.endereco_id        = obj.fornecedor.endereco_id,
        state.fornecedor_edit.forn_mercadoria    = obj.fornecedor.forn_mercadoria,
        state.fornecedor_edit.id                 = obj.fornecedor.id,
        state.fornecedor_edit.ie                 = obj.fornecedor.ie,
        state.fornecedor_edit.nome_fantasia      = obj.fornecedor.nome_fantasia,
        state.fornecedor_edit.observacao         = obj.fornecedor.observacao,
        state.fornecedor_edit.razao_social       = obj.fornecedor.razao_social,
        state.fornecedor_edit.endereco           = obj.fornecedor.endereco,
        state.fornecedor_edit.contato            = obj.fornecedor.contato,
        state.fornecedor_edit.dados_bancarios    = obj.fornecedor.dados_bancarios
};

export default {
    SET_LIST_FORNECEDORES,
    VIEW_FORNECEDOR,
    SET_FORNECEDOR
}