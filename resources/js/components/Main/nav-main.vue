<template>
    <v-toolbar
            :clipped-left="$vuetify.breakpoint.lgAndUp"
            color="primary"
            dark
            app
            fixed
    >
        <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
            <v-toolbar-side-icon
                    @click.stop="SHOW_SIDEBAR">
            </v-toolbar-side-icon>
            <span class="hidden-sm-and-down">Projeto Orb</span>
        </v-toolbar-title>
        <!--<v-text-field-->
                <!--flat-->
                <!--solo-inverted-->
                <!--hide-details-->
                <!--prepend-inner-icon="search"-->
                <!--label="Search"-->
                <!--class="hidden-sm-and-down"-->
        <!--&gt;</v-text-field>-->
        <v-spacer></v-spacer>
        <v-btn icon
            @click="LOGOUT"
        >
            <v-icon>exit_to_app</v-icon>
        </v-btn>
        <v-btn icon large>
            <v-avatar size="32px" tile>
                <img
                        src="https://cdn.vuetifyjs.com/images/logos/logo.svg"
                        alt="Vuetify"
                >
            </v-avatar>
        </v-btn>
    </v-toolbar>
</template>
<script>
    import {mapState, mapMutations} from "vuex"
    export default {
        name: 'nav-main',
        computed: {
            ...mapState('Main',{
                showSideBar: state => {
                    return state.sideBarControl;
                },
                menu: state => {
                    return state.navList;
                }
            })
        },
        data: () => ({
            dialog: false,
            items: [
                { icon: 'contacts', text: 'Contacts' },
                { icon: 'history', text: 'Frequently contacted' },
                { icon: 'content_copy', text: 'Duplicates' },
                {
                    icon: 'keyboard_arrow_up',
                    'icon-alt': 'keyboard_arrow_down',
                    text: 'Labels',
                    model: true,
                    children: [
                        { icon: 'add', text: 'Create label' }
                    ]
                },
                {
                    icon: 'keyboard_arrow_up',
                    'icon-alt': 'keyboard_arrow_down',
                    text: 'More',
                    model: false,
                    children: [
                        { text: 'Import' },
                        { text: 'Export' },
                        { text: 'Print' },
                        { text: 'Undo changes' },
                        { text: 'Other contacts' }
                    ]
                },
                { icon: 'settings', text: 'Settings' },
                { icon: 'chat_bubble', text: 'Send feedback' },
                { icon: 'help', text: 'Help' },
                { icon: 'phonelink', text: 'App downloads' },
                { icon: 'keyboard', text: 'Go to the old version' }
            ]
        }),
        props: {
            source: String
        }
        ,
        methods: {
            ...mapMutations('Main',[
                'SHOW_SIDEBAR',
                'LOGOUT'
            ])
        }
    }
</script>
<style scoped>

</style>