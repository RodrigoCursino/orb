<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_unidades_estoque"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('unidade_estoque_id')"
            label="Estoque"
            data-vv-name="unidade_estoque_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "unidade-estoque-select",
        mounted() {
            this.getEstoqueList();
        },
        mixins: [require('../helpers/Mixins')],
        computed: {
            ...mapState('Unidade',{
                list_unidades_estoque: state => {
                    return state.list_unidades_estoque;
                }
            })
        },
        methods: {
            ...mapActions('Unidade',['getEstoqueList']),
        }
    }
</script>

<style scoped>

</style>