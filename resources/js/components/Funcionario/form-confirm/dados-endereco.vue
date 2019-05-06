<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Lougradouro : ${funcionario.endereco.logradouro} Nº ${funcionario.endereco.numero}`}}</p>
                    <p class="text-lg-center font-weight-bold">{{`CEP : ${funcionario.endereco.cep}               Bairro : ${funcionario.endereco.bairro}` }}</p>
                    <p class="text-lg-center font-weight-bold">{{`${funcionario.endereco.cidade} - ${funcionario.endereco.estado} - ${funcionario.endereco.pais}` }}</p>
                </div>
            </v-flex>

        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-endereco",
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