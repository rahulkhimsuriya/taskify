<template>
    <button
        class="px-4 py-2 text-sm uppercase font-bold tracking-wide leading-none border border-gray-400 hover:bg-gray-800 hover:text-gray-100 transition-all duration-300 ease-in-out rounded"
        @on="$listeners"
    >
        <slot>Submit</slot>
    </button>
</template>

<script>
    export default {
        name: 'BaseButton',

        data() {
            return {};
        },
    };
</script>

<style lang="css" scoped></style>
