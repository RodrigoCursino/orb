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
                            Confirmar Dados
                        </v-stepper-step>
                    </v-stepper-header>
                     <!--Dados-->
                        <v-stepper-items>
                        <v-stepper-content step="1">
                                    <v-card
                                            class="mb-5"
                                            height="360px"
                                    >
                                        <v-container grid-list-md>
                                            <v-layout warp>
                                                <!-- CNPJ -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <v-text-field
                                                            v-model="form.cnpj"
                                                            :mask="cnpj"
                                                            return-masked-value
                                                            v-validate="'required'"
                                                            :error-messages="errors.collect('cnpj')"
                                                            label="CNPJ"
                                                            data-vv-name="cnpj"
                                                            required
                                                    ></v-text-field>
                                                </v-flex>
                                                <!-- CNPJ -->
                                                <!-- IE -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <v-text-field
                                                            v-model="form.ie"
                                                            v-validate="'required'"
                                                            :error-messages="errors.collect('ie')"
                                                            label="Inscrição Estadual"
                                                            data-vv-name="ie"
                                                            required
                                                    ></v-text-field>
                                                </v-flex>
                                                <!-- IE -->
                                            </v-layout>

                                            <v-layout warp>
                                                <!-- NOME FANTASIA -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <v-text-field
                                                            v-model="form.nome_fantasia"
                                                            v-validate="'required'"
                                                            :error-messages="errors.collect('nome_fantasia')"
                                                            label="Nome Fantasia"
                                                            data-vv-name="nome_fantasia"
                                                            required
                                                    ></v-text-field>
                                                </v-flex>
                                                <!-- NOME FANTASIA -->
                                                <!-- RAZÃO SOCIAL -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <v-text-field
                                                            v-model="form.razao_social"
                                                            v-validate="'required'"
                                                            :error-messages="errors.collect('razao_social')"
                                                            label="Razão Social"
                                                            data-vv-name="razao_social"
                                                            required
                                                    ></v-text-field>
                                                </v-flex>
                                                <!-- RAZÃO SOCIAL -->
                                            </v-layout>


                                            <v-layout warp>
                                                <!-- RAZÃO SOCIAL -->
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
                                                            v-model="form.observacao"
                                                            data-vv-name="observacao"
                                                            required
                                                    ></v-textarea>
                                                </v-flex>
                                                <!-- RAZÃO SOCIAL -->
                                                <!-- RAZÃO SOCIAL -->
                                            </v-layout>
                                            <!-- Fornece Mercadoria -->
                                            <v-switch right
                                                      label="Fornece Mercadoria"
                                                      v-model="form.forn_mercadoria"
                                            >
                                            </v-switch>
                                            <!-- Fornece Mercadoria -->
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

                            <!-- ENDEREÇO -->
                            <v-stepper-content step="2">
                                <v-card
                                        class="mb-5"
                                        height="360px"
                                >
                                    <v-container grid-list-md>
                                    <!-- Logradouro e Número -->
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.cep"
                                                    :mask="mask"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('cep')"
                                                    label="CEP"
                                                    data-vv-name="cep"
                                                    @change="getEndereco"
                                                    return-masked-value
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <!-- Logradouro e Número -->
                                    <!-- Logradouro e Número -->
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md10
                                                lg10
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.logradouro"
                                                    v-validate="'required|max:150'"
                                                    :counter="150"
                                                    :error-messages="errors.collect('logradouro')"
                                                    label="Logradouro"
                                                    data-vv-name="logradouro"
                                                    required
                                            ></v-text-field>
                                        </v-flex>

                                        <v-flex
                                                xs12
                                                md2
                                                lg2
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.numero"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('numero')"
                                                    label="N°"
                                                    data-vv-name="numero"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <!-- Logradouro e Número -->
                                    <!-- Bairro cidade -->
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.bairro"
                                                    v-validate="'required'"
                                                    :counter="150"
                                                    :error-messages="errors.collect('bairro')"
                                                    label="Bairro"
                                                    data-vv-name="bairro"
                                                    required
                                            ></v-text-field>
                                        </v-flex>

                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.cidade"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('cidade')"
                                                    label="Cidade"
                                                    data-vv-name="cidade"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <!-- Bairro cidade -->
                                    <!-- Estado País -->
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.estado"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('estado')"
                                                    label="Estado"
                                                    data-vv-name="estado"
                                                    required
                                            ></v-text-field>
                                        </v-flex>

                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.endereco.pais"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('pais')"
                                                    label="País"
                                                    data-vv-name="pais"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <!-- Estado País -->
                                    </v-container>
                                </v-card>

                                <v-btn
                                        color="primary"
                                        @click="validateAddress(form.endereco)"
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
                                    <v-container grid-list-md>
                                    <!-- NOME -->
                                    <v-layout>
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-text-field
                                                    v-model="form.contato.nome"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('nome')"
                                                    label="Nome"
                                                    data-vv-name="nome"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <!-- Logradouro e Número -->

                                    <!-- EMAIL -->
                                    <v-layout>
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-text-field
                                                    v-model="form.contato.email"
                                                    v-validate="'required|email'"
                                                    :error-messages="errors.collect('email')"
                                                    label="Email"
                                                    data-vv-name="email"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <!-- EMAIL -->
                                    <!-- Celular e Telefone -->
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.contato.celular"
                                                    v-validate="'required'"
                                                    :mask="celularMask"
                                                    :counter="150"
                                                    :error-messages="errors.collect('celular')"
                                                    label="Celular"
                                                    return-masked-value
                                                    data-vv-name="celular"
                                                    required
                                            ></v-text-field>
                                        </v-flex>

                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.contato.telefone"
                                                    v-validate="'required'"
                                                    :mask="telefoneMask"
                                                    return-masked-value
                                                    :error-messages="errors.collect('telefone')"
                                                    label="Telefone"
                                                    data-vv-name="telefone"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    </v-container>
                                    <!-- Celular e Telefone -->
                                </v-card>

                                <v-btn
                                        color="primary"
                                        @click="validateContacts(form.contato)"
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
                                    <v-container grid-list-md>
                                    <v-layout>
                                        <!-- Banco -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-select
                                                    v-model="form.dados_bancarios.banco_id"
                                                    v-validate="'required'"
                                                    :items="list_bancos"
                                                    item-value="id"
                                                    item-text="nome"
                                                    :error-messages="errors.collect('banco_id')"
                                                    label="Banco"
                                                    data-vv-name="banco_id"
                                                    required
                                            >
                                            </v-select>
                                        </v-flex>
                                        <!-- Banco -->
                                        <!-- Agência -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.dados_bancarios.agencia"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('agencia')"
                                                    label="Agência"
                                                    data-vv-name="agencia"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <!-- Agência -->
                                    </v-layout>
                                    <v-layout>
                                        <!-- TIPO  -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-select
                                                    v-model="form.dados_bancarios.tipo"
                                                    v-validate="'required'"
                                                    :items="tipos"
                                                    item-value="value"
                                                    :error-messages="errors.collect('tipo')"
                                                    label="Tipo de Conta"
                                                    data-vv-name="tipo"
                                                    required
                                            ></v-select>
                                        </v-flex>
                                        <!-- TIPO -->

                                        <!-- Conta -->
                                        <v-flex
                                                xs12
                                                md6
                                                lg6
                                        >
                                            <v-text-field
                                                    v-model="form.dados_bancarios.conta"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('conta')"
                                                    label="CC"
                                                    data-vv-name="conta"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <!-- Conta -->
                                    </v-layout>
                                    </v-container>
                               </v-card>

                                <v-btn
                                        color="primary"
                                        @click="validateDadosBancarios(form.dados_bancarios)"
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
    import FornecedorConfirm from "./fornecedor-confirm";
    export default {
        name: 'fornecedor-modal',
        components: {FornecedorConfirm},
        $_veeValidate: {
            validator: 'new'
        },
        data () {
            return {
                formdados: {},
                form: {},
                endereco: {
                    ativo: 1,
                    bairro: "",
                    cep: "",
                    cidade:"",
                    complemento:"",
                    estado:"",
                    logradouro:"",
                    numero:"",
                    pais:"",
                },
                dados_bancarios: {
                    agencia:"",
                    ativo:1,
                    banco_id:"",
                    conta:"",
                    tipo:"CORRENTE"
                },
                contato: {
                    ativo:1,
                    celular:"(00) 00000-0000",
                    email:"",
                    nome:"",
                    telefone:"(00) 0000-0000",

                },
                tipos: [
                    {value: 'POUPANCA', text:'Poupança'},
                    {value: 'CORRENTE', text:'Corrente'}
                ],
                e1: 0,
                cnpj: "##.###.###/####-##",
                mask: '#####-###',
                celularMask : '(##) #####-####',
                telefoneMask: '(##) ####-####',
                dictionary:  {
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
                    return 'Editar Fornecedor';
                } else {
                    return 'Cadastrar Fornecedor';
                };
            },
            ...mapGetters('Endereco',['get_endereco']),
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
        methods: {
            ...mapActions('Fornecedor', ['save_fornecedor','add_fornecedor','close_form']),
            ...mapActions('Endereco', ['get_cep','set_endereco']),
            ...mapActions('Banco',['get_list_bancos']),

            edit (form) {
                this.form = this.buildForm(form);
                this.close_form();
            },

            buildForm (form) {
                return {
                    ativo:              1,
                    cnpj:               form                 ? form.cnpj               : null,
                    contato:            form.contato         ? form.contato            : this.contato,
                    dados_bancarios:    form.dados_bancarios ? form.dados_bancarios    : this.dados_bancarios,
                    endereco:           form.endereco        ? form.endereco           : this.endereco,
                    forn_mercadoria:    form                 ? form.forn_mercadoria    : false,
                    id:                 form                 ? form.id                 : 0,
                    ie:                 form                 ? form.ie                 : null,
                    nome_fantasia:      form                 ? form.nome_fantasia      : null,
                    observacao:         form                 ? form.observacao         : null,
                    razao_social:       form                 ? form.razao_social       : null,

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
                this.$validator.validateAll(scope).then((result) => {
                    if (result) {
                        this.e1++;
                    }
                });
            },

            validateAddress (scope) {
                    this.$validator.validateAll(scope).then(result => {
                        if (result) {
                            this.e1++;
                        }
                    });
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
                        this.add_fornecedor(this.form);
                        this.e1++;
                    }
                });
            },
            getEndereco() {
                const cep = this.form.endereco.cep.replace('-','');
                this.get_cep(cep);
                this.form.endereco = this.get_endereco;
            },
            save() {
                this.e1 = 1;
                this.save_fornecedor(this.form);
                this.form = this.buildForm({});
            }

        }
    }
</script>
<style scoped>

</style>