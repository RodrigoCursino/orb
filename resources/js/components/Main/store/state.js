export default {

    sideBarControl: false,

    currentItem: 'unidades',

    navList: window.Slc.menu,
    menuTabs: [{
        text     : "Unidades",
        link     : "#unidades",
        action   : "unidades",
        icon     : "domain",
        showNav  : true,
        showPage : true
    }]
    // navList: [
    //     {
    //         position : 1,
    //         text     : "Fornecedores",
    //         link     : "#fornecedores",
    //         action   : "fornecedores",
    //         icon     : "contacts",
    //         showNav  : false,
    //         showPage : false
    //     },
    //     {
    //         position : 2,
    //         text     : "Mercadoria",
    //         link     : "#mercadorias",
    //         action   : "mercadorias",
    //         icon     : "featured_play_list",
    //         showNav  : true,
    //         showPage : true
    //     },
    // ]

}