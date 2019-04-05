export default {

     'SHOW_SIDEBAR' (state)  {
        state.sideBarControl = !state.sideBarControl;
     },

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

    'DISABLE_TAB' (state, payload)  {

        let index = state.navList.findIndex(function (_navList) {
            if (payload === _navList.action) {
                _navList.showPage  =  false;
                _navList.showNav   =  false;
            }
        });

        var currentItem = "";

        for (let i in state.navList) {
            if (state.navList[i].showNav) {
                state.currentItem =  state.navList[i].action;
            }
        }

        if (state.currentItem === '') {
            state.navList[0].showPage   = true;
            state.navList[0].showNav    = true;
            state.navList[0].active     = true;
            state.currentItem =  'contacts';
        }
     }
}