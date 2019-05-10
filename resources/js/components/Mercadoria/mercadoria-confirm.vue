<template>
    <v-tabs fixed-tabs
    >
        <v-tabs-slider color="primary"></v-tabs-slider>

        <v-tab href="#tab-1">
            Dados Mercadoria
        </v-tab>

        <v-tab-item
                value="tab-1"
        >
           <dados-mercadoria class="confirm-content"></dados-mercadoria>
        </v-tab-item>

    </v-tabs>
</template>

<script>
    import {mapState} from 'vuex';
    import DadosMercadoria from "./form-confirm/dados-mercadoria";
    export default {
        name: "mercadoria-confirm",
        components: {DadosMercadoria},
        data: () => ({

        }),
        computed: {
            ...mapState('Mercadoria',{
                mercadoria: state => {
                    return state.mercadoria;
                }
            })
        },
    }
</script>

<style scoped>
    .confirm-content {
        margin-top: 50px
    }
</style>