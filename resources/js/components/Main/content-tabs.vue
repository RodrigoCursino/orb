<template>
    <v-tabs
            dark
            color="primary"
            show-arrows
            :value.sync="currentItem"
    >
        <v-tabs-slider color="yellow"></v-tabs-slider>

        <v-tab  v-for="i in menu"
                v-show.prevent="i.showNav"
                :key="i.position"
                :href="i.link"
        >
            <a class="btn-close"
               @click.prevent="DISABLE_TAB(i.action)"
               style="margin-right: 5px"
            >
                <i class="icon-times">&times</i>
            </a>
            <div>
                {{ i.text }}
            </div>

        </v-tab>
        <v-tabs-items :value.sync="currentItem">
            <v-tab-item
                    v-show="menu[0].showPage"
                    :value="menu[0].action"
            >
                <v-card flat>
                    <v-card-text>
                        <fornecedor-index></fornecedor-index>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                    v-show="menu[1].showPage"
                    :value="menu[1].action"
            >
                <v-card flat>
                    <v-card-text>
                        <mercadoria-index></mercadoria-index>
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </v-tabs>
</template>

<script>
    import {mapState, mapMutations} from "vuex"
    import FornecedorIndex from "../Fornecedor/fornecedor-index.vue";
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
                menu:        state => state.navList,
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