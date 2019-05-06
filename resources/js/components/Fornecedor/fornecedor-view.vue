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
                        {{'Nome do Fornecedor ' + fornecedor.nome_fantasia}}
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn
                                dark
                                flat
                                @click="editOps()">
                            <v-icon>edit</v-icon>
                        </v-btn>
                        <v-btn
                                dark
                                flat
                                >
                            <v-icon>delete</v-icon>
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <v-container>
                    <fornecedor-confirm></fornecedor-confirm>
                </v-container>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    import {mapActions,mapState} from 'vuex'
    import FornecedorConfirm from "./fornecedor-confirm";
    export default {
        name: "fornecedor-view",
        components: {FornecedorConfirm},
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
            ...mapActions('Fornecedor', ['viewFornecedor','save_fornecedor']),
            editOps() {
                this.$emit('edit',this.fornecedor)
            }

        }
    }
</script>

<style scoped>

</style>