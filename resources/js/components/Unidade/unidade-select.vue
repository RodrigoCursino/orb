<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_unidades"
            item-value="id"
            item-text="nome_fantasia"
            :error-messages="errors.collect('unidade_id')"
            label="Unidade"
            @change="getDepartamentos"
            return-object
            data-vv-name="unidade_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "unidade-select",
        mounted() {
            this.setList();
        },
        mixins: [require('../helpers/Mixins')],
        computed: {
            ...mapState('Unidade',{
                list_unidades: state => {
                    return state.list_unidades;
                }
            })
        },
        methods: {
            ...mapActions('Unidade',['setList']),
            ...mapActions('Departamento',['get_departamentos_by_unidade']),
            getDepartamentos(){
                this.get_departamentos_by_unidade(this.internalValue.id)
            }
        }
    }
</script>

<style scoped>

</style>