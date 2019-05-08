<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_linhas"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('linha_id')"
            label="Linha"
            data-vv-name="linha_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "linhas-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('Linha', {
                list_linhas: state => {
                    return state.list_linhas;
                }
            })
        },
        methods: {
            ...mapActions('Linha',['setList'])
        }
    }
</script>

<style scoped>

</style>