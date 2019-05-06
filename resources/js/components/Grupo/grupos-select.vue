<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listGrupos"
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
            this.set_list_grupos();
        },
        computed: {
            ...mapState('Grupo', {
                listGrupos: state => {
                    return state.listGrupos;
                }
            })
        },
        methods: {
            ...mapActions('Grupo',['set_list_grupos']),
            ...mapActions('SubGrupo',['set_list_sub_grupos']),
            getSubGrupos(id) {
                this.set_list_sub_grupos(id);
            }
        }
    }
</script>

<style scoped>

</style>