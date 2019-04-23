<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <div>
                    <p class="text-lg-center font-weight-bold">{{`Lougradouro : ${fornecedor.endereco.logradouro} Nº ${fornecedor.endereco.numero}`}}</p>
                    <p class="text-lg-center font-weight-bold">{{`CEP : ${fornecedor.endereco.cep}               Bairro : ${fornecedor.endereco.bairro}` }}</p>
                    <p class="text-lg-center font-weight-bold">{{`${fornecedor.endereco.cidade} - ${fornecedor.endereco.estado} - ${fornecedor.endereco.pais}` }}</p>
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