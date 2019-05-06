<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_colecoes"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('colecao_id')"
            label="Coleção"
            data-vv-name="colecao_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "colecoes-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.set_list_colecoes();
        },
        computed: {
            ...mapState('Colecao', {
                list_colecoes: state => {
                    return state.list_colecoes;
                }
            })
        },
        methods: {
            ...mapActions('Colecao',['set_list_colecoes'])
        }
    }
</script>

<style scoped>

</style>