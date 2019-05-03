<template>
    <v-tabs fixed-tabs
    >
        <v-tabs-slider color="primary"></v-tabs-slider>

        <v-tab href="#tab-1">
            Dados Fornecedor
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
           <dados-fabricante class="confirm-content"></dados-fabricante>
        </v-tab-item>

        <v-tab-item
                value="tab-2"
        >
           <dados-endereco v-if="fabricante.endereco" class="confirm-content"></dados-endereco>
        </v-tab-item>

        <v-tab-item
                value="tab-3"
        >
            <dados-contato v-if="fabricante.contato" class="confirm-content"></dados-contato>
        </v-tab-item>

    </v-tabs>
</template>

<script>
    import {mapState} from 'vuex';
    import DadosFabricante from "./form-confirm/dados-fabricante";
    import DadosEndereco from "./form-confirm/dados-endereco";
    import DadosContato from "./form-confirm/dados-contato";
    export default {
        name: "fabricante-confirm",
        components: {DadosContato, DadosEndereco, DadosFabricante},
        data: () => ({

        }),
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
    .confirm-content {
        margin-top: 50px
    }
</style>