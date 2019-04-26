<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listMarcas"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('marca_id')"
            label="Marca"
            data-vv-name="marca_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "marcas-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.set_list_marcas();
        },
        computed: {
            ...mapState('Marca', {
                listMarcas: state => {
                    return state.listMarcas;
                }
            })
        },
        methods: {
            ...mapActions('Marca',['set_list_marcas'])
        }
    }
</script>

<style scoped>

</style>