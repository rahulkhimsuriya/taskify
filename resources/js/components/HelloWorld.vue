<template>
    <h2 class="text-gray-800 text-2xl font-semibold">
        {{ message }}
    </h2>
</template>

<script>
    export default {
        name: 'HelloWorld',

        props: ['message'],

        data() {
            return {};
        },
    };
</script>

<style lang="css" scoped></style>
