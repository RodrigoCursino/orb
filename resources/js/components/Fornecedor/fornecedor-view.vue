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
                                @click="edit()">
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
                    <fornecedor-form ref="editfornecedor"></fornecedor-form>
                </v-container>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    import {mapActions,mapState} from 'vuex'
    import FornecedorEdit from "./fornecedor-edit";
    import FornecedorConfirm from "./fornecedor-confirm";
    import FornecedorForm from "./fornecedor-form";
    import FornecedorOps from "./fornecedor-form2";
    export default {
        name: "fornecedor-view",
        components: {FornecedorForm, FornecedorOps, FornecedorConfirm, FornecedorEdit},
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
            edit() {
                this.$refs.editfornecedor.edit(this.fornecedor);
            }
        }
    }
</script>

<style scoped>

</style>