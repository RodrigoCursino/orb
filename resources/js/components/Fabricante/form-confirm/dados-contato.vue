<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Nome para Contato: : ${fabricante.contato.nome}`}}</p>
                    <p class="text-lg-center font-weight-normal">{{`Email : ${fabricante.contato.email}` }}</p>
                    <p class="text-lg-center font-weight-normal">{{`Telefone: ${fabricante.contato.telefone} - Celular: ${fabricante.contato.celular}` }}</p>
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
            ...mapState('Fabricante',{
                fabricante: state => {
                    return state.fabricante;
                }
            })
        },
    }
</script>

<style scoped>

</style>