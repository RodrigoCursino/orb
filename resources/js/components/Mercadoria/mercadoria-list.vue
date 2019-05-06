<template>
    <div>
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
                        label="Buscar Mercadoria"
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
            :items="list_mercadorias"
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
            <td class="text-xs-left">{{ props.item.nome}}</td>
            <td class="text-xs-left">{{ props.item.fornecedor.nome_fantasia}}</td>
            <td class="text-xs-left">{{ props.item.ncm.cod }}</td>
            <td class="text-xs-left">{{ props.item.categoria.nome }}</td>
            <td class="text-xs-left">{{ props.item.grupo.nome }}</td>
            <td class="text-xs-left">{{ props.item.sub_grupo.nome }}</td>
            <td>
                <v-flex xs12 sm3>
                    <v-btn flat icon color="grey">
                        <v-icon @click="">
                            info
                        </v-icon>
                    </v-btn>
                </v-flex>
            </td>
        </template>
        <v-alert v-slot:no-results :value="true" color="error" icon="warning">
            Your search for "{{ search }}" found no results.
        </v-alert>
    </v-data-table>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    export default {
        name: "mercadoria-list",
        computed: {
            ...mapState('Mercadoria',{
                list_mercadorias: state => {
                    return state.list_mercadorias;
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
                        value: 'nome'
                    },
                    { text: 'Fornecedor',
                        value: 'fornecedor.nome_fantasia'
                    },
                    { text: 'NCM',
                        value: 'ncm.cod'
                    },
                    { text: 'Categoria',
                        value: 'categoria.nome' },
                    { text: 'Grupo',
                        value: 'grupo.nome' },
                    { text: 'Sub Grupo',
                        value: 'sub_grupo.nome' },
                    { text: 'Visualizar',
                        sortable: false
                    }
                ],
            }
        },
    }
</script>

<style scoped>

</style>