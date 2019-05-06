<template>
        <v-snackbar
                v-model="snackbar"
                :bottom="y === 'bottom'"
                :left="x === 'left'"
                :multi-line="mode === 'multi-line'"
                :right="x === 'right'"
                :timeout="timeout"
                :top="y === 'top'"
                :vertical="mode === 'vertical'"
        >
            {{ text }}
            <v-btn
                    color="pink"
                    flat
                    @click="snackbar = false"
            >
                Close
            </v-btn>
        </v-snackbar>

</template>

<script>
    export default {
        props: ['type', 'message'],
        data: () => ({
            snackbar: false,
            y: 'top',
            x: null,
            mode: '',
            timeout: 3000,
            text: 'Hello, I\'m a snackbar'
        }),
        created() {
            let self = this;
            this.$nextTick(() => {
                self.notify(this.type, this.message);
            });
            EventBus.$on('notify', (type, message) => {
                self.notify(type, message);
            });
        },
        methods: {
            notify(message)
            {
                this.snackbar != this.snackbar;
                this.text = message;
            }
        }
    }
</script>
© 2019 GitHub, Inc.