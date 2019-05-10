<template>
    <div>
        <v-app id="inspire">
            <nav-main></nav-main>
            <side-bar></side-bar>
            <slot></slot>
            <v-footer class="pa-3" color="primary">
                <div style="color: white"> Tmontec Soluções em Tecnologia &copy; {{ new Date().getFullYear() }}</div>
            </v-footer>
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
<style>
    .theme--light.v-navigation-drawer{
        background-color: #6c1284;
    }
    .theme--light aside .v-list {
        color: #fff;
    }
    .theme--light.v-footer {
        background-color: #6c1284;
        color: #fff;
    }

    aside .v-list .v-list__group .v-list__group__header .v-list__group__header__prepend-icon i {
        color: #fff;
    }

    aside .v-list .v-list__group .v-icon {
        color: #fff

    }
</style>




