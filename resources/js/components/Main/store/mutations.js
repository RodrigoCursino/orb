import router from '../../../router'

/**
 * Mostra o side bar menu
 * @param state
 * @param payload
 * @constructor
 */
const SHOW_SIDEBAR = (state) => {
    state.sideBarControl = !state.sideBarControl;
};

/**
 * Seleciona a tab atual
 * @param state
 * @param payload
 * @constructor
 */
const  SELECT_TAB =  (state, payload) =>  {
        let index = state.menuTabs.findIndex(function (_index) {
            if (payload.action === _index.action) {
                return _index
            }
        });

        if(index === -1) {
            state.menuTabs.push(payload);
            state.currentItem = payload.action;
        } else {
            state.menuTabs.splice(index,1);
            if(state.menuTabs.length === 0) {
               let index   = {
                               position : 1,
                               text     : "Fornecedores",
                               link     : "#fornecedores",
                               action   : "fornecedores",
                               icon     : "contacts"
                             };

               state.menuTabs.push(index);
            }
        }


};


const DISABLE_TAB = (state, payload) =>  {

    let index = state.menuTabs.findIndex(function (_index) {
        if (payload.action === _index.action) {
            return _index
        }
    });

    state.menuTabs.splice(index,1);
    let tamanho = state.menuTabs.length;

    if(tamanho > 0) {
        let action = '/' + state.menuTabs[tamanho - 1].action;
        App.$router.push('/' + state.menuTabs[tamanho - 1].action);
    }

};

const LOGOUT = ()  => {
    axios.post('/logout',);
    setTimeout(function () {
        console.log('deslogou')
        window.location.reload();
    },1000);
};

export default {
    SHOW_SIDEBAR,
    SELECT_TAB,
    DISABLE_TAB,
    LOGOUT
}