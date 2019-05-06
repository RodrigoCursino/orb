<template>
    <div>
     <fornecedor-list></fornecedor-list>
    </div>
</template>
<script>
    import FornecedorList from "./fornecedor-list.vue";
    import {mapState, mapActions} from 'vuex'

    export default {
        name: 'fornecedor-index',
        props: {}
        ,
        components: {
            FornecedorList
        },
        computed: {
            ...mapState('Fornecedor', {
                deleted: state => {
                    return state.deleted;
                }
            })
        },
        methods: {}
    }
</script>
<style scoped>

</style>