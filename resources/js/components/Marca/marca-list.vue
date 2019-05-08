<template>
    <div>
        <template>
            <marca-modal ref="edit"></marca-modal>
            <v-card-title>
                <v-layout>
                    <v-flex lg6
                            md6
                            sm12
                            xs12
                    >
                        <v-text-field
                                v-model="search"
                                append-icon="search"
                                label="Buscar Marcas"
                                single-line
                                hide-details
                        ></v-text-field>
                    </v-flex>
                    <v-flex lg6
                            md6
                            sm12
                            xs12
                    >
                        <v-layout justify-end row class="mb-2">
                                <span class="group pa-2">
                                  <v-btn fab
                                         dark
                                         title="selecione um item para deletar"
                                         color="danger"
                                         @click.native="acaoComSelecionados()"
                                  >
                                     <v-icon dark>delete</v-icon>
                                  </v-btn>
                                </span>
                        </v-layout>
                    </v-flex>
                </v-layout>
            </v-card-title>
            <v-data-table
                    v-model="selected"
                    :headers="headers"
                    :items="list_marcas"
                    :search="search"
                    item-key="id"
                    select-all
            >
                <v-progress-linear v-slot:progress
                                   color="blue"
                                   indeterminate>

                </v-progress-linear>
                <template v-slot:items="props">
                    <td>
                        <v-checkbox
                                v-model="props.selected"
                                primary
                                hide-details
                        ></v-checkbox>
                    </td>
                    <td class="text-xs-left">{{ props.item.nome}}</td>
                    <td class="text-xs-left">{{ props.item.fabricante.nome_fantasia}}</td>
                    <td>
                        <v-flex xs12 sm3>
                            <v-btn flat icon color="grey">
                                <v-icon @click="editar(props.item)">info</v-icon>
                            </v-btn>
                        </v-flex>
                    </td>
                </template>
                <v-alert v-slot:no-results :value="true" color="error" icon="warning">
                    Your search for "{{ search }}" found no results.
                </v-alert>
            </v-data-table>
        </template>
    </div>
</template>
<script>
    import {mapState, mapActions} from 'vuex';
    import MarcaModal from "./marca-modal";
    export default {
        name: 'marca-list',
        components: {MarcaModal},
        mounted() {
            this.setList()
        },
        computed: {
            ...mapState('Marca',{
                list_marcas: state => {
                    return state.list_marcas;
                },
                marca: state => {
                    return state.marca;
                }
            })
        },
        data () {
            return {
                search: '',
                selected: [],
                headers: [
                    {
                        text: 'Nome',
                        align: 'left',
                        sortable: false,
                        value: 'nome'
                    },
                    {
                        text: 'fabricante',
                        align: 'left',
                        sortable: false,
                        value: 'fabricante.nome_fantasia'
                    },
                    {   text: 'Visualizar',
                        sortable: false,
                        value: 'contato.email'
                    }
                ],
            }
        },
        methods: {
            ...mapActions('Marca',['setList','view','delete_form']),

            acaoComSelecionados() {
                this.delete_form(this.selected);
            },
            editar(form) {
                this.$refs.edit.edit(form);
            },
        }
    }
</script>
