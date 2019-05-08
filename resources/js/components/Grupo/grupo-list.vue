<template>
    <div>
        <grupo-modal ref="edit"></grupo-modal>
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
                            label="Buscar Grupos"
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
                :items="list_grupos"
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
                <td class="text-xs-left">{{ props.item.nome }}</td>
                <td class="text-xs-left">{{ props.item.observacao }}</td>
                <td class="text-xs-left" v-if="props.item.ncm">{{ props.item.ncm.cod }}</td>
                <td class="text-xs-left" v-else>Sem NCM</td>
                <td class="text-xs-left">{{ props.item.ativo }}</td>
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
    </div>
</template>
<script>
   import {mapState, mapActions} from 'vuex';
   import GrupoModal from "./grupo-modal";
   export default {
       name: 'grupo-list',
       components: {GrupoModal},
       mounted() {
           this.setList()
       },
       computed: {
           ...mapState('Grupo',{
               list_grupos: state => {
                   return state.list_grupos;
               },
               grupo: state => {
                   return state.grupo;
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
                       text: 'Observação',
                       align: 'left',
                       sortable: false,
                       value: 'observacao'
                   },
                   {
                       text: 'NCM',
                       sortable: false,
                       value: 'ncm.cod'
                   },
                   {
                       text: 'Ativo',
                       sortable: false,
                       value: ''
                   },
                   {   text: 'Visualizar',
                       sortable: false,
                       value: ''
                   }
               ],
           }
       },
       methods: {
           ...mapActions('Grupo',['setList','view','delete_form']),

           acaoComSelecionados() {
               this.delete_form(this.selected);
           },
           editar(form) {
               this.$refs.edit.edit(form);
           },
       }
   }
</script>



