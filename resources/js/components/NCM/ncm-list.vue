<template>
    <div>
        <template>
            <ncm-modal ref="edit"></ncm-modal>
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
                                label="Buscar Ncms"
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
                    :items="list_ncms"
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
                    <td class="text-xs-left">{{ props.item.cod}}</td>
                    <td class="text-xs-left">{{ props.item.descricao}}</td>
                    <td class="text-xs-left">{{ props.item.ativo}}</td>
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
    import NcmModal from "./ncm-modal";
    export default {
        name: 'ncm-list',
        components: {NcmModal},
        mounted() {
            this.setList()
        },
        computed: {
            ...mapState('NCM',{
                list_ncms: state => {
                    return state.list_ncms;
                },
                ncm: state => {
                    return state.ncm;
                }
            })
        },
        data () {
            return {
                search: '',
                selected: [],
                headers: [
                    {
                        text: 'Cod',
                        align: 'left',
                        sortable: false,
                        value: 'cod'
                    },
                    {
                        text: 'Descrição',
                        align: 'left',
                        sortable: false,
                        value: 'descricao'
                    },
                    {
                        text: 'Ativo',
                        value: 'ativo'
                    },
                    {   text: 'Visualizar',
                        sortable: false,
                        value: 'contato.email'
                    }
                ],
            }
        },
        methods: {
            ...mapActions('NCM',['setList','view','delete_form']),

            acaoComSelecionados() {
                this.delete_form(this.selected);
            },
            editar(form) {
                this.$refs.edit.edit(form);
            },
        }
    }
</script>
