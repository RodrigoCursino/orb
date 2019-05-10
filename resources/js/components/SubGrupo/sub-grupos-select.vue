<template>
    <v-select
            v-model="internalValue"
            v-validate="'required'"
            :items="listSubGrupos"
            item-text="nome"
            :error-messages="errors.collect('sub_grupo_id')"
            label="Sub Grupo"
            return-object
            data-vv-name="sub_grupo"
            required
    >
    </v-select>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: "sub-grupos-select",
        mixins: [require('../helpers/Mixins')],
        mounted() {
            this.setList();
        },
        computed: {
            ...mapState('SubGrupo', {
                listSubGrupos: state => {
                    return state.listSubGrupos;
                }
            })
        },
        methods: {
            ...mapActions('SubGrupo',['setList']),
        }
    }
</script>

<style scoped>

</style>