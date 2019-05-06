<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Lougradouro : ${fabricante.endereco.logradouro} Nº ${fabricante.endereco.numero}`}}</p>
                    <p class="text-lg-center font-weight-bold">{{`CEP : ${fabricante.endereco.cep}               Bairro : ${fabricante.endereco.bairro}` }}</p>
                    <p class="text-lg-center font-weight-bold">{{`${fabricante.endereco.cidade} - ${fabricante.endereco.estado} - ${fabricante.endereco.pais}` }}</p>
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