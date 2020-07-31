<template>
    <div :class="classes">
        <p v-text="message"></p>
    </div>
</template>

<script>
    export default {
        name: 'BaseAlert',

        props: {
            type: {
                type: String,
                required: true,
            },
            message: {
                type: String,
                required: true,
            },
        },

        data() {
            return {};
        },

        computed: {
            classes() {
                let defaults = [
                    'px-4',
                    'py-2',
                    'text-sm',
                    'text-white',
                    'text-center',
                    'rounded',
                ];

                if (this.type == 'success') defaults.push('bg-green-600');

                if (this.type == 'danger') defaults.push('bg-red-600');

                return defaults;
            },
        },
    };
</script>

<style lang="css" scoped></style>
