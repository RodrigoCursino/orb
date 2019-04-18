
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

        <v-tab href="#tab-4">
            Dados Bancários
        </v-tab>

        <v-tab-item
                value="tab-1"
        >
           <dados-fornecedor style="margin-top: 15px"></dados-fornecedor>
        </v-tab-item>

        <v-tab-item
                value="tab-2"
        >
        </v-tab-item>

        <v-tab-item
                value="tab-3"
        >
            <v-card flat>
                <v-card-text>ops</v-card-text>
            </v-card>
        </v-tab-item>

        <v-tab-item
                value="tab-4"
        >
            <v-card flat>
                <v-card-text>ops</v-card-text>
            </v-card>
        </v-tab-item>
    </v-tabs>
</template>

<script>
    import {mapState} from 'vuex';
    import DadosFornecedor from "./form-confirm/dados-fornecedor";
    export default {
        name: "fornecedor-confirm",
        components: {DadosFornecedor},
        data: () => ({
           tab: '#dados_fornecedor'
        }),
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