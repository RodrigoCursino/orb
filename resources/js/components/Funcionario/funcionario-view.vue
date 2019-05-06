<template>
    <v-layout row justify-center>
        <v-dialog :value.sync="view_controller"
                  fullscreen
                  hide-overlay
                  transition="dialog-bottom-transition"
        >
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark
                           @click="view({})">
                        <v-icon>
                            close
                        </v-icon>
                    </v-btn>
                    <v-toolbar-title>
                        {{'Nome do Funcionario: ' + funcionario.nome}}
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn
                                dark
                                flat
                                @click="editar()">
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
                    <funcionario-confirm></funcionario-confirm>
                </v-container>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    import {mapActions,mapState} from 'vuex'
    import FuncionarioConfirm from "./funcionario-confirm";
    export default {
        name: "funcionario-view",
        components: {FuncionarioConfirm},
        data () {
            return {
                dialog: false,
                notifications: false,
                sound: true,
                widgets: false
            }
        },
        computed: {
            ...mapState('Funcionario',{
                view_controller : state => {
                    return state.view_controller ;
                },
                funcionario: state => {
                    return state.funcionario;
                }
            })
        },
        methods: {
            ...mapActions('Funcionario', ['view']),
            editar() {
                this.$emit('edit',this.funcionario)
            }

        }
    }
</script>

<style scoped>

</style>