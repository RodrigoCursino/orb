<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_marcas"
            item-text="nome"
            :error-messages="errors.collect('marca_id')"
            label="Marca"
            return-object
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
            this.setList();
        },
        computed: {
            ...mapState('Marca', {
                list_marcas: state => {
                    return state.list_marcas;
                }
            })
        },
        methods: {
            ...mapActions('Marca',['setList'])
        }
    }
</script>

<style scoped>

</style>