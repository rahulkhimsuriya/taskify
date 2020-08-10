<template>
    <div class="flex flex-col">
        <p class="text-sm text-semibold tracking-wide" v-if="label">
            {{ label }}
        </p>
        <div class="flex items-center -ml-2">
            <div
                v-for="color in colors"
                :style="{
                    border:
                        color.id == value
                            ? `2px solid ${color.color}`
                            : '2px solid transparent',
                }"
                class="ml-2 h-8 w-8 rounded-full flex items-center justify-center"
            >
                <label
                    class="inline-block h-6 w-6 rounded-full cursor-pointer"
                    :style="{ backgroundColor: color.color }"
                >
                    <input
                        type="radio"
                        class="hidden"
                        :key="color.id"
                        name="color"
                        :value="color.id"
                        @input="updateValue"
                        v-bind="$attrs"
                    />
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        inheritAttrs: false,

        name: 'ColorRadioButtons',

        props: {
            colors: {
                required: true,
            },
            label: {
                default: '',
            },
            value: {},
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
