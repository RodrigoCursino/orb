export default {

    sideBarControl: false,

    currentItem: 'fornecedores',

    navList: [
        {
            position : 1,
            text     : "Fornecedores",
            link     : "#fornecedores",
            action   : "fornecedores",
            icon     : "contacts",
            showNav  : true,
            showPage : true
        },
        {
            position : 2,
            text     : "Mercadoria",
            link     : "#mercadoria",
            action   : "mercadoria",
            icon     : "featured_play_list",
            showNav  : false,
            showPage : false
        },
    ]

}