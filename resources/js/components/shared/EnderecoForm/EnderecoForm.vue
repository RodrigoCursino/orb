<template>
        <v-form>
                <v-container>
                <!-- Logradouro e Número -->
                <v-layout row>
                    <v-flex
                            xs12
                            md4
                            lg4
                    >
                        <v-text-field
                                :value.sync="endereco.cep"
                                :mask="mask"
                                v-validate="'required'"
                                :error-messages="errors.collect('cep')"
                                label="CEP"
                                data-vv-name="cep"
                                @change="get_CEP"
                                required
                        ></v-text-field>
                    </v-flex>
                </v-layout>
                <!-- Logradouro e Número -->

                <!-- Logradouro e Número -->
                <v-layout row>
                        <v-flex
                                xs12
                                md10
                                lg10
                        >
                                <v-text-field
                                        :value.sync="endereco.logradouro"
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
                                              :value.sync="endereco.numero"
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
                <v-layout row>
                    <v-flex
                            xs12
                            md6
                            lg6
                    >
                        <v-text-field
                                :value.sync="endereco.bairro"
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
                                :value.sync="endereco.cidade"
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
                <v-layout row>
                    <v-flex
                            xs12
                            md6
                            lg6
                    >
                        <v-text-field
                                :value.sync="endereco.estado"
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
                                :value.sync="endereco.pais"
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
        </v-form>
</template>

<script>
    import {mapActions,mapState} from 'vuex';
        export default {
                $_veeValidate: {
                    validator: 'new'
                },
                props: {
                    model : {required:true}
                },
                mounted () {
                    this.set_endereco(this.model);
                    this.$validator.localize('en', this.dictionary);
                },
                computed: {
                    ...mapState('Endereco',{
                        endereco: state => {
                            return state.endereco;
                        }
                    })
                },
                data: () => ({
                        mask: '#####-###',
                        dictionary: {
                                attributes: {
                                        email: 'E-mail Address'
                                        // custom attributes
                                },
                                custom: {
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
                                }
                        }
                }),



                methods: {
                        ...mapActions('Endereco',
                            ['get_CEP','set_endereco']
                        ),
                        submit () {
                                this.$validator.validateAll()
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