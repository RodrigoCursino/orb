<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_fornecedores"
            item-value="id"
            item-text="nome_fantasia"
            :error-messages="errors.collect('fornecedor_id')"
            label="Fornecedor"
            return-object
            data-vv-name="fornecedor_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "fornecedor-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('Fornecedor',{
                list_fornecedores: state => {
                    return state.list_fornecedores;
                }
            })
        },
        methods: {
            ...mapActions('Fornecedor',['setList'])
        }
    }
</script>

<style scoped>

</style>