<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_centro_custos"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('cento_custo_id')"
            :label="label"
            return-object
            data-vv-name="cento_custo_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "centro-custo-select",
        mixins: [require('../helpers/Mixins')],
        props: {label : {required:true} },
        mounted(){
          this.setList();
        },
        computed: {
            ...mapState('CentroCusto',{
                list_centro_custos: state => {
                    return state.list_centro_custos;
                }
            })
        },
        methods: {
            ...mapActions('CentroCusto',['setList'])
        }
    }
</script>

<style scoped>

</style>