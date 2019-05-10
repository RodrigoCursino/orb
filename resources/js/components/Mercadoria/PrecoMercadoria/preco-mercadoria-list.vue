<template>
    <div>
        <preco-mercadoria-modal ref="modal"></preco-mercadoria-modal>
            <v-layout>
                <v-spacer></v-spacer>
                 <v-layout justify-end row class="mb-2">
                             <v-flex xs1 sm1>
                                 <v-btn flat
                                        icon
                                        dark
                                        title="selecione um item para deletar"
                                        color="green"
                                        @click.native="adicionar()"
                                 >
                                     <v-icon dark>add</v-icon>
                                 </v-btn>
                             </v-flex>

                             <v-flex xs1 sm1>
                               <v-btn flat icon
                                      title="selecione um item para deletar"
                                      color="danger"
                                      @click.native="acaoComSelecionados()"
                               >
                                  <v-icon dark>delete</v-icon>
                               </v-btn>
                             </v-flex>
                 </v-layout>
            </v-layout>
        <v-data-table
                v-model="selected"
                :headers="headers"
                :items="list_price"
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
                <td class="text-xs-left">{{ formatMoney(props.item.valor)}}</td>
                <td class="text-xs-left">{{ formatDate(props.item.data)}}</td>
                <td class="text-xs-left" v-if="props.item.observacoes">Preço de Venda</td>
                <td class="text-xs-left" v-else>Preço de Custo</td>
                <td class="text-xs-left" v-if="props.item.observacoes">{{ formatMoney(props.item.observacoes.desconto_maximo)}}</td>
                <td class="text-xs-left" v-else>//</td>
                <td class="text-xs-left" v-if="props.item.observacoes">{{ dataValidade(props.item.observacoes.validade)}}</td>
                <td class="text-xs-left" v-else>//</td>
                <td>
                    <v-flex xs12 sm3>
                        <v-btn flat icon color="grey">
                            <v-icon @click="">edit</v-icon>
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
    import PrecoMercadoriaModal from './preco-mercadoria-modal'
    export default {
        name: 'preco-mercadoria-list',
        computed: {
            ...mapState('Mercadoria',{
                list_price: state => {
                    return state.list_price;
                }
            })
        },
        components: {
            PrecoMercadoriaModal
        },
        data () {
            return {
                search: '',
                selected: [],
                headers: [
                    {
                        text:  'Valor',
                        align: 'left',
                        value: 'valor'
                    },
                    {
                        text:  'Data',
                        align: 'left',
                        value: 'data'
                    },
                    {
                        text:  'Tipo',
                        align: 'left',
                        sortable: false
                    },
                    {
                        text:  'Desconto',
                        align: 'left',
                        value: 'observacoes.desconto_maximo'
                    },
                    {
                        text:  'Validade',
                        align: 'left',
                        value: 'observacoes.validade'
                    },
                    {   text: 'Delete',
                        sortable: false
                    }
                ],
            }
        },

        methods: {
            adicionar() {
                this.$refs.modal.add();
            },
            acaoComSelecionados() {
                this.delete_price(this.selected);
            },
            formatDate(date) {
                let formated = date.split('-');
                return formated[2]+"/"+formated[1]+"/"+formated[0];
            },
            dataValidade(date) {
                let formated = date.split(' ');
                return this.formatDate(formated[0]);
            },
            formatMoney(money) {
                return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(money)
            },
            ...mapActions('Mercadoria',['delete_price'])
        }
    }
</script>
