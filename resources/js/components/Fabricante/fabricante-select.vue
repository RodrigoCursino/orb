<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_fabricantes"
            item-value="id"
            @change="getMarcas"
            item-text="nome_fantasia"
            :error-messages="errors.collect('fabricante_id')"
            label="Fabricante"
            data-vv-name="fabricante_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "fabricante-select",
        props: {search: {required:false} },
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('Fabricante',{
                list_fabricantes: state => {
                    return state.list_fabricantes;
                }
            })
        },
        methods: {
            ...mapActions('Fabricante',['setList']),
            ...mapActions('Marca',['set_marcas_by_fabricante']),
            getMarcas(e) {
                if(this.search) {
                    this.set_marcas_by_fabricante(this.internalValue);
                }
            }
        }
    }
</script>

<style scoped>

</style>