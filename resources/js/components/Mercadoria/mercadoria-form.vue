<template>
    <div>
        <v-btn
                fab
                bottom
                right
                color="pink"
                dark
                fixed
                @click="open_form_mercadoria"
        >
            <v-icon>add</v-icon>
        </v-btn>

        <v-dialog :value.sync="openFormMercadoria"
                  width="900px"
                  persistent
                  no-click-animation
        >
            <v-card>
                <v-toolbar
                        color="primary"
                        dark
                >
                    <v-card-title
                    >
                        Cadastrar Mercadoria
                    </v-card-title>
                    <v-spacer></v-spacer>
                    <v-btn icon
                           @click="open_form_mercadoria"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>

                <v-stepper v-model="e1">
                    <v-stepper-header>
                        <v-stepper-step :complete="e1 > 1" step="1">
                            Descrição Mercadoria
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step :complete="e1 > 2" step="2">
                            Preço Mercadoria
                        </v-stepper-step>
                    </v-stepper-header>

                    <v-stepper-items>
                        <v-stepper-content step="1">
                            <v-card
                                    class="mb-5"
                            >
                                <v-container grid-list-md>
                                    <v-layout wrap>
                                        <!-- Nome -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="mercadoria.nome"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('nome')"
                                                    label="Nome"
                                                    data-vv-name="nome"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <!-- Nome -->
                                        <!-- NCM -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <ncms-select v-model="mercadoria.ncm_id"
                                                         v-validate="'required'"
                                            ></ncms-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('ncm_id')"
                                                     data-vv-name="ncm_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- NCM -->
                                    </v-layout>
                                    <v-layout wrap>
                                        <!-- Fornecedor -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <fornecedor-select v-model="mercadoria.fornecedor_id"
                                            ></fornecedor-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('fornecedor_id')"
                                                     data-vv-name="fornecedor_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Fornecedor -->
                                        <!-- categoria -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <categorias-select v-model="mercadoria.categoria_id" >
                                            </categorias-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('categoria_id')"
                                                     data-vv-name="categoria_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- categoria -->
                                    </v-layout>
                                    <v-layout wrap>
                                        <!-- Fornecedor -->
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <grupos-select v-model="mercadoria.grupo_id" >
                                            </grupos-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('grupo_id')"
                                                     data-vv-name="grupo_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Fornecedor -->
                                    </v-layout >
                                    <v-layout wrap>
                                        <!-- Fornecedor -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <sub-grupos-select v-model="mercadoria.sub_grupo_id">
                                            </sub-grupos-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('sub_grupo_id')"
                                                     data-vv-name="sub_grupo_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Fornecedor -->
                                        <!-- categoria -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <colecoes-select v-model="mercadoria.colecao_id">
                                            </colecoes-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('colecao_id')"
                                                     data-vv-name="colecao_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- categoria -->

                                        <!-- categoria -->
                                    </v-layout>
                                    <v-layout wrap>
                                        <!-- Unidades Medida -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <unidades-medida-select v-model="mercadoria.unidade_medida_id">
                                            </unidades-medida-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('unidade_medida_id')"
                                                     data-vv-name="unidade_medida_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Unidades Medida -->
                                        <!-- Uniaddes Caixa -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <unidades-caixa-select v-model="mercadoria.unidade_caixa_id" >
                                            </unidades-caixa-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('unidade_caixa_id')"
                                                     data-vv-name="unidade_caixa_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Uniaddes Caixa -->
                                    </v-layout >
                                    <v-layout wrap>
                                        <!-- Linha -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <linhas-select v-model="mercadoria.linha_id">
                                            </linhas-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('linha_id')"
                                                     data-vv-name="linha_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Linha -->
                                        <!-- Marca -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <marcas-select v-model="mercadoria.marca_id" >
                                            </marcas-select>
                                            <v-input type="hidden"
                                                     v-validate="'required'"
                                                     :error-messages="errors.collect('marca_id')"
                                                     data-vv-name="marca_id"
                                                     required
                                            >
                                            </v-input>
                                        </v-flex>
                                        <!-- Marca -->
                                    </v-layout>
                                    <v-layout wrap>
                                        <!-- Observação -->
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-textarea
                                                    name="observacao"
                                                    box
                                                    label="Observacao"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('observacao')"
                                                    auto-grow
                                                    row-height="12"
                                                    v-model="mercadoria.observacao"
                                                    data-vv-name="observacao"
                                                    required
                                            ></v-textarea>
                                        </v-flex>
                                        <!-- Observação -->
                                    </v-layout>
                                </v-container>
                            </v-card>
                            <v-btn
                                    color="primary"
                                    @click="validateMercadoria(mercadoria)"
                            >
                                Continue
                            </v-btn>

                        </v-stepper-content>
                        <v-stepper-content step="2">
                            <v-card
                                    class="mb-5"
                            >
                                <v-container grid-list-md>
                                    <v-layout wrap>
                                        <!-- Valor Venda -->
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-text-field
                                                    v-model="mercadoria.preco_custo.valor"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('valor')"
                                                    label="Preço de Custo"
                                                    v-money="money"
                                                    prefix="R$"
                                                    data-vv-name="valor_preco_custo"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <!-- Valor Venda -->
                                    </v-layout>
                                    <v-layout wrap>
                                        <!-- Valor Venda -->
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <v-text-field
                                                    v-model="mercadoria.preco_venda.valor"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('valor')"
                                                    label="Preço de Venda"
                                                    v-money="money"
                                                    prefix="R$"
                                                    data-vv-name="valor_preco_custo"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <!-- Valor Venda -->
                                        <!-- Valor Desconto -->
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <v-text-field
                                                    v-model="mercadoria.preco_venda.observacoes.desconto_maximo"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('desconto_maximo')"
                                                    label="Desconto Maxímo"
                                                    v-money="money"
                                                    prefix="R$"
                                                    data-vv-name="desconto_maximo"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <!-- Valor Desconto -->
                                        <!-- NCM -->
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <input-date label="Data Validade" v-model="mercadoria.preco_venda.observacoes.validade"></input-date>
                                        </v-flex>
                                        <!-- NCM -->
                                    </v-layout>

                                    <v-layout wrap>
                                        <!-- Observação -->
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-textarea
                                                    name="observacao"
                                                    box
                                                    label="Observacao"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('observacao')"
                                                    auto-grow
                                                    row-height="12"
                                                    v-model="mercadoria.preco_venda.observacoes.observacao"
                                                    data-vv-name="observacao"
                                                    required
                                            ></v-textarea>
                                        </v-flex>
                                        <!-- Observação -->
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
                                                    v-model="mercadoria.preco_venda.observacoes.descricao"
                                                    data-vv-name="descricao"
                                                    required
                                            ></v-textarea>
                                        </v-flex>
                                        <!-- Observação -->
                                    </v-layout>
                                </v-container>
                            </v-card>

                            <v-layout align-center justify-end row>
                                <v-btn
                                        color="primary"
                                        outline
                                        round
                                        @click="validateVenda(mercadoria.preco_venda)"
                                >
                                    Salvar
                                </v-btn>
                                <v-btn flat @click="e1 --">
                                    Voltar
                                </v-btn>
                            </v-layout>
                        </v-stepper-content>
                    </v-stepper-items>
                </v-stepper>
            </v-card>
        </v-dialog>

    </div>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    import NcmsSelect from "../NCM/ncms-select";
    import FornecedorSelect from "../Fornecedor/fornecedor-select";
    import InputDate from "../shared/input-date";
    import CategoriasSelect from "../Categoria/categorias-select";
    import ColecoesSelect from "../Colecao/colecoes-select";
    import GruposSelect from "../Grupo/grupos-select";
    import SubGruposSelect from "../SubGrupo/sub-grupos-select";
    import UnidadesCaixaSelect from "../UnidadeCaixa/unidades-caixa-select";
    import UnidadesMedidaSelect from "../UnidadeMedida/unidades-medida-select";
    import MarcasSelect from "../Marca/marcas-select";
    import LinhasSelect from "../Linha/linhas-select";
    export default {
        name: "mercadoria-form",
        components: {
            LinhasSelect,
            MarcasSelect,
            UnidadesMedidaSelect,
            UnidadesCaixaSelect,
            SubGruposSelect,
            GruposSelect,
            ColecoesSelect,
            CategoriasSelect,
            FornecedorSelect,
            NcmsSelect,
            InputDate
        },
        $_veeValidate: {
            validator: 'new'
        },
        mounted() {
            this.$validator.localize('en', this.dictionary);
        },
        computed: {
            ...mapState('Mercadoria',{
                openFormMercadoria : state => {
                    return state.openFormMercadoria;
                }
            })
        },
        data: () => ({
            e1: 0,
            money: {
                decimal: ',',
                thousands: '.',
                precision: 2,
                masked: false /* doesn't work with directive */
            },
            mercadoria: {
                categoria_id:null,
                unidade_medida_id:null,
                unidade_caixa_id:null,
                colecao_id:null,
                fornecedor_id:null,
                sub_grupo_id:null,
                grupo_id:null,
                linha_id:null,
                marca_id:null,
                ncm_id:null,
                nome:"",
                observacao:"",
                preco_venda: {
                    "valor": "",
                    "data" : "",
                    "observacoes": {
                        "id": 0,
                        "descricao": "",
                        "observacao": "",
                        "desconto_maximo": "",
                        "validade": "",
                    }
                },
                preco_custo: {
                    "valor": ""
                }
            },
            dictionary: {
                custom: {
                    nome: {
                        required: () => 'O Nome é obrigatório',
                    },
                    observacao: {
                        required: () => 'A Observação é obrigatória',
                    },
                    ncm_id: {
                        required: () => 'O NCM é obrigatório',
                    },
                    descricao: {
                        required: () => 'A Descrição é obrigatória',
                    },
                    fornecedor_id: {
                        required: () => 'O Fornecedor é obrigatório',
                    },
                    colecao_id: {
                        required: () => 'A Coleção é obrigatória',
                    },
                    categoria_id: {
                        required: () => 'A Categoria é obrigatória',
                    },
                    linha_id: {
                        required: () => 'A Linha é obrigatória',
                    },
                    marca_id: {
                        required: () => 'A Marca é obrigatória',
                    },
                    sub_grupo_id: {
                        required: () => 'O sub Grupo é Obrigatório',
                    },
                    grupo_id: {
                        required: () => 'O Grupo é Obrigatório',
                    },
                    unidade_medida_id: {
                        required: () => 'A unidade de medida é Obrigatória',
                    },
                    unidade_caixa_id: {
                        required: () => 'A unidade é Obrigatória',
                    },
                    desconto_maximo: {
                        required: () => 'O desconto é Obrigatória',
                    },
                    valor_preco_venda: {
                        required: () => 'O valor de preço de Venda é Obrigatório',
                    },
                    valor_preco_custo: {
                        required: () => 'O valor de preço de Custo é Obrigatório',
                    }
                }
            }
        }),
        methods: {
            ...mapActions('Mercadoria', ['open_form_mercadoria','save_mercadoria']),
            validateMercadoria(scope) {
                this.$validator.validateAll(scope).then(result => {
                    if (result) {
                        this.e1++;
                    }
                });
            },

            buildForm () {
                return  {
                    categoria_id:null,
                    unidade_medida_id:null,
                    unidade_caixa_id:null,
                    colecao_id:null,
                    fornecedor_id:null,
                    sub_grupo_id:null,
                    grupo_id:null,
                    linha_id:null,
                    marca_id:null,
                    ncm_id:null,
                    nome:"",
                    observacao:"",
                    preco_venda: {
                        "valor": "",
                        "data" : "",
                        "observacoes": {
                            "id": 0,
                            "descricao": "",
                            "observacao": "",
                            "desconto_maximo": "",
                            "validade": "",
                        }
                    },
                    preco_custo: {
                        "valor": ""
                    }
                        }
            },

            validateVenda(scope) {
                this.$validator.validateAll(scope).then(result => {
                    if (result) {
                        this.$validator.validateAll(scope.observacoes).then(result => {
                            if (result) {
                                this.mercadoria.preco_venda.valor = this.trataValor(this.mercadoria.preco_venda.valor);
                                this.mercadoria.preco_custo.valor = this.trataValor(this.mercadoria.preco_custo.valor);
                                this.mercadoria.preco_venda.observacoes.desconto_maximo = this.trataValor(this.mercadoria.preco_venda.observacoes.desconto_maximo);
                                this.save_mercadoria(this.mercadoria);
                                this.$validator.reset();
                                this.mercadoria = this.buildForm();
                            }
                        });
                    }
                });
            },

            trataValor(valor) {
                let valor_ = valor.replace('.','');
                return  parseFloat(valor_.replace(',','.'));
            }
        }
    }
</script>

<style scoped>

</style>