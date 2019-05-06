<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <div v-if="funcionario.dados_bancarios.banco">
                        <p class="text-lg-center font-weight-bold">{{`Banco: : ${funcionario.dados_bancarios.banco.nome}`}}</p>
                    </div>
                    <p class="text-lg-center font-weight-normal">{{`Agência : ${funcionario.dados_bancarios.agencia}` }}</p>
                    <p class="text-lg-center font-weight-normal">{{`Conta: ${funcionario.dados_bancarios.conta} - Tipo: ${funcionario.dados_bancarios.tipo}` }}</p>
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
            ...mapState('Funcionario',{
                funcionario: state => {
                    return state.funcionario;
                }
            })
        },
    }
</script>

<style scoped>

</style>