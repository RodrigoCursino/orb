
module.exports = {

    props: {
        value: {required: false},
        name: {required: false},
    },

    data () {
        return {
            internalValue: 0,
            money: {
                decimal: ',',
                thousands: '.',
                prefix: 'R$ ',
                precision: 2,
                masked: false
            }
        }
    },

    watch: {
        value() {
          this.internalValue  = this.value;
        },
        internalValue(newValue) {
          this.$emit('input', newValue);
        },
    }
};