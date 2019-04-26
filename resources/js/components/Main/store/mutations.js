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
        state.menuTabs.push(payload);
        state.currentItem = payload.action;
        // console.log(payload);
        // let index = state.navList.findIndex(function (_navList) {
        //     if (payload === _navList.action) {
        //         state.currentItem  = payload;
        //         _navList.showPage   = true;
        //         _navList.showNav    = true;
        //         _navList.active     = true;
        //     } else {
        //         _navList.active   = false;
        //         _navList.showPage = false;
        //     }
        // })
};


const DISABLE_TAB = (state, payload) =>  {

    let index = state.menuTabs.findIndex(function (_index) {
        if (payload.action === _index.action) {
            return _index
        }
    });

    state.menuTabs.splice(index,1);
    let tamanho = state.menuTabs.length;

    console.log('tamanho', tamanho);
    console.log('text', payload.action);
    console.log('index', index);

    if(tamanho > 0) {
        let action = '/' + state.menuTabs[tamanho - 1].action
        console.log('ac', action);
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