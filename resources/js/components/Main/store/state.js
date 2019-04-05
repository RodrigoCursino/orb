export default {

    sideBarControl: false,

    currentItem: 'contacts',

    navList: [
        {
            position: 1,
            text :  "Contacts",
            link:   "#contacts",
            action: "contacts",
            icon:   "contacts",
            showNav: true,
            showPage: true
        },
        {
            position: 2,
            text :  "Duplicates",
            link:   "#duplicates",
            action: "duplicates",
            icon:   "star",
            showNav:  false,
            showPage: false
        },
    ]

}