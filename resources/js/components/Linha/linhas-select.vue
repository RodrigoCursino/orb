<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listLinhas"
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
            this.set_list_linhas();
        },
        computed: {
            ...mapState('Linha', {
                listLinhas: state => {
                    return state.listLinhas;
                }
            })
        },
        methods: {
            ...mapActions('Linha',['set_list_linhas'])
        }
    }
</script>

<style scoped>

</style>