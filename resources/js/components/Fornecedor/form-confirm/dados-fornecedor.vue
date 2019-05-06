<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome Fantasia: ${fornecedor.nome_fantasia}`}}</h5>
            </v-flex>

            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Razão Social: ${fornecedor.razao_social}`}}</h5>
            </v-flex>

        </v-layout>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-light">{{`CNPJ : ${fornecedor.cnpj}`}}</h5>
            </v-flex>
            <v-flex
                    xs12
                    md4
                    lg4
            >
                <h5 class="font-weight-light">{{`Inscrição Estadual : ${fornecedor.ie}`}}</h5>
            </v-flex>
        </v-layout>
        <v-divider inset></v-divider>
        <v-layout style="margin-top: 15px">
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <v-textarea
                        box
                        disabled
                        label="Observação"
                        :value="fornecedor.observacao"
                ></v-textarea>
            </v-flex>
        </v-layout>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <h5 class="font-weight-bold text-lg-right">{{fornecedor.forn_mercadoria ? "Fornecedor de Mercadoria "  : "Não Fornece Mercadoria "}}</h5>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-fornecedor",
        computed: {
            ...mapState('Fornecedor',{
                fornecedor: state => {
                    return state.fornecedor;
                }
            })
        },
    }
</script>

<style scoped>

</style>