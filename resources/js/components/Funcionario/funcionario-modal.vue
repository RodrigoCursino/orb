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
                            Comfirmar Dados
                        </v-stepper-step>
                    </v-stepper-header>
                     <!--Dados-->
                        <v-stepper-items>
                        <v-stepper-content step="1">
                                    <v-card
                                            class="mb-5"
                                            height="460px"
                                    >
                                        <v-container grid-list-md>
                                            <v-layout warp>
                                                <v-flex
                                                        xs12
                                                        md6
                                                        lg4
                                                >
                                                    <!-- nome -->
                                                    <unidade-select v-model="form.unidade"
                                                                    label="Unidade"
                                                                    v-validate="'required'"
                                                    ></unidade-select>
                                                    <v-input type="hidden"
                                                             v-validate="'required'"
                                                             :error-messages="errors.collect('unidade')"
                                                             data-vv-name="unidade"
                                                             required
                                                    >
                                                    </v-input>
                                                    <!-- nome -->
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg4
                                                >
                                                    <cargo-select v-model="form.cargo"
                                                                 v-validate="'required'"
                                                    ></cargo-select>
                                                    <v-input type="hidden"
                                                             v-validate="'required'"
                                                             :error-messages="errors.collect('cargo')"
                                                             data-vv-name="cargo"
                                                             required
                                                    >
                                                    </v-input>
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <!-- CPF -->
                                                    <departamento-select v-model="form.departamento"
                                                                  v-validate="'required'"
                                                    ></departamento-select>
                                                    <v-input type="hidden"
                                                             v-validate="'required'"
                                                             :error-messages="errors.collect('departamento')"
                                                             data-vv-name="departamento"
                                                             required
                                                    >
                                                    </v-input>
                                                    <!-- CPF -->
                                                </v-flex>
                                            </v-layout>


                                            <v-layout warp>
                                                <v-flex
                                                        xs12
                                                        md6
                                                        lg6
                                                >
                                                    <!-- nome -->
                                                    <v-text-field
                                                            v-model="form.nome"
                                                            v-validate="'required'"
                                                            :error-messages="errors.collect('nome')"
                                                            label="Nome"
                                                            data-vv-name="nome"
                                                            required
                                                    ></v-text-field>
                                                    <!-- nome -->
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >

                                                    <!-- apelido -->
                                                    <v-text-field
                                                            v-model="form.apelido"
                                                            v-validate="'required'"
                                                            :error-messages="errors.collect('apelido')"
                                                            label="Apelido"
                                                            data-vv-name="apelido"
                                                            required
                                                    ></v-text-field>
                                                    <!-- apelido -->
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <!-- CPF -->
                                                    <v-text-field
                                                            v-model="form.cpf"
                                                            v-validate="'required'"
                                                            :mask="cpf"
                                                            :error-messages="errors.collect('cpf')"
                                                            label="CPF"
                                                            data-vv-name="cpf"
                                                            required
                                                    ></v-text-field>
                                                    <!-- CPF -->
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >
                                                    <!-- RG -->
                                                    <v-text-field
                                                            v-model="form.rg"
                                                            v-validate="'required'"
                                                            :mask="rg"
                                                            :error-messages="errors.collect('rg')"
                                                            label="RG"
                                                            data-vv-name="rg"
                                                            required
                                                    ></v-text-field>
                                                    <!-- RG -->
                                                </v-flex>
                                            </v-layout>


                                            <v-layout warp>
                                                <v-flex
                                                        xs12
                                                        md6
                                                        lg6
                                                >
                                                    <!-- SEXO -->
                                                        <v-select
                                                                v-model="form.sexo"
                                                                v-validate="'required'"
                                                                :items="sexo"
                                                                item-value="value"
                                                                :error-messages="errors.collect('sexo')"
                                                                label="Sexo"
                                                                data-vv-name="sexo"
                                                                required
                                                        ></v-select>
                                                    <!-- SEXO -->
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >

                                                    <!-- apelido -->
                                                    <v-text-field
                                                            v-model="form.login"
                                                            label="Login"
                                                    ></v-text-field>
                                                    <!-- apelido -->
                                                </v-flex>
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg6
                                                >

                                                    <!-- apelido -->
                                                    <v-text-field
                                                            v-model="form.senha"
                                                            label="Senha"
                                                    ></v-text-field>
                                                    <!-- apelido -->
                                                </v-flex>
                                            </v-layout>

                                            <v-layout warp>
                                                <!-- NOME FANTASIA -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg4
                                                >
                                                    <input-money label="Salário" v-model="form.salario"></input-money>
                                                </v-flex>
                                                <!-- Data Nascimento -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg4
                                                >
                                                        <v-menu
                                                                ref="menu"
                                                                v-model="menu"
                                                                :close-on-content-click="false"
                                                                :nudge-right="40"
                                                                :return-value.sync="form.data_nascimento"
                                                                lazy
                                                                transition="scale-transition"
                                                                offset-y
                                                                full-width
                                                                min-width="290px"
                                                        >
                                                            <template v-slot:activator="{ on }">
                                                                <v-text-field
                                                                        v-model="form.data_nascimento"
                                                                        prepend-icon="event"
                                                                        readonly
                                                                        :error-messages="errors.collect('estado_civil')"
                                                                        label="Data de Nascimento"
                                                                        v-validate="'required'"
                                                                        data-vv-name="estado_civil"
                                                                        v-on="on"
                                                                ></v-text-field>
                                                            </template>
                                                            <v-date-picker  locale="pt-br" v-model="form.data_nascimento" no-title scrollable>
                                                                <v-spacer></v-spacer>
                                                                <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                                                                <v-btn flat color="primary" @click="$refs.menu.save(form.data_nascimento)">OK</v-btn>
                                                            </v-date-picker>
                                                        </v-menu>
                                                  </v-flex>
                                                <!-- Data Nascimento -->
                                                <!-- RAZÃO SOCIAL -->
                                                <v-flex
                                                        xs12
                                                        md12
                                                        lg4
                                                >
                                                    <v-select
                                                            v-model="form.estado_civil"
                                                            v-validate="'required'"
                                                            :items="estadoCivil"
                                                            item-value="value"
                                                            :error-messages="errors.collect('estado_civil')"
                                                            label="estado Cívil"
                                                            data-vv-name="estado_civil"
                                                            required
                                                    ></v-select>
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
                                                            label="Observação"
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
                                    <!-- Nome -->
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
                                    <funcionario-confirm></funcionario-confirm>
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
    import FuncionarioConfirm from "./funcionario-confirm";
    import UnidadeSelect from "../Unidade/unidade-select";
    import DepartamentoSelect from "../Departamento/departamento-select";
    import CargoSelect from "../Cargo/cargo-select";
    import InputMoney from "../shared/input-money";
    import InputDate from "../shared/input-date";
    export default {
        name: 'funcionario-modal',
        components: {InputDate, DepartamentoSelect, InputMoney, FuncionarioConfirm, UnidadeSelect,CargoSelect},
        $_veeValidate: {
            validator: 'new'
        },
        data () {
            return {
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
                contato: {
                    ativo:1,
                    celular:"(00) 00000-0000",
                    email:"",
                    nome:"",
                    telefone:"(00) 0000-0000",

                },
                departamento: {
                    descricao:"",
                    id: 0,
                    nome:"",
                    unidade_id:0,
                },
                dados_bancarios: {
                    agencia:"",
                    ativo:1,
                    banco_id:"",
                    conta:"",
                    tipo:"CORRENTE"
                },
                unidade: {
                    cnpj:"",
                    id:"",
                    ie:"",
                    loja:"",
                    nome:"",
                    nome_fantasia:"",
                    observacao:"",
                    razao_social:"",
                    unidade_estoque_id:0,
                },
                cargo: {
                    id:0,
                    nome:"",
                    observacao:""
                },
                e1: 0,
                menu : false,
                sexo: [
                    {value: 'MASCULINO',   text:'Masculino'},
                    {value: 'FEMININO',     text:'Feminino'}
                ],
                tipos: [
                    {value: 'POUPANCA', text:'Poupança'},
                    {value: 'CORRENTE', text:'Corrente'}
                ],
                natureza: [
                    {value: 'FISICA', text:'Fisíca'},
                    {value: 'JURIDICA', text:'Jurídica'}
                ],
                estadoCivil: [
                    {value: 'SOLTEIRO',   text:'Solteiro'},
                    {value: 'CASADO',     text:'Casado'},
                    {value: 'VIUVO',      text:'Viúvo'},
                    {value: 'DIVORCIADO', text:'Divorciado'},
                ],
                cpf: "###.###.###-##",
                cnpj: "##.###.###/####-##",
                mask: '#####-###',
                rg:   '##.###.###-#',
                celularMask : '(##) #####-####',
                telefoneMask: '(##) ####-####',
                celularMask : '(##) #####-####',
                telefoneMask: '(##) ####-####',
                dictionary:  {
                    custom: {
                        nome: {
                            required: () => 'Este é Obrigatório',
                        },
                        rg: {
                            required: () => 'Este campo é obrigatório',
                        },
                        cpf: {
                            required: () => 'Este campo é obrigatório',
                        },
                        salario: {
                            required: () => 'A Salário é obrigatória',
                        },
                        data_nascimento: {
                            required: () => 'A Data de Nascimento é obrigatória',
                        },
                        estado_civil: {
                            required: () => 'O campo Estado Cívil é obrigatória',
                        },
                        apelido: {
                            required: () => 'O campo Apelido é obrigatória',
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
                        }
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
                    return 'Editar Funcionario';
                } else {
                    return 'Cadastrar Funcionario';
                };
            },
            ...mapGetters('Endereco',['get_endereco']),
            ...mapState('Banco',{
                    list_bancos: state => {
                        return state.list_bancos;
                    }
                }
            ),
            ...mapState('Funcionario',{
                    closeForm: state => {
                        return state.closeForm;
                    }
                }
            )
        },
        methods: {
            ...mapActions('Funcionario', ['save_form','add','close_form']),
            ...mapActions('Endereco', ['get_cep','set_endereco']),
            ...mapActions('Banco',['get_list_bancos']),

            edit (form) {
                this.form = this.buildForm(form);
                this.close_form();
            },

            buildForm (form) {
                return {
                    ativo:              1,
                    id:                 form.id                ? form.id                 : 0,
                    nome:               form                   ? form.nome               : null,
                    apelido:            form                   ? form.apelido            : null,
                    login:              form                   ? form.login              : null,
                    senha:              form                   ? form.senha              : null,
                    salario:            form.salario           ? form.salario            : 0,
                    rg:                 form.rg                ? form.rg                 : null,
                    unidade_id:         form.unidade_id        ? form.unidade_id         : 0,
                    cargo_id:           form.cargo_id          ? form.cargo_id           : 0,
                    data_nascimento:    form.data_nascimento   ? form.data_nascimento    : new Date().toISOString().substr(0, 10),
                    estado_civil:       form.estado_civil      ? form.estado_civil       : "SOLTEIRO",
                    sexo:               form.sexo              ? form.sexo               : "FEMININO",
                    observacao:         form.observacao        ? form.observacao         : null,
                    cpf:                form.cpf               ? form.cpf                : null,
                    contato:            form.contato           ? form.contato            : this.contato,
                    endereco:           form.endereco          ? form.endereco           : this.endereco,
                    unidade:            form.unidade           ? form.unidade            : this.unidade,
                    cargo:              form.cargo             ? form.cargo              : this.cargo,
                    departamento:       form.departamento      ? form.departamento       : this.departamento,
                    dados_bancarios:    form.dados_bancarios   ? form.dados_bancarios    : this.dados_bancarios

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
                        this.add(this.form);
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