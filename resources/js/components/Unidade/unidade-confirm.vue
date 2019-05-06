<template>
    <v-tabs fixed-tabs
    >
        <v-tabs-slider color="primary"></v-tabs-slider>

        <v-tab href="#tab-1">
            Dados Unidade
        </v-tab>

        <v-tab href="#tab-2">
            Dados de Endereço
        </v-tab>

        <v-tab href="#tab-3">
            Dados de Contato
        </v-tab>

        <v-tab-item
                value="tab-1"
        >
           <dados-unidade v-if="unidade.centro_custo" class="confirm-content"></dados-unidade>
        </v-tab-item>

        <v-tab-item
                value="tab-2"
        >
           <dados-endereco v-if="unidade.endereco" class="confirm-content"></dados-endereco>
        </v-tab-item>

        <v-tab-item
                value="tab-3"
        >
            <dados-contato v-if="unidade.contato" class="confirm-content"></dados-contato>
        </v-tab-item>

    </v-tabs>
</template>

<script>
    import {mapState} from 'vuex';
    import DadosUnidade from "./form-confirm/dados-unidade";
    import DadosEndereco from "./form-confirm/dados-endereco";
    import DadosContato from "./form-confirm/dados-contato";
    export default {
        name: "unidade-confirm",
        components: {DadosContato, DadosEndereco, DadosUnidade},
        data: () => ({

        }),
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
    .confirm-content {
        margin-top: 50px
    }
</style>