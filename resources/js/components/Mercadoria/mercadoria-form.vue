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
                    <v-layout >
                      <!-- Nome -->
                      <v-flex
                              xs12
                              md6
                              lg6
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
                      <!-- NCM -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <ncms-select v-model="mercadoria.ncm_id" ></ncms-select>
                      </v-flex>
                      <!-- NCM -->
                    </v-layout>
                    <v-layout >
                      <!-- Fornecedor -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <fornecedor-select v-model="mercadoria.fornecedor_id"></fornecedor-select>
                      </v-flex>
                      <!-- Fornecedor -->
                      <!-- categoria -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <categorias-select v-model="mercadoria.categoria_id" ></categorias-select>
                      </v-flex>
                      <!-- categoria -->
                  </v-layout>
                  <v-layout >
                      <!-- Fornecedor -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <colecoes-select v-model="mercadoria.colecao_id"></colecoes-select>
                      </v-flex>
                      <!-- Fornecedor -->
                      <!-- categoria -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <grupos-select v-model="mercadoria.grupo_id" ></grupos-select>
                      </v-flex>
                      <!-- categoria -->
                  </v-layout>
                  <v-layout >
                      <!-- Fornecedor -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <sub-grupos-select v-model="mercadoria.sub_grupo_id"></sub-grupos-select>
                      </v-flex>
                      <!-- Fornecedor -->
                      <!-- categoria -->
                      <v-flex
                              xs12
                              md6
                              lg6
                      >
                          <grupos-select v-model="mercadoria.grupo_id" ></grupos-select>
                      </v-flex>
                      <!-- categoria -->
                  </v-layout>
                  <v-layout>
                      <!-- Observação -->
                      <v-flex
                              xs12
                              md12
                              lg12
                      >
                          <v-textarea
                                  name="observacao"
                                  box
                                  label="Observacao"
                                  v-validate="'required'"
                                  :error-messages="errors.collect('observacao')"
                                  auto-grow
                                  row-height="12"
                                  v-model="mercadoria.observacao"
                                  data-vv-name="observacao"
                                  required
                          ></v-textarea>
                      </v-flex>
                      <!-- Observação -->
                  </v-layout>
              </v-container>
            </v-card>
        </v-dialog>

    </div>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    import NcmsSelect from "../NCM/ncms-select";
    import FornecedorSelect from "../Fornecedor/fornecedor-select";
    import CategoriasSelect from "../Categoria/categorias-select";
    import ColecoesSelect from "../Colecao/colecoes-select";
    import GruposSelect from "../Grupo/grupos-select";
    import SubGruposSelect from "../SubGrupo/sub-grupos-select";
    export default {
        name: "mercadoria-form",
        components: {SubGruposSelect, GruposSelect, ColecoesSelect, CategoriasSelect, FornecedorSelect, NcmsSelect},
        $_veeValidate: {
            validator: 'new'
        },
        computed: {
            ...mapState('Mercadoria',{
                openFormMercadoria : state => {
                    return state.openFormMercadoria;
                }
            })
        },
        data: () => ({
            mercadoria: {
                categoria_id:null,
                colecao_id:null,
                deleted_at:null,
                fornecedor_id:null,
                sub_grupo_id:null,
                grupo_id:null,
                id:0,
                linha_id:null,
                marca_id:null,
                ncm_id:null,
                nome:"",
                observacao:"",
            },
            dictionary: {
                custom: {
                    nome: {
                        required: () => 'O CNPJ é obrigatório',
                    },
                    observacao: {
                        required: () => 'A Observação é obrigatória',
                    },
                    ncm_id: {
                        required: () => 'O NCM é obrigatório',
                    }
                }
            }
        }),
        methods: {
            ...mapActions('Mercadoria', ['open_form_mercadoria']),
            show () {
                console.log('ops',this.mercadoria);
            }
        }
    }
</script>

<style scoped>

</style>