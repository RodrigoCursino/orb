<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_departamentos"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('departamento_id')"
            label="Departamento"
            return-object
            data-vv-name="departamento_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "departamento-select",
        mounted() {
            this.setList();
        },
        mixins: [require('../helpers/Mixins')],
        computed: {
            ...mapState('Departamento',{
                list_departamentos: state => {
                    return state.list_departamentos;
                }
            })
        },
        methods: {
            ...mapActions('Departamento',['setList','get_departamentos_by_unidade'])
        }
    }
</script>

<style scoped>

</style>