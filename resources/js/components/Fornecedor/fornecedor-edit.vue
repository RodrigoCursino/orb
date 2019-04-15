<template>
    <v-stepper v-model="e1">
        <v-stepper-header>
            <v-stepper-step
                    :complete="e1 > 1"
                    step="1">
                Dados
            </v-stepper-step>

            <v-divider>
            </v-divider>

            <v-stepper-step :complete="e1 > 2"
                            step="2">
                Endereco
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 3"
                            step="3">
                Contato
            </v-stepper-step>
        </v-stepper-header>

        <v-stepper-items>
            <v-stepper-content step="1">
                <v-card
                        class="mb-5"
                        color="grey lighten-1"
                        height="200px"
                >
                    <!-- dados -->
                </v-card>

                <!--<v-btn-->
                        <!--color="primary"-->
                        <!--@click="e1 = 2"-->
                <!--&gt;-->
                    <!--Continue-->
                <!--</v-btn>-->

                <!--<v-btn flat>Cancel</v-btn>-->
            </v-stepper-content>

            <v-stepper-content step="2">
                <v-card
                        class="mb-5"
                >
                    <endereco-form v-if="fornecedor.endereco" :model="fornecedor.endereco"></endereco-form>
                </v-card>

                <v-btn
                        color="primary"
                        @click="e1 = 3"
                >
                    Continue
                </v-btn>

                <v-btn flat
                       @click="e1--"
                >
                    Voltar
                </v-btn>
            </v-stepper-content>

            <v-stepper-content step="3">
                <v-card
                        class="mb-5"
                        color="grey lighten-1"
                ></v-card>

                <v-btn
                        color="primary"
                        @click="e1 = 1"
                >
                    Continue
                </v-btn>

                <v-btn flat
                       @click="e1--"
                >
                    Voltar
                </v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>

<script>
    import {mapState} from 'vuex';
    import EnderecoForm from "../shared/EnderecoForm/EnderecoForm";
    export default {
        name: "fornecedor-edit",
        components: {EnderecoForm},
        data: () => ({
            e1: 2
        }),
        computed: {
            ...mapState('Fornecedor',{
                fornecedor: state => {
                    return state.fornecedor;
                }
            })
        }
    }
</script>

<style scoped>

</style>