


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
          this.internalValue  = this.value;
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
            },5000)
        },

        getMoney( str )
        {
            this.internalValue = this.formatReal(parseInt( str.replace(/[\D]+/g,'') ));
        },

        formatReal( int )
        {
            var tmp = int+'';
            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
            if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            return tmp;
        },
    }
};