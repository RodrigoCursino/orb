<template>
    <div>
        <v-app id="inspire">
            <nav-main></nav-main>
            <side-bar></side-bar>
            <slot></slot>
        </v-app>
    </div>
</template>

<script>
    import SideBar    from "./side-bar2.vue";
    import NavMain    from "./nav-main.vue";

    export default {

        name: 'main-component',
        components: {
            SideBar,
            NavMain
        },
        computed: {


        },
        data: () => ({

        }),
        props: {
            source: String
        }
    }
</script>




