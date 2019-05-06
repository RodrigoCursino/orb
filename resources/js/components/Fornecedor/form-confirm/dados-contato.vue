<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Nome para Contato: : ${fornecedor.contato.nome}`}}</p>
                    <p class="text-lg-center font-weight-normal">{{`Email : ${fornecedor.contato.email}` }}</p>
                    <p class="text-lg-center font-weight-normal">{{`Telefone: ${fornecedor.contato.telefone} - Celular: ${fornecedor.contato.celular}` }}</p>
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