<template>
        <v-form>
                <v-container>
                <!-- NOME -->
                <v-layout>
                    <v-flex
                            xs12
                            md12
                            lg12
                    >
                        <v-text-field
                                v-model="model.nome"
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
                                        v-model="model.email"
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
                <v-layout row>
                    <v-flex
                            xs12
                            md6
                            lg6
                    >
                        <v-text-field
                                v-model="model.celular"
                                v-validate="'required'"
                                :mask="celularMask"
                                :counter="150"
                                :error-messages="errors.collect('celular')"
                                label="Celular"
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
                                v-model="model.telefone"
                                v-validate="'required'"
                                :mask="telefoneMask"
                                :error-messages="errors.collect('telefone')"
                                label="Telefone"
                                data-vv-name="telefone"
                                required
                        ></v-text-field>
                    </v-flex>
                </v-layout>
                <!-- Celular e Telefone -->
        </v-container>
        </v-form>
</template>

<script>
    import {mapActions,mapState} from 'vuex';
        export default {
                name: 'contato-form',
                $_veeValidate: {
                    validator: 'new'
                },
                props: {
                    model : {required:true}
                },
                mounted () {
                    this.set_contato(this.model);
                    this.$validator.localize('en', this.dictionary);
                },
                computed: {
                    ...mapState('Contato',{
                        contato: state => {
                            return state.contato;
                        }
                    })
                },
                data: () => ({
                        celularMask : '(##) #####-####',
                        telefoneMask: '(##) ####-####',
                        dictionary: {
                                attributes: {
                                        email: 'E-mail Address'
                                },
                                custom: {
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
                                        nome: {
                                            required: () => 'O nome é obrigatório',
                                            // custom messages
                                        },
                                }
                        }
                }),



                methods: {

                        ...mapActions('Contato',['set_contato']),

                        submit () {
                            this.set_contato(this.model);
                            this.$validator.validateAll();
                            console.log("Contato", this.errors.items.length);
                            if (this.errors.items.length > 0) {
                                return false;
                            } else{
                                return true;
                            }
                        },
                }
        }

</script>

<style scoped>

</style>