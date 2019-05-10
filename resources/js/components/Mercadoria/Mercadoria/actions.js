const setList = async  ({commit}) => {
    const list = (await  http.get('mercadorias')).data;
    commit ('SET_LIST_MERCADORIAS',{list})
}

const setListPriceByMercadoria = async ({commit}, id) => {
    const list = (await http.get(`precosmercadoria/${id}`)).data;
    commit('SET_LIST_PRICE_BY_MERCADORIA',{list})
}

const save_form = async ({ commit, dispatch }, mercadoria) => {

    let response = false;

    if (mercadoria.id) {
        let form_ = JSON.parse(JSON.stringify(mercadoria));
        let url_  = `${window.Slc.base_url}/api/mercadorias/${form_}`;
        response = (await axios.put(url_,form_)).data;
    } else {
        let url_  = `${window.Slc.base_url}/api/mercadorias`;
        let form_ = JSON.parse(JSON.stringify(mercadoria));
        response  =  await axios.post(url_,form_).data;
    }

    if(response) {
        dispatch('add',response);
    }
};

const close_form = ({commit}) => {
    commit('CLOSE_FORM');
};

const delete_form = ({commit,dispatch}, array) => {

    commit('DELETED');

    swal({
        title: "Você tem certeza?",
        text: "Cuidado você está prestes a deletar estes dados!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(async (willDelete) => {
        for (let i in array) {
            let mercadoriaRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('mercadorias',mercadoriaRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');

};

const delete_price = ({commit,dispatch}, array) => {
    commit('DELETED');

    swal({
        title: "Você tem certeza?",
        text: "Cuidado você está prestes a deletar estes dados!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(async (willDelete) => {
        for (let i in array) {
            let mercadoriaRequest = JSON.parse(JSON.stringify(array[i]));
            (await http.deleteForm('precosmercadoria',mercadoriaRequest));
        }
        dispatch('setList');
    });

    commit('DELETED');
};

const view = ({ commit },obj) => {
    const mercadoria = obj;
    commit('VIEW',{mercadoria});
};

const add = ({ commit, dispatch }, mercadoria ) => {
    commit('ADD',{mercadoria});
    if(mercadoria.id != 0) {
        dispatch('setListPriceByMercadoria',mercadoria.id);
    }
};


export default {
    setList,
    save_form,
    close_form,
    delete_form,
    view,
    add,
    setListPriceByMercadoria,
    delete_price
}