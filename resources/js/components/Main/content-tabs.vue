<template>
    <v-tabs
            dark
            color="primary"
            show-arrows
            :value.sync="currentItem"
    >
        <v-tabs-slider color="yellow"></v-tabs-slider>
        <v-tab  v-for="i in menuTabs"
                :key="i.position"
                :to="{path: i.action}"
        >
            <button class="btn-close"
               @click.prevent="DISABLE_TAB(i)"
               style="margin-right: 5px"
            >
                <i class="icon-times">&times</i>
            </button>
            <div>
               {{ i.text }}
            </div>

        </v-tab>
        <v-tabs-items :value.sync="currentItem">
            <v-card flat transition="slide-y-transition">
                <v-card-text>
                    <router-view></router-view>
                </v-card-text>
            </v-card>
        </v-tabs-items>
    </v-tabs>
</template>

<script>
    import {mapState, mapMutations} from "vuex"
    import FornecedorIndex from "../Fornecedor/fornecedor-index";
    import Pages from "./pages";
    import MercadoriaIndex from "../Mercadoria/mercadoria-index";
    export default {
        components: {MercadoriaIndex, Pages, FornecedorIndex},
        data () {
            return {
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
            }
        },
        computed: {
            ...mapState('Main',{
                menuTabs:    state => state.menuTabs,
                currentItem: state => state.currentItem
            })
        },
        methods: {
            ...mapMutations('Main',[
                'DISABLE_TAB',
                'SELECT_TAB'
            ])
        }
    }
</script>
<style lang="scss">
    .btn-close {
        height: 18px;
        width: 18px;
        background-color: rgba(0, 0, 0, 0.28);
        border-radius: 50%;
        margin: 1.5%;
        font-style: normal;
        display: inline-block;
    }

    .icon-times {
        font-style: normal;
        align-content: center;
        color: white;
    }
</style>