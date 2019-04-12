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
            text     : "Duplicates",
            link     : "#duplicates",
            action   : "duplicates",
            icon     : "star",
            showNav  : false,
            showPage : false
        },
    ]

}