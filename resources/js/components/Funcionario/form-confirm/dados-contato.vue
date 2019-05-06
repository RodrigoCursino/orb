<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Nome para Contato: : ${funcionario.contato.nome}`}}</p>
                    <p class="text-lg-center font-weight-normal">{{`Email : ${funcionario.contato.email}` }}</p>
                    <p class="text-lg-center font-weight-normal">{{`Telefone: ${funcionario.contato.telefone} - Celular: ${funcionario.contato.celular}` }}</p>
                </div>
            </v-flex>

        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-contato",
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