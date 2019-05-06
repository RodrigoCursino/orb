<template>
    <div>
        <v-menu
                ref="menu1"
                v-model="menu1"
                :close-on-content-click="false"
                :nudge-right="40"
                lazy
                transition="scale-transition"
                offset-y
                full-width
                max-width="290px"
                min-width="290px"
        >
            <template v-slot:activator="{ on }">
                <v-text-field
                        v-model="dateFormatted"
                        :label="label"
                        :mask="mask"
                        persistent-hint
                        prepend-icon="event"
                        v-on="on"
                ></v-text-field>
            </template>
            <v-date-picker v-model="date"
                           no-title
                           @input="menu1 = false"></v-date-picker>
        </v-menu>
    </div>
</template>
<script>
    export default {
        props: {label:{required:true}},
        mixins: [require('../helpers/DateMixin')],
    }
</script>