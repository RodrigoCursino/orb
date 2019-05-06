<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listCategorias"
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
            this.set_list_categorias();
        },
        computed: {
            ...mapState('Categoria', {
                listCategorias: state => {
                    return state.listCategorias;
                }
            })
        },
        methods: {
            ...mapActions('Categoria',['set_list_categorias'])
        }
    }
</script>

<style scoped>

</style>