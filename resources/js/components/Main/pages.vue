<template>
</template>
<script>
    import {mapState, mapMutations} from "vuex"
    export default {
        name: 'pages',
        props: {}
        ,
        components: {}
        ,
        computed: {
            computed: {
                ...mapState('Main',{
                    menu:        state => state.navList,
                    currentItem: state => state.currentItem
                })
            },
        },
        data() {
            return {}
        }
        ,
        methods: {}
    }
</script>
<style scoped>

</style>