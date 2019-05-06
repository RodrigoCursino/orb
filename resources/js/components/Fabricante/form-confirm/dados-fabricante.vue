<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome Fantasia: ${fabricante.nome_fantasia}`}}</h5>
            </v-flex>

            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome : ${fabricante.nome}`}}</h5>
            </v-flex>

        </v-layout>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-light">{{fabricante.natureza_juridica == "JURIDICA" ? `CNPJ : ${fabricante.cnpj}`  : `CPF : ${fabricante.cpf}`}}</h5>
            </v-flex>
            <v-flex
                    xs12
                    md4
                    lg4
            >
                <h5 class="font-weight-light">{{`Inscrição Estadual : ${fabricante.ie}`}}</h5>
            </v-flex>
        </v-layout>
        <v-divider inset></v-divider>
        <v-layout style="margin-top: 15px">
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <v-textarea
                        box
                        disabled
                        label="Observação"
                        :value="fabricante.observacao"
                ></v-textarea>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-fabricante",
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