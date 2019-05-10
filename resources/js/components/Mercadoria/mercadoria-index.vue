<template>
 <div>
     <mercadoria-list></mercadoria-list>
 </div>
</template>

<script>
    import {mapActions} from 'vuex'
    import MercadoriaList from "./mercadoria-list";
    export default {
        name: "mercadoria-index",
        components: {MercadoriaList},
        mounted(){
            this.setList();
        },
        methods: {
            ...mapActions('Mercadoria',['setList'])
        }
    }
</script>

<style scoped>
</style>