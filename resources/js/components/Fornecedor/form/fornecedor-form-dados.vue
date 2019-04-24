<template>
    <v-form>
        <v-container>
            <input type="hidden" v-model="model.id">
            <input type="hidden" v-model="model.endereco_id">
            <input type="hidden" v-model="model.contato_id">
            <input type="hidden" v-model="model.dados_bancarios_id">
            <v-layout>
                <!-- CNPJ -->
                <v-flex
                        xs12
                        md12
                        lg6
                >
                    <v-text-field
                            v-model="model.cnpj"
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
                            v-model="model.ie"
                            v-validate="'required'"
                            :error-messages="errors.collect('ie')"
                            label="Inscrição Estadual"
                            data-vv-name="ie"
                            required
                    ></v-text-field>
                </v-flex>
                <!-- IE -->
            </v-layout>

            <v-layout>
                <!-- NOME FANTASIA -->
                <v-flex
                        xs12
                        md12
                        lg6
                >
                    <v-text-field
                            v-model="model.nome_fantasia"
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
                            v-model="model.razao_social"
                            v-validate="'required'"
                            :error-messages="errors.collect('razao_social')"
                            label="Razão Social"
                            data-vv-name="razao_social"
                            required
                    ></v-text-field>
                </v-flex>
                <!-- RAZÃO SOCIAL -->
            </v-layout>


            <v-layout>
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
                            v-model="model.observacao"
                            data-vv-name="observacao"
                            required
                    ></v-textarea>
                </v-flex>
                <!-- RAZÃO SOCIAL -->
                <!-- RAZÃO SOCIAL -->
            </v-layout>

            <v-switch right
                      label="Fornece Mercadoria"
                      v-model="model.forn_mercadoria"
                      >
            </v-switch>
            <!-- RAZÃO SOCIAL -->

        </v-container>
    </v-form>
</template>

<script>
    import {mapActions,mapState} from 'vuex';
    export default {
        name: "fornecedor-form-dados",
        $_veeValidate: {
            validator: 'new'
        },
        props: {
            model : {required:true}
        },
        mounted () {
            this.set_fornecedor(this.model);
            this.$validator.localize('en', this.dictionary);
        },
        computed: {
        },
        data: () => ({
            //20.031.397/0001-96
            cnpj: "##.###.###/####-##",
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
                }
            }
        }),



        methods: {
            ...mapActions('Fornecedor',
                ['viewFornecedor','set_fornecedor']
            ),

            submit () {
                console.log('Ops ',this.model);
                this.set_fornecedor(this.model);
                this.$validator.validateAll();
                if (this.errors.items.length > 0) {
                    return false;
                } else{
                    return true;
                }
            },

            clear () {
                this.name = ''
                this.email = ''
                this.select = null
                this.checkbox = null
                this.$validator.reset()
            },
        }
    }
</script>

<style scoped>

</style>