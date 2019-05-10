<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listUnidadesCaixa"
            item-text="legenda"
            :error-messages="errors.collect('unidade_caixa_id')"
            label="Unidade Varejo"
            return-object
            data-vv-name="unidade_caixa_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "unidades-caixa-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.set_list_unidades_caixa();
        },
        computed: {
            ...mapState('UnidadeCaixa', {
                listUnidadesCaixa: state => {
                    return state.listUnidadesCaixa;
                }
            })
        },
        methods: {
            ...mapActions('UnidadeCaixa',['set_list_unidades_caixa'])
        }
    }
</script>

<style scoped>

</style>