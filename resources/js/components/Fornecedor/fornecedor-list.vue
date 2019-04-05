<template>
    <div>
        <template>
            <fornecedor-view></fornecedor-view>
                <v-card-title>
                    <v-spacer></v-spacer>
                    <v-text-field
                            v-model="search"
                            append-icon="search"
                            label="Search"
                            single-line
                            hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                        v-model="selected"
                        :headers="headers"
                        :items="list_fornecedores"
                        :search="search"
                        :loading="true"
                        item-key="id"
                        select-all
                >
                    <v-progress-linear v-slot:progress color="blue" indeterminate></v-progress-linear>
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
            ...mapActions('Fornecedor',['setList','viewFornecedor'])
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
        }
    }
</script>
