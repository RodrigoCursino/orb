<template>
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
                Endereco
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 3"
                            step="3">
                Contato
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 4"
                            step="4">
                Dados Bancários
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 5"
                            step="5">
                Comfirmar Dados
            </v-stepper-step>

        </v-stepper-header>

        <!--Dados-->
        <v-stepper-items>
            <v-stepper-content step="1">
                <v-card
                        class="mb-5"
                        height="360px"
                >
                    <fornecedor-form-dados ref="fornecedor"
                                           v-if="fornecedor"
                                           :model="fornecedor"
                    ></fornecedor-form-dados>
                </v-card>

                <v-btn
                        color="primary"
                        @click="validateFornecedor"
                >
                    Continue
                </v-btn>

            </v-stepper-content>
            <!--Dados-->

            <!-- ENDEREÇO -->
            <v-stepper-content step="2">
                <v-card
                        class="mb-5"
                        height="360px"
                >
                    <endereco-form ref="endereco"
                                   v-if="fornecedor.endereco"
                                   :model="fornecedor.endereco"
                    ></endereco-form>
                </v-card>

                <v-btn
                        color="primary"
                        @click="validateAddress()"
                >
                    Continue
                </v-btn>

                <v-btn flat
                       @click="e1--"
                >
                    Voltar
                </v-btn>
            </v-stepper-content>
            <!-- ENDEREÇO -->

            <!-- CONTATO -->
            <v-stepper-content step="3">
                <v-card
                        class="mb-5"
                        height="360px"
                >
                    <contato-form ref="contato"
                                  v-if="fornecedor.contato"
                                  :model="fornecedor.contato"
                    ></contato-form>
                </v-card>

                <v-btn
                        color="primary"
                        @click="validateContacts"
                >
                    Continue
                </v-btn>

                <v-btn flat
                       @click="e1--"
                >
                    Voltar
                </v-btn>
            </v-stepper-content>
            <!-- CONTATO -->

            <!-- DADOS BANCÁRIOS -->
            <v-stepper-content step="4">
                <v-card
                        class="mb-5"
                        height="360px"
                >
                    <dados-bancarios-form ref="dados_bancarios"
                                          v-if="fornecedor.dados_bancarios"
                                          :model="fornecedor.dados_bancarios"
                    ></dados-bancarios-form>
                </v-card>

                <v-btn
                        color="primary"
                        @click="validateDadosBancarios"
                >
                    Continue
                </v-btn>

                <v-btn flat
                       @click="e1--"
                >
                    Voltar
                </v-btn>
            </v-stepper-content>
            <!-- DADOS BANCÁRIOS -->


            <!-- Confimação -->
            <v-stepper-content step="5">
                <v-card
                        class="mb-5"
                        height="360px"
                >
                    <fornecedor-confirm></fornecedor-confirm>
                </v-card>

                <v-layout align-center justify-end row>
                    <v-btn  color="primary"
                            outline
                            round
                            @click="save_fornecedor(fornecedor)"
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
    </v-stepper>
</template>
<script>
    import {mapState, mapActions, mapGetters} from 'vuex';
    import EnderecoForm from "../shared/EnderecoForm/EnderecoForm";
    import ContatoForm from "../shared/ContatoForm/ContatoForm";
    import DadosBancariosForm from "../shared/DadosBancariosForm/DadosBancariosFormForm";
    import FornecedorFormDados from "./form/fornecedor-form-dados";
    import FornecedorConfirm from "./fornecedor-confirm";
    export default {
        name: 'fornecedor-ops',
        $_veeValidate: {
            validator: 'new'
        },
        props: {
           editar: {
               required: false,
               default: false
           }
        },
        components: {FornecedorConfirm, FornecedorFormDados, DadosBancariosForm, ContatoForm, EnderecoForm},
        computed: {
            ...mapGetters('Endereco',['get_endereco']),
            ...mapGetters('Fornecedor',['get_fornecedor_default']),
            ...mapState('Banco',{
                    list_bancos: state => {
                        return state.list_bancos;
                    }
                }
            ),
            ...mapState('Fornecedor',{
                    closeForm: state => {
                        return state.closeForm;
                    }
                }
            )
        },
        data: () => ({
            validAddress: false,
            dialog: false,
            e1: 0,
            tipos: [
                {value: 'POUPANCA', text:'Poupança'},
                {value: 'CORRENTE', text:'Corrente'}
            ],
            fornecedorForm : {
                cnpj:"00.000.000/0000-00",
                contato: {
                    celular:"(00) 00000-0000",
                    email:"",
                    id:0,
                    nome:"",
                    telefone:"(00) 0000-0000",
                },
                contato_id:0,
                dados_bancarios:{
                    agencia:"",
                    banco_id:null,
                    conta:"",
                    tipo:"CORRENTE",
                },
                dados_bancarios_id:0,
                endereco:{},
                endereco_id:0,
                forn_mercadoria:false,
                id: 0,
                ie:"",
                nome_fantasia:"",
                observacao:"",
                razao_social:"",
            },
            cnpj: "##.###.###/####-##",
            mask: '#####-###',
            celularMask : '(##) #####-####',
            telefoneMask: '(##) ####-####',
            dictionary: {
                custom: {
                    cnpj: {
                        required: () => 'O CNPJ é obrigatório',
                    },
                    ie: {
                        required: () => 'A Inscrição Estadual é obrigatória',
                    },
                    nome_fantasia: {
                        required: () => 'O Nome Fantasia é obrigatório',
                    },
                    razao_social: {
                        required: () => 'A Razão Social é obrigatória',
                    },
                    observacao: {
                        required: () => 'O campo de observações é obrigatória',
                    },
                    logradouro: {
                        required: () => 'O lougradouro é obrigatório',
                        max: 'O maxímo de de caracters e de 150'
                        // custom messages
                    },
                    numero: {
                        required: () => 'O número é obrigatório',
                        // custom messages
                    },
                    bairro: {
                        required: () => 'O bairro é obrigatório',
                        // custom messages
                    },
                    cidade: {
                        required: () => 'O cidade é obrigatório',
                        // custom messages
                    },
                    estado: {
                        required: () => 'O estado é obrigatório',
                        // custom messages
                    },
                    pais: {
                        required: () => 'O país é obrigatório',
                        // custom messages
                    },
                    cep: {
                        required: () => 'O CEP é obrigatório',
                        // custom messages
                    },
                    email: {
                        required: () => 'O celular é obrigatório',
                        email: 'Por favor Insira um endereço de email válido'
                    },
                    celular: {
                        required: () => 'O celular é obrigatório',
                    },
                    telefone: {
                        required: () => 'O telefone é obrigatório',
                    },
                    agencia: {
                        required: () => 'A agência é obrigatória',
                    },
                    conta: {
                        required: () => 'A conta é obrigatória',
                    },
                    tipo: {
                        required: () => 'Selecione um tipo',
                    },
                    banco_id: {
                        required: () => 'Selecione um banco',
                    },
                }
            }
        }),
        methods: {
            ...mapActions('Fornecedor', ['save_fornecedor','add_fornecedor','close_form']),
            ...mapActions('Endereco', ['get_cep','set_endereco']),
            ...mapActions('Banco',['get_list_bancos']),

            validateAddress (scope) {
                console.log('Ops ', this.fornecedor);
                if (this.validAddress)  {
                    this.$validator.validateAll(scope).then(result => {
                        if (result) {
                            this.e1++;
                            this.validAddress = false;
                        }
                    });
                } else {
                    alert('Preencha o CEP');
                }
            },

            validateContacts (scope) {
                this.$validator.validateAll(scope).then(result => {
                    if (result) {
                        this.e1++;
                    }
                });
            },

            validateFornecedor (scope) {
                this.$validator.validateAll(scope).then(result => {
                    if (result) {
                        this.e1++;
                    }
                });
            },

            validateDadosBancarios (scope) {
                this.$validator.validateAll(scope).then(result => {
                    if (result) {
                        this.add_fornecedor(this.fornecedor);
                        this.e1++;
                    }
                });
            },

            edit() {
                this.fornecedorForm = this.get_fornecedor_default;
                this.close_form();
            },

            getEndereco() {
                const cep = this.fornecedorForm.endereco.cep.replace('-','');
                this.get_cep(cep);
                this.fornecedor.endereco = this.get_endereco;
                this.validAddress = true;
            },

            open () {
                this.close_form();
            },

            clear () {
                this.$validator.reset();
                this.close_form();
            },

        }
    }
</script>
<style scoped>

</style>