<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Nome para Contato: : ${unidade.contato.nome}`}}</p>
                    <p class="text-lg-center font-weight-normal">{{`Email : ${unidade.contato.email}` }}</p>
                    <p class="text-lg-center font-weight-normal">{{`Telefone: ${unidade.contato.telefone} - Celular: ${unidade.contato.celular}` }}</p>
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
            ...mapState('Unidade',{
                unidade: state => {
                    return state.unidade;
                }
            })
        },
    }
</script>

<style scoped>

</style>