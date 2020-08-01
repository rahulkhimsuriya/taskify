<template>
    <div class="flex flex-col">
        <label class="text-sm text-semibold tracking-wide" v-if="label">
            {{ label }}
        </label>
        <textarea
            class="px-4 py-2 font-semibold tracking-wide border border-gray-400 text-sm text-gray-800 focus:border-gray-600 focus:bg-gray-200 rounded"
            :value="value"
            @input="updateValue"
            v-bind="$attrs"
        ></textarea>
    </div>
</template>

<script>
    export default {
        inheritAttrs: false,

        name: 'BaseTextarea',

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
