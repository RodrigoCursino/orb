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
                            Nome
                        </v-stepper-step>
                    </v-stepper-header>
                    <!--Dados-->
                    <v-stepper-items>
                        <v-stepper-content step="1">
                            <v-card
                                    class="mb-5"
                                    height="200px"
                            >
                                <v-container grid-list-md>
                                    <v-layout warp>
                                        <v-flex
                                                xs12
                                                md12
                                                lg12
                                        >
                                            <v-text-field
                                                    v-model="form.cod"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('cod')"
                                                    label="Cod"
                                                    data-vv-name="cod"
                                                    required
                                            ></v-text-field>
                                            <v-text-field
                                                    v-model="form.descricao"
                                                    v-validate="'required'"
                                                    :error-messages="errors.collect('descricao')"
                                                    label="Descrição"
                                                    data-vv-name="descricao"
                                                    required
                                            ></v-text-field>
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
        name: 'ncm-modal',
        components: {},
        $_veeValidate: {
            validator: 'new'
        },
        data () {
            return {
                form: {},
                dictionary: {
                    custom: {
                        cod: {
                            required: () => 'Este campo é Obrigatório',
                        },
                        descricao: {
                            required: () => 'Este campo é Obrigatório',
                        },
                    }
                }
            }
        },
        created() {
            this.form = this.buildForm(this.form);
        },
        mounted(){
            this.$validator.localize('en', this.dictionary);
        },
        computed: {
            title: function () {
                if(this.form.id) {
                    return 'Editar NCM';
                } else {
                    return 'Cadastrar NCM';
                };
            },
            ...mapState('NCM',{
                    closeForm: state => {
                        return state.closeForm;
                    }
                }
            )
        },
        methods: {
            ...mapActions('NCM', ['save_form','add','close_form']),

            edit (form) {
                this.form = this.buildForm(form);
                this.close_form();
            },

            buildForm (form) {
                return {
                    ativo: 1,
                    id        : form ? form.id        : null,
                    cod       : form ? form.cod       : null,
                    descricao : form ? form.descricao : null,
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