<template>
    <div>
        <template>
            <fornecedor-view></fornecedor-view>
                <v-card-title>
                    <!--<v-spacer></v-spacer>-->
                    <!--<v-spacer></v-spacer>-->
                    <v-layout>
                        <v-flex lg6
                                md6
                                sm12
                                xs12
                        >
                            <v-text-field
                                    v-model="search"
                                    append-icon="search"
                                    label="Buscar Fornecedor"
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
                        :items="list_fornecedores"
                        :search="search"
                        item-key="id"
                        select-all
                >
                    <v-progress-linear v-slot:progress
                                       color="blue"
                                       indeterminate></v-progress-linear>
                    <template v-slot:items="props">
                        <td>
                            <v-checkbox
                                    v-model="props.selected"
                                    primary
                                    hide-details
                            ></v-checkbox>
                        </td>
                        <td class="text-xs-left">{{ props.item.cnpj}}</td>
                        <td class="text-xs-left">{{ props.item.nome_fantasia}}</td>
                        <td class="text-xs-left">{{ props.item.razao_social }}</td>
                        <td class="text-xs-left">{{ props.item.contato.email }}</td>
                        <td>
                            <v-flex xs12 sm3>
                              <v-btn flat icon color="grey">
                                  <v-icon @click="viewFornecedor(props.item)">info</v-icon>
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
    import {mapState, mapActions} from 'vuex'
    import FornecedorView from "./fornecedor-view";
    export default {
        components: {FornecedorView},
        mounted() {
            this.setList()
        },
        computed: {
            ...mapState('Fornecedor',{
                list_fornecedores: state => {
                    return state.list_fornecedores;
                },
                fornecedor: state => {
                    return state.fornecedor;
                }
            })
        },
        data () {
            return {
                search: '',
                selected: [],
                headers: [
                    {
                      text: 'CNPJ',
                      align: 'left',
                      sortable: false,
                      value: 'cnpj'
                    },
                    { text: 'Nome Fantasia',
                      value: 'nome_fantasia'
                    },
                    { text: 'Razão Social',
                      value: 'razao_social'
                    },
                    { text: 'email', value: 'contato.email' },
                    { text: 'Visualizar',
                      sortable: false,
                      value: 'contato.email' }
                ],
            }
        },
        methods: {
            acaoComSelecionados() {
                this.delete_fornecedor(this.selected);
            },
            ...mapActions('Fornecedor',['setList','viewFornecedor','delete_fornecedor']),
        }
    }
</script>
