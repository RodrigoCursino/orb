<template>
    <div>
        <v-text-field
                prepend-icon="attach_money"
                v-model.lazy="internalValue"
                v-validate="'required'"
                :error-messages="errors.collect('salario')"
                :label="label"
                @input="getMoney"
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