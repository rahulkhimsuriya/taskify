<template>
    <div class="flex flex-col">
        <label class="text-base text-semibold" v-if="label">{{ label }}</label>
        <input
            class="px-4 py-2 border border-gray-400 text-sm text-gray-800 rounded"
            :value="value"
            @input="updateValue"
            v-bind="$attrs"
        />
    </div>
</template>

<script>
    export default {
        inheritAttrs: false,

        name: 'BaseInput',

        props: {
            label: {
                type: String,
                default: '',
            },
            value: {
                type: [String, Number],
            },
        },

        data() {
            return {};
        },

        methods: {
            updateValue(event) {
                this.$emit('input', event.target.value);
            },
        },
    };
</script>

<style lang="css" scoped></style>
