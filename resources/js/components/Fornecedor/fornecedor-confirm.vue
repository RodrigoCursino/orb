
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
           <dados-fornecedor class="confirm-content"></dados-fornecedor>
        </v-tab-item>

        <v-tab-item
                value="tab-2"
        >
            <dados-endereco v-if="fornecedor.endereco" class="confirm-content"></dados-endereco>
        </v-tab-item>

        <v-tab-item
                value="tab-3"
        >
            <dados-contato v-if="fornecedor.contato" class="confirm-content"></dados-contato>
        </v-tab-item>

        <v-tab-item
                value="tab-4"
        >
            <dados-dados-bancarios v-if="fornecedor.dados_bancarios" class="confirm-content"></dados-dados-bancarios>
        </v-tab-item>
    </v-tabs>
</template>

<script>
    import {mapState} from 'vuex';
    import DadosFornecedor from "./form-confirm/dados-fornecedor";
    import DadosEndereco from "./form-confirm/dados-endereco";
    import DadosContato from "./form-confirm/dados-contato";
    import DadosDadosBancarios from "./form-confirm/dados-dados-bancarios";
    export default {
        name: "fornecedor-confirm",
        components: {DadosDadosBancarios, DadosContato, DadosEndereco, DadosFornecedor},
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
    .confirm-content {
        margin-top: 50px
    }
</style>