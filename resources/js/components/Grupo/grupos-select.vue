<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="list_grupos"
            item-value="id"
            item-text="nome"
            :error-messages="errors.collect('grupo_id')"
            label="Grupo"
            data-vv-name="grupo_id"
            @change="getSubGrupos"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "grupos-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('Grupo', {
                list_grupos: state => {
                    return state.list_grupos;
                }
            })
        },
        methods: {
            ...mapActions('Grupo',['setList']),
            ...mapActions('SubGrupo',['set_list_sub_grupos']),
            getSubGrupos(id) {
                this.set_list_sub_grupos(id);
            }
        }
    }
</script>

<style scoped>

</style>