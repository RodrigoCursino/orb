const base = `${window.Slc.base_url}/api/`;

const get = (api) => {
    let url_ = base + api;
    return axios.get(url_)
};

const post = async (api, form) => {

    let form_ = JSON.parse(JSON.stringify(form));
    let url_  = base + api;
    let response = await axios.post(url_,form_);

    if(response.status === 200) {
        swal({
            title: "Operação realizada com sucesso",
            text: response.data.message,
            icon: "success",
            buttons: true,
        });
    }

    return response.data;
};

const put = async (api, form) => {

    let form_ = JSON.parse(JSON.stringify(form));
    let url_  = base + `${api}/${form_}`;
    let response  = (await axios.put(url_,form_));

    swal({
        title: "Operação realizada com sucesso",
        text: response.data.message,
        icon: "success",
        buttons: true,
    });

    return response;
};

const deleteForm = (api, form) => {
    let form_ = JSON.parse(JSON.stringify(form.id));
    let url_  = base + `${api}/${form_}`;
    axios.delete(url_,form_).data;
};

export default {
    get,
    post,
    put,
    deleteForm
}