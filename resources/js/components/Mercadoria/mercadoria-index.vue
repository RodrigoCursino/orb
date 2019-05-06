<template>
 <div>
     <mercadoria-form></mercadoria-form>
     <mercadoria-list></mercadoria-list>
 </div>
</template>

<script>
    import {mapActions} from 'vuex'
    import MercadoriaList from "./mercadoria-list";
    import MercadoriaForm from "./mercadoria-form";
    export default {
        name: "mercadoria-index",
        components: {MercadoriaForm, MercadoriaList},
        mounted(){
            this.set_list_mercadorias();
        },
        methods: {
            ...mapActions('Mercadoria',['set_list_mercadorias'])
        }
    }
</script>

<style scoped>
</style>