module.exports = {

    props: {
        value: {required: true},
        name: {required: false},
    },

    data() {
        return {
            money: 0,
            internalValue: null,
        }
    },

    watch: {
        value() {
          this.internalValue = this.value;
        },
        internalValue(newValue) {
          this.$emit('input', newValue);
        }
    },

    filters: {
        money: function (value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat('pt-BR', {
                style: 'currency',
                currency: 'BRL',
                minimumFractionDigits: 0
            });
            return formatter.format(value);
        }
    },

    // methods:  {
    //
    //     formatPrice(value) {
    //        let format  = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(value)
    //         format     = format.replace("R","");
    //         format     = format.replace("$","");
    //         format     = format.replace(" ","");
    //         return format;
    //     },
    //
    //     format(money) {
    //         money     = money.replace(" ","");
    //         money     = money.replace(".","");
    //         money     = money.replace(",",".");
    //
    //         money = parseFloat(money).toFixed(2);
    //
    //         this.money = money;
    //
    //         //this.internalValue = this.formatPrice(money)
    //
    //     }
    //
    // }
};