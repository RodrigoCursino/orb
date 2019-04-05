<template>
    <v-navigation-drawer
            :value.sync="showSideBar"
            :clipped="$vuetify.breakpoint.lgAndUp"
            fixed
            app
    >
        <v-list dense>
            <template v-for="item in menu">
                <v-layout
                        v-if="item.heading"
                        :key="item.heading"
                        row
                        align-center
                >
                    <v-flex xs6>
                        <v-subheader v-if="item.heading">
                            {{ item.heading }}
                        </v-subheader>
                    </v-flex>
                    <v-flex xs6 class="text-xs-center">
                        <a href="#!" class="body-2 black--text">EDIT</a>
                    </v-flex>
                </v-layout>
                <v-list-group
                        v-else-if="item.children"
                        :key="item.text"
                        v-model="item.model"
                        :prepend-icon="item.model ? item.icon : item['icon-alt']"
                        append-icon=""
                >
                    <template v-slot:activator>
                        <v-list-tile>
                            <v-list-tile-content>
                                <v-list-tile-title
                                >
                                    {{ item.text }}
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </template>
                    <v-list-tile
                            v-for="(child, i) in item.children"
                            :key="i"
                            @click=""
                    >
                        <v-list-tile-action v-if="child.icon">
                            <v-icon>{{ child.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title
                            >
                                {{ child.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                <v-list-tile v-else :key="item.text" @click="SELECT_TAB(item.action)">
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            {{ item.text }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </template>
        </v-list>
    </v-navigation-drawer>
</template>
<script>
    import {mapState, mapMutations} from "vuex"
    export default {
        name: 'side-bar',
        props: {

        },
        components: {

        },
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
        methods: {
            ...mapMutations('Main',[
                'SELECT_TAB',
                'DISABLE_TAB'
            ])
        }
    }
</script>
<style scoped>

</style>