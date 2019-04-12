export default {

    /**
     * Mostra o side bar menu
     * @param state
     * @param payload
     * @constructor
     */
     'SHOW_SIDEBAR' (state)  {
        state.sideBarControl = !state.sideBarControl;
     },

    /**
     * Seleciona a tab atual
     * @param state
     * @param payload
     * @constructor
     */
     'SELECT_TAB' (state, payload)  {
        let index = state.navList.findIndex(function (_navList) {
            if (payload === _navList.action) {
                state.currentItem  = payload;
               _navList.showPage   = true;
               _navList.showNav    = true;
               _navList.active     = true;
            } else {
               _navList.active   = false;
               _navList.showPage = false;
            }
        })
     },

    /**
     * Deasabilita a tab
     * @param state
     * @param payload
     * @constructor
     */
    'DISABLE_TAB' (state, payload)  {
        let index = state.navList.findIndex(function (_navList) {
            if (payload === _navList.action) {
                if (payload === _navList.action) {
                    _navList.showPage   = false;
                    _navList.showNav    = false;
                    _navList.active     = false;
                }
            }
        });
     }
}