

const get_cep = async ({ commit }, CEP ) => {
    let url_ = 'https://viacep.com.br/ws/' + CEP + '/json/';

    let endereco = {
            logradouro: "",
            cep       : "",
            cidade    : "",
            estado    : "",
            bairro    : ""
    };

    await $.ajax({
             url: url_,
             method: 'GET',
             success: function (response) {

                 console.log('cep ', response);
                 endereco.logradouro = response.logradouro;
                 endereco.cep        = response.cep;
                 endereco.cidade     = response.localidade;
                 endereco.estado     = response.uf;
                 endereco.bairro     = response.bairro;

                 commit('SET_ENDERECO',{endereco})
             }
          })

};

const set_endereco = ({commit},endereco) => {
    commit('GET_ENDERECO',endereco)
};

export default {
    get_cep,
    set_endereco
}