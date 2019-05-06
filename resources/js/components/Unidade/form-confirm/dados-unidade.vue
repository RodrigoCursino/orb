<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome Fantasia: ${unidade.nome_fantasia} \\\\ Razão Social : ${unidade.razao_social}`}}</h5>
            </v-flex>

            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome : ${unidade.nome} \\\\ CPNJ : ${unidade.cnpj}`}}</h5>
            </v-flex>

        </v-layout>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-light">{{`Centro de Custo : ${unidade.centro_custo.nome}  `}}</h5>
                <h5 class="font-weight-light">Unidade : {{unidade.loja ? "LOJA"  : "ESTOQUE"}}</h5>
            </v-flex>
            <v-flex
                    xs12
                    md4
                    lg4
            >
                <h5 class="font-weight-light">{{`Inscrição Estadual : ${unidade.ie}`}}</h5>
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
                        :value="unidade.observacao"
                ></v-textarea>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-unidade",
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