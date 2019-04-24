<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listNmcs"
            item-value="id"
            item-text="cod"
            :error-messages="errors.collect('ncm_id')"
            label="Ncm"
            data-vv-name="ncm_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "ncms-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.set_list_ncms();
        },
        computed: {
            ...mapState('NCM', {
                listNmcs: state => {
                    return state.listNmcs;
                }
            })
        },
        methods: {
            ...mapActions('NCM',['set_list_ncms'])
        }
    }
</script>

<style scoped>

</style>