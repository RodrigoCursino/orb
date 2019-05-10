<template>
    <div>
        <v-dialog v-model="open"
                  width="500px"
                  persistent
                  no-click-animation
        >
            <v-card>
                <!-- Tool Bar -->
                <v-toolbar
                        color="primary"
                        dark
                >
                    <v-card-title
                    >
                        {{title}}
                    </v-card-title>
                    <v-spacer></v-spacer>
                    <v-btn icon
                           @click="open = false"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>
                <!-- FORM -->
                        <v-container class="md" grid-list-md>
                            <v-layout warp>
                                <!-- Valor Venda -->
                                <v-flex
                                        xs12
                                        md12
                                        lg12
                                >
                                    <input-currency id="teste" name="Teste" v-model="form.preco_custo.valor"></input-currency>
                                </v-flex>
                            </v-layout>
                                <!-- Valor Venda -->
                                <v-layout wrap>
                                    <v-layout warp>
                                        <!-- Valor Venda -->
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <input-currency id="teste2" name="Teste 2" v-model="form.preco_venda.observacoes.desconto_maximo"></input-currency>
                                        </v-flex>
                                    </v-layout>
                                 </v-layout>
                                 <v-layout wrap>
                                    <!-- Valor Venda -->
                                    <!-- Valor Desconto -->
                                    <!--<v-flex-->
                                            <!--xs12-->
                                            <!--md12-->
                                            <!--lg12-->
                                    <!--&gt;-->
                                        <!--<v-text-field-->
                                                <!--prepend-icon="attach_money"-->
                                                <!--:value="form.preco_venda.observacoes.desconto_maximo"-->
                                                <!--v-validate="'required'"-->
                                                <!--:error-messages="errors.collect('desconto_maximo')"-->
                                                <!--label="Preço máximo de desconto"-->
                                                <!--@input="getMoney"-->
                                                <!--data-vv-name="desconto_maximo"-->
                                                <!--required-->
                                        <!--&gt;</v-text-field>-->
                                    <!--</v-flex>-->
                                 </v-layout>
                                 <v-layout wrap>
                                    <!-- Valor Desconto -->
                                    <!-- Validade -->
                                    <v-flex
                                            xs12
                                            md12
                                            lg12
                                    >
                                        <input-date label="Data Validade do Preço de Venda"
                                                    v-model="form.preco_venda.observacoes.validade">
                                        </input-date>
                                    </v-flex>
                                    <!-- Validade -->
                                </v-layout>

                                <v-layout wrap>
                                    <!-- Observação -->
                                    <v-flex
                                            xs12
                                            md12
                                            lg12
                                    >
                                        <v-textarea
                                                name="descricao"
                                                box
                                                label="Descrição"
                                                v-validate="'required'"
                                                :error-messages="errors.collect('descricao')"
                                                auto-grow
                                                row-height="12"
                                                v-model="form.preco_venda.observacoes.descricao"
                                                data-vv-name="descricao"
                                                required
                                        ></v-textarea>
                                    </v-flex>
                                    <!-- Observação -->
                                </v-layout>

                            <hr>
                            <br>
                            <v-layout align-center justify-end row>
                                <v-btn  color="primary"
                                        outline
                                        round
                                        @click=""
                                >
                                    Salvar
                                </v-btn>
                            </v-layout>
                        </v-container>


                <!-- FORM -->
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    import {mapState, mapActions} from 'vuex';
    import InputDate from "../../shared/input-date";
    import VCurrencyField from "../../shared/VCurrencyField";
    import InputCurrency from "../../shared/input-currency";

    export default {
        name: 'preco-mercadoria-modal',
        mixins: [require('../../helpers/MoneyMixin')],
        components: {InputCurrency, VCurrencyField, InputDate},
        $_veeValidate: {
            validator: 'new'
        },
        data () {
            return {
                form: {},
                open: false,
                preco_custo: {
                    ativo:1,
                    data:"",
                    fornecedor_id:0,
                    id:0,
                    mercadoria_id:0,
                    valor:"",
                },
                preco_venda: {
                    ativo:1,
                    data:"",
                    id:0,
                    mercadoria_id: "",
                    observacoes:{
                        ativo:1,
                        desconto_maximo:"",
                        descricao:"",
                        id:0,
                        observacao:"",
                        validade:""

                    },
                    tabela_preco_id:0,
                    valor:"",

                },
                currency_config: {
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    suffix: ' #',
                    precision: 2,
                    masked: false,
                    allowBlank: false,
                    min: Number.MIN_SAFE_INTEGER,
                    max: Number.MAX_SAFE_INTEGER
                }
            }
        },
        created() {
            this.form = this.buildForm(this.form);
        },
        computed: {
            title: function () {
                if(this.form.id) {
                    return 'Editar Preço';
                } else {
                    return 'Cadastrar Preço';
                };
            },

            ...mapState('Mercadoria', {
                mercadoria: state => {
                    return state.mercadoria;
                }
            })
        },
        methods: {
            edit (form) {
                this.form = this.buildForm(form);
                this.open = true;
            },

            add () {
                this.form = this.buildForm({});
                this.open = true;
            },

            buildForm (form) {
                return {
                    ativo: 1,
                    id          : form             ? form.id          : 0,
                    preco_venda : form.preco_venda ? form.preco_venda : this.preco_venda,
                    preco_custo : form.preco_custo ? form.preco_custo : this.preco_venda,
                }
            },
        }
    }
</script>