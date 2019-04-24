<template>
    <div>
        <v-btn
                fab
                bottom
                right
                color="pink"
                dark
                fixed
                @click="open_form_mercadoria"
        >
            <v-icon>add</v-icon>
        </v-btn>

        <v-dialog :value.sync="openFormMercadoria"
                  width="900px"
                  persistent
                  no-click-animation
        >
            <v-card>
                <v-toolbar
                        color="primary"
                        dark
                >
                    <v-card-title
                    >
                        Cadastrar Mercadoria
                    </v-card-title>
                    <v-spacer></v-spacer>
                    <v-btn icon
                           @click="open_form_mercadoria"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>
              <v-container>
                  <v-layout>
                      <!-- Nome -->
                      <v-flex
                              xs12
                              md12
                              lg12
                      >
                          <v-text-field
                                  v-model="mercadoria.nome"
                                  v-validate="'required'"
                                  :error-messages="errors.collect('nome')"
                                  label="Nome"
                                  data-vv-name="nome"
                                  required
                          ></v-text-field>
                      </v-flex>
                      <!-- Nome -->
                  </v-layout>
              </v-container>
            </v-card>
        </v-dialog>

    </div>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    export default {
        name: "mercadoria-form",
        computed: {
            ...mapState('Mercadoria',{
                openFormMercadoria : state => {
                    return state.openFormMercadoria;
                }
            })
        },
        data: () => ({
            mercadoria: {}
        }),
        methods: {
            ...mapActions('Mercadoria', ['open_form_mercadoria'])
        }
    }
</script>

<style scoped>

</style>