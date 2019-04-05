<template>
    <div>
     <fornecedor-form></fornecedor-form>
     <fornecedor-list></fornecedor-list>
    </div>
</template>
<script>
    import FornecedorForm from "./fornecedor-form.vue";
    import FornecedorList from "./fornecedor-list.vue";

    export default {
        name: 'fornecedor-index',
        props: {}
        ,
        components: {
            FornecedorList,
            FornecedorForm}
        ,
        computed: {},
        methods: {}
    }
</script>
<style scoped>

</style>