<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Banco: : ${fornecedor.dados_bancarios.banco.nome}`}}</p>
                    <p class="text-lg-center font-weight-normal">{{`Agência : ${fornecedor.dados_bancarios.agencia}` }}</p>
                    <p class="text-lg-center font-weight-normal">{{`Conta: ${fornecedor.dados_bancarios.conta} - Tipo: ${fornecedor.dados_bancarios.tipo}` }}</p>
                </div>
            </v-flex>

        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-dados-bancarios",
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