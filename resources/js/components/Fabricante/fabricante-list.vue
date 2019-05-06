<template>
    <div>
        <template>
            <fabricante-modal ref="edit"></fabricante-modal>
            <fabricante-view @edit="editar"></fabricante-view>
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
                                label="Buscar Fabricantes"
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
                    :items="list_fabricantes"
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
                                <v-icon @click="view(props.item)">info</v-icon>
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
    import FabricanteView from "./fabricante-view";
    import FabricanteModal from "./fabricante-modal";
    export default {
        name: 'fabricante-list',
        components: {FabricanteModal, FabricanteView},
        mounted() {
            this.setList()
        },
        computed: {
            ...mapState('Fabricante',{
                list_fabricantes: state => {
                    return state.list_fabricantes;
                },
                fabricante: state => {
                    return state.fabricante;
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
                    {   text: 'Nome Fantasia',
                        value: 'nome_fantasia'
                    },
                    {   text: 'Razão Social',
                        value: 'razao_social'
                    },
                    {   text: 'email',
                        value: 'contato.email'
                    },
                    {   text: 'Editar',
                        sortable: false,
                        value: ''
                    }
                ],
            }
        },
        methods: {
            acaoComSelecionados() {
                this.delete_form(this.selected);
            },
            editar(form) {
                this.$refs.edit.edit(form);
            },
            ...mapActions('Fabricante',['setList','view','delete_form']),
        }
    }
</script>
