<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome: ${mercadoria.nome}`}}</h5>
            </v-flex>

        </v-layout>

        <v-divider inset></v-divider>
        <v-layout style="margin-top: 15px">
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <v-textarea
                        box
                        disabled
                        label="Observação"
                        :value="mercadoria.observacao"
                ></v-textarea>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-mercadoria",
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

</style>