<template>
    <div>
        <v-btn
                fab
                bottom
                right
                color="pink"
                dark
                fixed
                @click="open"
        >
            <v-icon>add</v-icon>
        </v-btn>
        <v-dialog v-model="closeForm"
                  width="900px"
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
                           @click="clear"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>
                <!-- FORM -->
                <v-stepper v-model="e1">
                    <v-stepper-header>
                        <v-stepper-step
                                :complete="e1 > 1"
                                step="1">
                            Dados
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step :complete="e1 > 2"
                                        step="2">
                            Preços da Mercadoria
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step :complete="e1 > 3"
                                        step="3">
                            Confirmar Dados
                        </v-stepper-step>
                    </v-stepper-header>
                    <!--Dados-->
                    <v-stepper-items>
                        <!--Dados-->
                        <v-stepper-content step="1">
                            <v-card
                                    class="mb-5"
                                    height="460px"
                            >
                                <v-container grid-list-md>
                                    <v-layout warp>
                                        <!-- Nome -->
                                            <v-flex
                                                    xs12
                                                    md3
                                                    lg3
                                            >
                                                <v-text-field
                                                        v-model="form.nome"
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
                                                md3
                                                lg3
                                        >
                                            <ncms-select v-model="form.ncm"
                                                         v-validate="'required'"
                                            ></ncms-select>
                                        </v-flex>
                                        <!-- NCM -->
                                        <!-- Fornecedor -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <fornecedor-select v-model="form.fornecedor"
                                            ></fornecedor-select>
                                        </v-flex>
                                        <!-- Fornecedor -->
                                        <!-- Fornecedor -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <fabricante-select :search="true" v-model="form.marca.fabricante_id"
                                            ></fabricante-select>
                                        </v-flex>
                                        <!-- Fornecedor -->
                                    </v-layout>
                                    <v-layout warp>
                                        <!-- Marca -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <marcas-select v-model="form.marca">
                                            </marcas-select>
                                        </v-flex>
                                        <!-- Marca -->
                                        <!-- Categoria -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <categorias-select v-model="form.categoria" >
                                            </categorias-select>
                                        </v-flex>
                                        <!-- Categoria -->
                                        <!-- Grupo -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <grupos-select v-model="form.grupo">
                                            </grupos-select>
                                        </v-flex>
                                        <!-- Grupo -->
                                        <!-- Sub Grupo -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <sub-grupos-select v-model="form.sub_grupo">
                                            </sub-grupos-select>
                                        </v-flex>
                                        <!-- Sub Grupo -->
                                        <!-- Coleções -->
                                        <v-flex
                                                xs12
                                                md3
                                                lg3
                                        >
                                            <colecoes-select v-model="form.colecao">
                                            </colecoes-select>
                                        </v-flex>
                                        <!-- Coleções -->
                                    </v-layout>

                                    <v-layout warp>
                                        <!-- Linha -->
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <linhas-select v-model="form.linha">
                                            </linhas-select>
                                        </v-flex>
                                        <!-- Linha -->
                                        <!-- Unidade Medida -->
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <unidades-medida-select v-model="form.unidade_medida">
                                            </unidades-medida-select>
                                        </v-flex>
                                        <!-- Unidade Medida -->
                                        <!-- Unidade Medida -->
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <unidades-caixa-select v-model="form.unidade_varejo">
                                            </unidades-caixa-select>
                                        </v-flex>
                                        <!-- Unidade Medida -->
                                    </v-layout>
                                    <v-layout>
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-textarea
                                                    name="observacao"
                                                    box
                                                    label="Observação"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('observacao')"
                                                    auto-grow
                                                    row-height="25"
                                                    v-model="form.observacao"
                                                    data-vv-name="observacao"
                                                    required
                                            ></v-textarea>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-card>
                            <v-btn
                                    color="primary"
                                    @click="validateForm(form)"
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>
                        <!--Dados-->

                        <!-- Preco -->
                        <v-stepper-content step="2">
                            <v-card
                                    class="mb-5"
                                    height="360px"
                            >
                                <v-container grid-list-md>
                                    <v-layout>
                                        <preco-mercadoria-index></preco-mercadoria-index>
                                    </v-layout>
                                </v-container>
                            </v-card>

                            <v-btn
                                    color="primary"
                                    @click=""
                            >
                                Continue
                            </v-btn>

                            <v-btn flat
                                   @click="e1--"
                            >
                                Voltar
                            </v-btn>
                        </v-stepper-content>
                        <!-- Preco -->

                        <!-- Confimação -->
                        <v-stepper-content step="3">
                            <v-card
                                    class="mb-5"
                                    height="360px"
                            >
                                <mercadoria-confirm></mercadoria-confirm>
                            </v-card>
                            <v-layout align-center justify-end row>
                                <v-btn  color="primary"
                                        outline
                                        round
                                        @click="save()"
                                >
                                    Salvar
                                </v-btn>

                                <v-btn flat
                                       @click="e1--"
                                >
                                    Voltar
                                </v-btn>
                            </v-layout>
                        </v-stepper-content>
                        <!-- Confimação -->
                    </v-stepper-items>
                    <!--Dados-->
                </v-stepper>
                <!-- FORM -->
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    import {mapState, mapActions, mapGetters} from 'vuex';
    import MercadoriaConfirm from "./mercadoria-confirm";
    import FornecedorSelect from "../Fornecedor/fornecedor-select";
    import FabricanteSelect from "../Fabricante/fabricante-select";
    import DepartamentoSelect from "../Departamento/departamento-select";
    import InputMoney from "../shared/input-money";
    import InputDate from "../shared/input-date";
    import NcmsSelect from "../NCM/ncms-select";
    import MarcasSelect from "../Marca/marcas-select";
    import GruposSelect from "../Grupo/grupos-select";
    import CategoriasSelect from "../Categoria/categorias-select";
    import ColecoesSelect from "../Colecao/colecoes-select";
    import SubGruposSelect from "../SubGrupo/sub-grupos-select";
    import UnidadesMedidaSelect from "../UnidadeMedida/unidades-medida-select";
    import UnidadesCaixaSelect from "../UnidadeCaixa/unidades-caixa-select";
    import LinhasSelect from "../Linha/linhas-select";
    import PrecoMercadoriaIndex from "./PrecoMercadoria/preco-mercadoria-index";
    export default {
        name: 'mercadoria-modal',
        components: {
            PrecoMercadoriaIndex,
            LinhasSelect,
            UnidadesCaixaSelect,
            UnidadesMedidaSelect,
            SubGruposSelect,
            CategoriasSelect,
            MarcasSelect,
            ColecoesSelect,
            GruposSelect,
            NcmsSelect,
            InputDate,
            DepartamentoSelect,
            InputMoney,
            MercadoriaConfirm,
            FornecedorSelect,
            FabricanteSelect
        },
        $_veeValidate: {
            validator: 'new'
        },
        data () {
            return {
                form: {},
                categoria: {
                  id: 0,
                  nome: '',
                },
                colecao: {
                    id: 0,
                    nome: '',
                },
                preco_custo: [],
                preco_venda: [],
                detalhes_preco_venda: {
                    desconto_maximo: 0,
                    descricao:"",
                    id:0,
                    observacao:"",
                    validade:"",
                },
                unidade_varejo: {
                    descricao:"",
                    id:0,
                    legenda:""
                },
                unidade_medida: {
                    descricao:"",
                    id:0,
                    legenda:""
                },
                linha: {
                    id: 0,
                    nome: '',
                },
                marca: {
                    id: 0,
                    nome: '',
                    fabricante_id:0
                },
                ncm: {
                    cod:"",
                    descricao:"",
                    id:0,
                },
                grupo: {
                    id: 0,
                    ncm_id: 0,
                    nome: "",
                    observacao: "",
                },
                sub_grupo: {
                    id: 0,
                    nome: "",
                    grupo_id: 0
                },
                fornecedor: {
                    cnpj:"",
                    contato_id:0,
                    dados_bancarios_id:0,
                    endereco_id:0,
                    forn_mercadoria:0,
                    id:0,
                    ie:"",
                    nome_fantasia:"",
                    observacao:"",
                    razao_social:""
                },
                e1: 0,
                menu : false,
                dictionary:  {
                    custom: {
                        nome: {
                            required: () => 'Este é Obrigatório',
                        },
                        observacao: {
                            required: () => 'O campo de observações é obrigatória',
                        },
                    }
                }
            }
        },
        created() {
            this.form = this.buildForm(this.form);
        },
        mounted() {
            this.get_list_bancos();
            this.$validator.localize('en', this.dictionary)
        },
        computed: {
            title: function () {
                if(this.form.id) {
                    return 'Editar Mercadoria';
                } else {
                    return 'Cadastrar Mercadoria';
                };
            },
            ...mapGetters('Endereco',['get_endereco']),
            ...mapState('Banco',{
                    list_bancos: state => {
                        return state.list_bancos;
                    }
                }
            ),
            ...mapState('Mercadoria',{
                    closeForm: state => {
                        return state.closeForm;
                    }
                }
            )
        },
        methods: {
            ...mapActions('Mercadoria', ['save_form','add','close_form']),
            ...mapActions('Endereco', ['get_cep','set_endereco']),
            ...mapActions('Banco',['get_list_bancos']),

            edit (form) {
                this.form = this.buildForm(form);
                this.close_form();
            },

            buildForm (form) {
                return {
                    ativo:             1,
                    id:                form.id               ? form.id                  : 0,
                    nome:              form                  ? form.nome                : null,
                    observacao:        form                  ? form.observacao          : null,
                    categoria:         form.categoria        ? form.categoria           : this.categoria,
                    colecao:           form.colecao          ? form.colecao             : this.colecao,
                    linha:             form.linha            ? form.linha               : this.linha,
                    marca:             form.marca            ? form.marca               : this.marca,
                    ncm:               form.ncm              ? form.ncm                 : this.ncm,
                    fornecedor:        form.fornecedor       ? form.fornecedor          : this.fornecedor,
                    sub_grupo:         form.sub_grupo        ? form.sub_grupo           : this.sub_grupo,
                    grupo:             form.grupo            ? form.grupo               : this.grupo,
                    colecao:           form.colecao          ? form.colecao             : this.colecao,
                    unidade_varejo:    form.unidade_varejo   ? form.unidade_varejo      : this.unidade_varejo,
                    unidade_medida:    form.unidade_medida   ? form.unidade_medida      : this.unidade_medida,
                }
            },

            open () {
                this.close_form();
            },

            clear () {
                this.e1 = 1;
                this.$validator.reset();
                this.form = this.buildForm({});
                this.close_form();
            },

            validateForm(scope) {
                if(this.form.ncm.id === 0) {
                    return alert("Selecione Um NCM");
                }
                if(this.form.categoria.id === 0) {
                    return alert("Selecione Uma Categoria");
                }
                if(this.form.colecao.id === 0) {
                    return alert("Selecione Uma Coleção");
                }
                if(this.form.marca.fabricante_id === 0) {
                    return alert("Selecione Um Fabricante");
                }
                if(this.form.marca.id === 0) {
                    return alert("Selecione Uma Marca");
                }
                if(this.form.grupo.id === 0) {
                    return alert("Selecione Um Grupo");
                }
                if(this.form.sub_grupo.id === 0) {
                    return alert("Selecione Um Sub Grupo");
                }
                if(this.form.linha.id === 0) {
                    return alert("Selecione Uma Linha");
                }
                if(this.form.unidade_medida.id === 0) {
                    return alert("Selecione Uma Unidade de Medida");
                }
                if(this.form.unidade_varejo.id === 0) {
                    return alert("Selecione Uma Unidade de Varejo");
                }
                this.$validator.validateAll(scope).then((result) => {
                    if (result) {
                        this.save_form(this.form);
                        this.e1++;
                    }
                });
            },

            save() {
                this.e1 = 1;
                this.form.salario = this.moneyFormat(this.form.salario);
                this.save_form(this.form);
                this.form = this.buildForm({});
            },

            moneyFormat(money) {

                if(typeof money == 'number') {
                    return money
                }
                let value = money.toString();

                if(value.length > 2) {
                    value = value.replace('.','');
                    value = value.replace('.','');
                    value = value.replace('.','');
                    value = value.replace('.','');
                }

                value = value.replace(',','.');

                console.log(value);

                return parseFloat(value);
            }

        }
    }
</script>
<style scoped>

</style>