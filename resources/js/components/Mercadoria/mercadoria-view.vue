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
                        {{'Nome Mercadoria: ' + mercadoria.nome}}
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
                    <mercadoria-confirm></mercadoria-confirm>
                    <img style="margin-left: 21%;" src="https://www.minhasplanilhas.com.br/wp-content/uploads/2016/11/Grafico_linha_com_tolerancia_Excel_2.png">
                </v-container>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    import {mapActions,mapState} from 'vuex'
    import MercadoriaConfirm from "./mercadoria-confirm";
    export default {
        name: "mercadoria-view",
        components: {MercadoriaConfirm},
        data () {
            return {
                dialog: false,
                notifications: false,
                sound: true,
                widgets: false
            }
        },
        computed: {
            ...mapState('Mercadoria',{
                view_controller : state => {
                    return state.view_controller ;
                },
                mercadoria: state => {
                    return state.mercadoria;
                }
            })
        },
        methods: {
            ...mapActions('Mercadoria', ['view']),
            editar() {
                this.$emit('edit',this.mercadoria)
            }

        }
    }
</script>

<style scoped>

</style>