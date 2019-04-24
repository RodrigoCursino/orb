export default {

    sideBarControl: false,

    currentItem: 'mercadorias',

    navList: [
        {
            position : 1,
            text     : "Fornecedores",
            link     : "#fornecedores",
            action   : "fornecedores",
            icon     : "contacts",
            showNav  : false,
            showPage : false
        },
        {
            position : 2,
            text     : "Mercadoria",
            link     : "#mercadorias",
            action   : "mercadorias",
            icon     : "featured_play_list",
            showNav  : true,
            showPage : true
        },
    ]

}