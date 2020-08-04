<template>
    <div class="relative">
        <span class="absolute inset-y-0 left-0 ml-4 py-4">
            <svg
                class="h-4 w-4 text-gray-100"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </span>
        <input
            class="pl-10 pr-4 py-3 w-full bg-gray-700 text-sm font-normal tracking-wide border border-transparent text-md text-gray-100 focus:outline-none focus:shadow-xl focus:border-gray-600 transition duration-300 ease-linear rounded-full"
            :value="value"
            @input="updateValue"
            v-bind="$attrs"
            placeholder="Search Project..."
        />
    </div>
</template>

<script>
    export default {
        inheritAttrs: false,

        name: 'BaseSearchInput',

        props: {
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
