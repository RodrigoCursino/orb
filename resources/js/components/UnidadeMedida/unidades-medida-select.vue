<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listUnidadesMedida"
            item-text="legenda"
            return-object
            :error-messages="errors.collect('unidade_medida_id')"
            label="Unidade Medida"
            data-vv-name="unidade_medida_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "unidades-medida-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.set_list_unidades_medida();
        },
        computed: {
            ...mapState('UnidadeMedida', {
                listUnidadesMedida: state => {
                    return state.listUnidadesMedida;
                }
            })
        },
        methods: {
            ...mapActions('UnidadeMedida',['set_list_unidades_medida'])
        }
    }
</script>

<style scoped>

</style>