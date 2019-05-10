<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_bancos"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('banco_id')"
            label="Banco"
            data-vv-name="banco_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "bancos-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('Banco', {
                list_bancos: state => {
                    return state.list_bancos;
                }
            })
        },
        methods: {
            ...mapActions('Banco',['setList'])
        }
    }
</script>

<style scoped>

</style>