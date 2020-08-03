<template>
    <button v-on="$listeners" type="submit" v-bind="$attrs" :class="classes">
        <slot>Submit</slot>
    </button>
</template>

<script>
    export default {
        inheritAttrs: false,

        name: 'BaseButton',

        props: {
            type: {
                type: String,
                default: 'default',
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
                    'uppercase',
                    'font-bold',
                    'tracking-wide',
                    'leading-none',
                    'focus:outline-none',
                    'focus:shadow-outline',
                    'transition-all',
                    'duration-300',
                    'ease-in-out',
                    'rounded',
                    'border',
                ];

                if (this.type == 'default') {
                    defaults.push(
                        'text-gray-800',
                        'hover:bg-gray-800',
                        'hover:text-white'
                    );
                }

                if (this.type == 'success') {
                    defaults.push(
                        'text-white',
                        'bg-green-600',
                        'hover:bg-green-500'
                    );
                }

                if (this.type == 'info') {
                    defaults.push(
                        'text-white',
                        'bg-purple-600',
                        'hover:bg-purple-500'
                    );
                }

                if (this.type == 'secondary') {
                    defaults.push(
                        'bg-gray-800',
                        'text-gray-300',
                        'hover:bg-gray-300',
                        'hover:text-gray-800'
                    );
                }

                return defaults;
            },
        },
    };
</script>

<style lang="css" scoped></style>
