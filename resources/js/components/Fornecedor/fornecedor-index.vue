<template>
    <div>
        <div class="text-xs-center">
        <v-dialog v-model="deleted"
                  hide-overlay
                  persistent
                  width="300">
        <v-card
                color="primary"
                dark
        >
            <v-card-text>
                Aguarde por Favor ...
                <v-progress-linear
                        indeterminate
                        color="white"
                        class="mb-0"
                ></v-progress-linear>
            </v-card-text>
        </v-card>
        </v-dialog>
        </div>
     <fornecedor-list></fornecedor-list>
    </div>
</template>
<script>
    import FornecedorList from "./fornecedor-list.vue";
    import {mapState, mapActions} from 'vuex'

    export default {
        name: 'fornecedor-index',
        props: {}
        ,
        components: {
            FornecedorList}
        ,
        computed: {
            ...mapState('Fornecedor', {
                deleted: state => {
                    return state.deleted;
                }
            })
        },
        methods: {}
    }
</script>
<style scoped>

</style>