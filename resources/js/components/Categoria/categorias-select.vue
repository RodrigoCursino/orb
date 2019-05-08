<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_categorias"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('categoria_id')"
            label="Categoria"
            data-vv-name="categoria_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "categorias-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('Categoria', {
                list_categorias: state => {
                    return state.list_categorias;
                }
            })
        },
        methods: {
            ...mapActions('Categoria',['setList'])
        }
    }
</script>

<style scoped>

</style>