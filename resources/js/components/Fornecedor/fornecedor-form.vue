<template>
    <div>
        <v-btn
                fab
                bottom
                right
                color="pink"
                dark
                fixed
                @click="dialog = !dialog"
        >
            <v-icon>add</v-icon>
        </v-btn>
        <v-dialog v-model="dialog" width="800px">
            <v-card>
                <v-card-title
                        class="grey lighten-4 py-4 title"
                >
                    Cadastrar Fornecedor
                </v-card-title>
                <!--<v-container grid-list-sm class="pa-4">-->
                            <v-stepper v-model="e6" vertical>
                                <v-stepper-step :complete="e6 > 1" step="1">
                                    Select an app
                                    <small>Summarize if needed</small>
                                </v-stepper-step>

                                <v-stepper-content step="1">
                                        <v-form
                                                ref="form"
                                                v-model="valid"
                                                lazy-validation
                                        >
                                            <v-text-field
                                                    v-model="name"
                                                    :mask="mask"
                                                    :counter="16"
                                                    :rules="nameRules"
                                                    label="Name"
                                                    required
                                            ></v-text-field>

                                            <v-text-field
                                                    v-model="email"
                                                    :rules="emailRules"
                                                    label="E-mail"
                                                    required
                                            ></v-text-field>

                                            <v-select
                                                    v-model="select"
                                                    :items="items"
                                                    :rules="[v => !!v || 'Item is required']"
                                                    label="Item"
                                                    required
                                            ></v-select>

                                            <v-checkbox
                                                    v-model="checkbox"
                                                    :rules="[v => !!v || 'You must agree to continue!']"
                                                    label="Do you agree?"
                                                    required
                                            ></v-checkbox>

                                        </v-form>
                                    <v-btn color="primary" @click="validate">Continue</v-btn>
                                    <v-btn flat>Cancel</v-btn>
                                </v-stepper-content>

                                <v-stepper-step :complete="e6 > 2" step="2">Configure analytics for this app</v-stepper-step>

                                <v-stepper-content step="2">
                                    <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                                    <v-btn color="primary" @click="e6 = 3">Continue</v-btn>
                                    <v-btn flat>Cancel</v-btn>
                                </v-stepper-content>

                                <v-stepper-step :complete="e6 > 3" step="3">Select an ad format and name ad unit</v-stepper-step>

                                <v-stepper-content step="3">
                                    <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                                    <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
                                    <v-btn flat>Cancel</v-btn>
                                </v-stepper-content>

                                <v-stepper-step step="4">View setup instructions</v-stepper-step>
                                <v-stepper-content step="4">
                                    <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                                    <v-btn color="primary" @click="e6 = 1">Continue</v-btn>
                                    <v-btn flat>Cancel</v-btn>
                                </v-stepper-content>
                            </v-stepper>
                <!--</v-container>-->
                <v-card-actions>
                    <v-btn flat color="primary">More</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn flat color="primary" @click="dialog = false">Cancel</v-btn>
                    <v-btn flat @click="dialog = false">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    export default {
        name: 'fornecedor-form',
        props: {}
        ,
        components: {}
        ,
        computed: {}
        ,
        data: () => ({
            dialog: false,
            e6: 1,
            valid: true,
            name: '',
            mask: 'NNNNN-NNNN',
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 16) || 'Name must be less than 16 characters'
            ],
            email: '',
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+/.test(v) || 'E-mail must be valid'
            ],
            select: null,
            items: [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4'
            ],
            checkbox: false
        }),
        methods: {
            validate () {
                if (this.$refs.form.validate()) {
                    this.snackbar = true
                    this.e6 = 2
                }
            },
            reset () {
                this.$refs.form.reset()
            },
            resetValidation () {
                this.$refs.form.resetValidation()
            }
        }
    }
</script>
<style scoped>

</style>