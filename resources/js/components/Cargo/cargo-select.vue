<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_cargos"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('cargo_id')"
            label="Cargo"
            return-object
            data-vv-name="cargo_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "cargo-select",
        mounted() {
            this.setList();
        },
        mixins: [require('../helpers/Mixins')],
        computed: {
            ...mapState('Cargo',{
                list_cargos: state => {
                    return state.list_cargos;
                }
            })
        },
        methods: {
            ...mapActions('Cargo',['setList'])
        }
    }
</script>

<style scoped>

</style>