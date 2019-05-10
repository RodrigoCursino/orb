<template>
    <v-text-field
           prepend-icon="attach_money"
           :value="value"
           :name="name"
           @change="updateValue"
           @focus="clear"
           type="money"
    ></v-text-field>
</template>

<script>
    export default {
        props  : {
            value: {required: true},
            name : {required: true},
        },
        data () {
            return {
            }
        },
        methods: {
            updateValue(value) {
                value = this.formatMoney(this.formatReal(value));
                this.$emit('input', value);
            },
            formatReal( tmp ) {
               let num = tmp.replace(',','.');
               console.log(num);
               return num;
            },
            formatMoney (int) {
               const money = parseFloat(int).toFixed(2);
               return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(money)
            },
            clear() {
                this.$emit('input', "");
            }
        }
    }
</script>