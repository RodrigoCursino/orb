


module.exports = {

    props: {
        value: {required: true},
        name: {required: false},
    },

    data() {
        return {
            valid: true,
            disabled: false,
            currency: "R$",
            internalValue: null,
        }
    },

    watch: {
        value() {
          this.initialBalanceFormatted  = this.value;
        },
        internalValue(newValue) {
          this.$emit('input', newValue);
        },
    },

    computed: {
        initialBalanceFormatted: {
            get: function() {
                return this.formatAsCurrency(this.initialBalance, 0)
            },
            set: function(newValue) {
                this.initialBalance =  Number(newValue.replace(/[^0-9\.]/g, ''));
            }
        }
    },
    methods: {

    }
};