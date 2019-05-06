<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Lougradouro : ${unidade.endereco.logradouro} Nº ${unidade.endereco.numero}`}}</p>
                    <p class="text-lg-center font-weight-bold">{{`CEP : ${unidade.endereco.cep}               Bairro : ${unidade.endereco.bairro}` }}</p>
                    <p class="text-lg-center font-weight-bold">{{`${unidade.endereco.cidade} - ${unidade.endereco.estado} - ${unidade.endereco.pais}` }}</p>
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