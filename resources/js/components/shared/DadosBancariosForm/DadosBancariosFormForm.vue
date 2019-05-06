<template>
        <v-form>
                <v-container>

                <v-layout>
                    <!-- Banco -->
                    <v-flex
                        xs12
                        md6
                        lg6
                        >
                        <v-select
                            v-model="model.banco_id"
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
                                v-model="model.agencia"
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
                                v-model="model.tipo"
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
                                v-model="model.conta"
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
        </v-form>
</template>

<script>
    import {mapActions,mapState} from 'vuex';
        export default {
                name: 'dados-bancarios-form',
                $_veeValidate: {
                    validator: 'new'
                },
                mounted () {
                    this.get_list_bancos();
                    this.set_dados_bancarios(this.model);
                    this.$validator.localize('en', this.dictionary);
                },
                computed: {
                    ...mapState('Banco',{
                                   list_bancos: state => {
                                       return state.list_bancos;
                                   }
                                 }
                                )
                },
                data: () => ({
                        tipos: [
                            {value: 'POUPANCA', text:'Poupança'},
                            {value: 'CORRENTE', text:'Corrente'}
                        ],
                        dictionary: {
                                custom: {
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

                        ...mapActions('DadosBancarios',['set_dados_bancarios']),

                        ...mapActions('Banco',['get_list_bancos']),

                        submit () {
                            this.set_dados_bancarios(this.model);
                            this.$validator.validateAll();

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