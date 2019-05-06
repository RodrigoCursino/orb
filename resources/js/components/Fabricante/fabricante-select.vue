<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_fabricantes"
            item-value="id"
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
        mixins: [require('../helpers/Mixins')],
        computed: {
            ...mapState('Fabricante',{
                list_fabricantes: state => {
                    return state.list_fabricantes;
                }
            })
        },
        methods: {
            ...mapActions('Fabricante',['setList'])
        }
    }
</script>

<style scoped>

</style>