<template>
    <div>
        <template>
            <v-data-table
                    :headers="headers"
                    :items="list_fornecedores"
                    class="elevation-1"
            >
                <template slot="headerCell" slot-scope="props">
                    <v-tooltip bottom>
                    <span slot="activator">
                        {{ props.header.text }}
                    </span>
                        <span>
                        {{ props.header.text }}
                    </span>
                    </v-tooltip>
                </template>
                <template v-slot:items="props">
                    <td class="text-xs-left">{{ props.item.cnpj}}</td>
                    <td class="text-xs-left">{{ props.item.ie}}</td>
                    <td class="text-xs-left">{{ props.item.nome_fantasia}}</td>
                    <td class="text-xs-left">{{ props.item.razao_social }}</td>
                    <td class="text-xs-left">{{ props.item.contato.telefone }}</td>
                    <td class="text-xs-left">{{ props.item.endereco.logradouro }}</td>
                    <td class="text-xs-left">{{ props.item.endereco.numero }}</td>
                    <td class="text-xs-left">{{ props.item.endereco.bairro }}</td>
                    <td class="text-xs-left">{{ props.item.endereco.cidade }}</td>
                    <td class="text-xs-left">{{ props.item.endereco.estado }}</td>
                    <td class="text-xs-left">{{ props.item.endereco.pais }}</td>
                </template>
            </v-data-table>
        </template>
    </div>
</template>
<script>
    import {mapState, mapActions} from 'vuex'
    export default {
        mounted() {
            this.setList()
        },
        name: 'fornecedor-list',
        data () {
            return {
                headers: [
                    {
                        text: 'CNPJ',
                        align: 'left',
                        sortable: false,
                        value: 'cnpj',
                        width: "200px"
                    },
                    { text: 'Inscrição Estadual',
                      value: 'ie' ,
                      width: "200px"
                    },
                    { text: 'Nome Fantasia',
                      value: 'nome_fantasia',
                      width: "200px"
                    },
                    { text: 'Razão social',
                      value: 'razao_social',
                      width: "200px"
                    },
                    { text: 'Telefone',
                      value: 'telefone',
                      width: "200px"
                    },
                    { text: "Logradoro",
                      value: 'logradouro',
                      width: "200px"
                    },
                    { text: "Nº",
                      value: "numero",
                      width: "200px"
                    },
                    { text: "Bairro" ,
                      value: "bairro",
                      width: "200px"
                    },
                    { text: "Cidade" ,
                      value: "cidade",
                      width: "200px"
                    },
                    { text: "UF"     ,
                      value: "estado",
                      width: "200px"
                    },
                    { text: "País"   ,
                      value: "pais",
                      width: "200px"
                    },
                ],
            }
        },
        methods: {
            ...mapActions('Fornecedor',['setList'])
        },
        computed: {
            ...mapState('Fornecedor',{
                list_fornecedores: state => {
                    return state.list_fornecedores;
                },
            })
        }
    }
</script>

<style lang="css" scoped>
    table.v-table tbody td:first-child, table.v-table tbody td:not(:first-child), table.v-table tbody th:first-child, table.v-table tbody th:not(:first-child), table.v-table thead td:first-child, table.v-table thead td:not(:first-child), table.v-table thead th:first-child, table.v-table thead th:not(:first-child) {
        padding: 0 10px
    }
</style>