


module.exports = {

    props: {
        value: {required: true},
        name: {required: false},
    },

    data() {
        return {
            internalValue: null,
        }
    },

    watch: {
        value() {
          this.internalValue  = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(this.value);

        },
        internalValue(newValue) {
          this.$emit('input', newValue);
        },
    },

    methods: {
        format(value) {

                money     = value.replace("R","");
                money     = money.replace("$","");
                money     = money.replace(" ","");
                money     = money.replace(".","");
                money     = money.replace(",",".");

                money = parseFloat(money).toFixed(2);

            setTimeout(()=> {
                this.internalValue = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(money)
            },4000)
        },
    }
};