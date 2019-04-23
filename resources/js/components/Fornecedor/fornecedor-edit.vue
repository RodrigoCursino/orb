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
    import {mapState, mapActions} from 'vuex';
    import EnderecoForm from "../shared/EnderecoForm/EnderecoForm";
    import ContatoForm from "../shared/ContatoForm/ContatoForm";
    import DadosBancariosForm from "../shared/DadosBancariosForm/DadosBancariosFormForm";
    import FornecedorFormDados from "./form/fornecedor-form-dados";
    import FornecedorConfirm from "./fornecedor-confirm";
    export default {
        name: "fornecedor-edit",
        components: {FornecedorConfirm, FornecedorFormDados, DadosBancariosForm, ContatoForm, EnderecoForm},
        data: () => ({
            e1: 0
        }),
        computed: {
            ...mapState('Fornecedor',{
                fornecedor: state => {
                    return state.fornecedor;
                }
            })
        },
        methods: {

            ...mapActions('Fornecedor', ['save_fornecedor']),

            validateAddress () {
               var isValidAddress = this.$refs.endereco.submit();
               if(isValidAddress) {
                 this.e1 = 3;
               }
            },

            validateContacts () {
                var isValid = this.$refs.contato.submit();
                if(isValid) {
                    this.e1 = 4;
                }
            },

            validateFornecedor () {
                var isValid = this.$refs.fornecedor.submit();
                if(isValid) {
                    this.e1 = 2;
                }
            },

            validateDadosBancarios () {
                var isValid = this.$refs.dados_bancarios.submit();
                if(isValid) {
                   this.e1 = 5;
                }
            },
        }
    }
</script>

<style scoped>

</style>