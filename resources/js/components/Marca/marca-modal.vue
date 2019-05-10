<template>
    <div>
        <v-btn fab
               bottom
               right
               color="pink"
               dark
               fixed
               @click="open"
        >
            <v-icon>add</v-icon>
        </v-btn>
        <v-dialog v-model="closeForm"
                  width="900px"
                  persistent
                  no-click-animation
        >
            <v-card>
                <!-- Tool Bar -->
                <v-toolbar
                        color="primary"
                        dark
                >
                    <v-card-title
                    >
                        {{title}}
                    </v-card-title>
                    <v-spacer></v-spacer>
                    <v-btn icon
                           @click="clear"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>
                <!-- FORM -->
                <v-stepper >
                    <v-stepper-header>
                        <v-stepper-step
                                step="1">
                        </v-stepper-step>
                    </v-stepper-header>
                    <!--Dados-->
                    <v-stepper-items>
                        <v-stepper-content step="1">
                            <v-card
                                    class="mb-5"
                                    height="150px"
                            >
                                <v-container grid-list-md>
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-text-field
                                                    v-model="form.nome"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('nome')"
                                                    label="Nome"
                                                    data-vv-name="nome"
                                                    required
                                            ></v-text-field>
                                        </v-flex>
                                        <v-flex
                                                xs12
                                                md4
                                                lg4
                                        >
                                            <v-select
                                                    v-model="form.fabricante_id"
                                                    v-validate="'required'"
                                                    :items="list_fabricantes"
                                                    item-value="id"
                                                    item-text="nome_fantasia"
                                                    :error-messages="errors.collect('fabricante_id')"
                                                    label="Fabricante"
                                                    data-vv-name="fabricante_id"
                                                    required
                                            >
                                            </v-select>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-card>
                            <v-layout align-center justify-end row>
                                <v-btn  color="primary"
                                        outline
                                        round
                                        @click="save()"
                                >
                                    Salvar
                                </v-btn>
                            </v-layout>
                        </v-stepper-content>
                        <!--Dados-->
                    </v-stepper-items>
                    <!--Dados-->
                </v-stepper>
                <!-- FORM -->
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    import {mapState, mapActions} from 'vuex';
    export default {
        name: 'marca-modal',
        components: {},
        $_veeValidate: {
            validator: 'new'
        },
        data () {
            return {
                form: {},
                fabricante: {
                    ativo:1,
                    fabricante_id:"",
                    nome:"",
                    nome_fantasia:"",
                    razao_social:"",
                    cnpj:"",
                    cpf:"",
                    ie:"",
                    observacao:"",
                    natureza_juridica:"",
                },
                dictionary: {
                    custom: {
                        nome: {
                            required: () => 'Este campo é Obrigatório',
                        },
                        fabricante: {
                            required: () => 'Este campo é Obrigatório',
                        },
                    }
                }
            }
        },
        created() {
            this.setList();
            this.form = this.buildForm(this.form);
        },
        mounted(){
            this.$validator.localize('en', this.dictionary);
        },
        computed: {
            title: function () {
                if(this.form.id) {
                    return 'Editar Marca';
                } else {
                    return 'Cadastrar Marca';
                };
            },
            ...mapState('Marca',{
                    closeForm: state => {
                        return state.closeForm;
                    }
                }
            ),
            ...mapState('Fabricante',{
                    list_fabricantes: state => {
                        return state.list_fabricantes;
                    }
                }
            ),
        },
        methods: {
            ...mapActions('Marca', ['save_form','add','close_form']),
            ...mapActions('Fabricante', ['setList']),

            edit (form) {
                this.form = this.buildForm(form);
                this.close_form();
            },

            buildForm (form) {
                return {
                    ativo: 1,
                    id            : form               ? form.id            : null,
                    nome          : form               ? form.nome          : null,
                    fabricante_id : form.fabricante_id ? form.fabricante_id : null,
                }
            },

            open () {
                this.close_form();
            },

            clear () {
                this.e1 = 1;
                this.$validator.reset();
                this.form = this.buildForm({});
                this.close_form();
            },

            save() {
                this.$validator.validateAll(this.form).then((result) => {
                    if (result) {
                        this.save_form(this.form);
                        this.$validator.reset();
                        this.form = this.buildForm({});
                    }
                });
            }
        }
    }
</script>