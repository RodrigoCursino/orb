module.exports = {

    props: {
        value: {required: true},
        name: {required: false},
    },

    data: () => ({
        date: new Date().toISOString().substr(0, 10),
        mask: '##/##/####',
        dateFormatted: null,
        menu1: false
    }),

    computed: {
        computedDateFormatted () {
            return this.formatDate(this.date)
        }
    },

    created() {
        this.dateFormatted = this.formatDate(new Date().toISOString().substr(0, 10));
    },

    watch: {
        date (val) {
            this.dateFormatted = this.formatDate(this.date)
        },
        dateFormatted(newValue) {
            this.$emit('input', this.date);
        }
    },

    methods: {
        formatDate (date) {
            if (!date) return null
            const [year, month, day] = date.split('-')
            return `${day}/${month}/${year}`
        },
    }
};