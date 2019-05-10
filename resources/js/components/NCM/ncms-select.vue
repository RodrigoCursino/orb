<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_ncms"
            item-text="cod"
            :error-messages="errors.collect('ncm_id')"
            label="Ncm"
            return-object
            data-vv-name="ncm_id"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "ncms-select",
        $_veeValidate: {
            validator: 'new'
        },
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('NCM', {
                list_ncms: state => {
                    return state.list_ncms;
                }
            })
        },
        methods: {
            ...mapActions('NCM',['setList'])
        }
    }
</script>

<style scoped>

</style>