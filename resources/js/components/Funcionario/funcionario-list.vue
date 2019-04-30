<template>
    <div>
        <template>
            <!--<fornecedor-view></fornecedor-view>-->
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
                                label="Buscar Funcionário"
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
                    :items="list_funcionarios"
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
                    <td class="text-xs-left">{{ props.item.cpf}}</td>
                    <td class="text-xs-left">{{ props.item.nome}}</td>
                    <td class="text-xs-left">{{ props.item.cargo.nome }}</td>
                    <td class="text-xs-left">{{ props.item.unidade.nome_fantasia }}</td>
                    <td>
                        <v-flex xs12 sm3>
                            <!--<v-btn flat icon color="grey">-->
                                <!--<v-icon @click="viewFornecedor(props.item)">info</v-icon>-->
                            <!--</v-btn>-->
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
    export default {
        name: 'funcionario-list',
        components: {},
        mounted() {
            this.setList()
        },
        computed: {
            ...mapState('Funcionario',{
                list_funcionarios: state => {
                    return state.list_funcionarios;
                }
            })
        },
        data () {
            return {
                search: '',
                selected: [],
                headers: [
                    {
                        text: 'CPF',
                        align: 'left',
                        sortable: false,
                        value: 'cpf'
                    },
                    { text: 'Nome',
                        value: 'nome'
                    },
                    { text: 'Cargo',
                        value: 'cargo.nome'
                    },
                    { text: 'unidade', value: 'unidade.nome_fantasia' },
                    { text: 'Visualizar',
                        sortable: false,
                        value: 'unidade.nome_fantasia' }
                ],
            }
        },
        methods: {
            acaoComSelecionados() {

            },
            ...mapActions('Funcionario',['setList']),
        }
    }
</script>
