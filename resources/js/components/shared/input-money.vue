<template>
    <div>
        <v-text-field
                v-model="internalValue | money"
                v-validate="'required'"
                :error-messages="errors.collect('salario')"
                :label="label"
                data-vv-name="salario"
                required
        ></v-text-field>
    </div>
</template>
<script>
    export default {
        props: {label:{required:true}},
        mixins: [require('../helpers/MoneyMixin')],
    }
</script>