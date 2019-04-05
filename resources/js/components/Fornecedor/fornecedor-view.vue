<template>
    <v-layout row justify-center>
        <v-dialog :value.sync="view_fornecedor"
                  fullscreen
                  hide-overlay
                  transition="dialog-bottom-transition"
        >
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark
                           @click="viewFornecedor({})">
                        <v-icon>
                            close
                        </v-icon>
                    </v-btn>
                    <v-toolbar-title>
                        {{"Fornecedor : " + fornecedor.nome_fantasia}}
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn
                                dark
                                flat
                                @click="viewFornecedor({})">
                            Save
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <h1>Fornecedor</h1>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    import {mapActions,mapState} from 'vuex'
    export default {
        name: "fornecedor-view",
        data () {
            return {
                dialog: false,
                notifications: false,
                sound: true,
                widgets: false
            }
        },
        computed: {
            ...mapState('Fornecedor',{
                view_fornecedor : state => {
                    return state.view_fornecedor ;
                },
                fornecedor: state => {
                    return state.fornecedor;
                }
            })
        },
        methods: {
            ...mapActions('Fornecedor', ['viewFornecedor'])
        }
    }
</script>

<style scoped>

</style>