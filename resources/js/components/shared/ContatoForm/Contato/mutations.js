const SET_CONTATO = (state, contato) => {
    state.contato.celular  =  contato.celular,
    state.contato.email    =  contato.email,
    state.contato.id       =  contato.id,
    state.contato.nome     =  contato.nome,
    state.contato.telefone =  contato.telefone
};

export default {
   SET_CONTATO
}