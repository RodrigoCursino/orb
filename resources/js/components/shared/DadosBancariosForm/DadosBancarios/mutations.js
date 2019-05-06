const SET_DADOS_BANCARIOS = (state, dados_bancarios) => {
    state.dados_bancarios.agencia  = dados_bancarios.agencia,
    state.dados_bancarios.banco_id = dados_bancarios.banco_id,
    state.dados_bancarios.conta    = dados_bancarios.conta,
    state.dados_bancarios.tipo     = dados_bancarios.tipo
};

export default {
    SET_DADOS_BANCARIOS
}