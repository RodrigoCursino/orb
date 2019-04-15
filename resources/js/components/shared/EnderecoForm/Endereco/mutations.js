const SET_ENDERECO = (state, obj) => {
    console.log("Ops ", obj);
    state.endereco.logradouro = obj.endereco.logradouro;
    state.endereco.cep        = obj.endereco.cep;
    state.endereco.cidade     = obj.endereco.cidade;
    state.endereco.estado     = obj.endereco.estado;
    state.endereco.bairro     = obj.endereco.bairro;
    state.endereco.pais       = "Brasil";
};

const GET_ENDERECO = (state, obj) => {
  console.log('teste ', obj);
  state.endereco = obj;
};

export default {
    SET_ENDERECO,
    GET_ENDERECO
}