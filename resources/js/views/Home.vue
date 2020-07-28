<template>
    <div>
        <h1 class="text-4xl text-gray-800 font-bold">Home</h1>

        <HelloWorld
            message="Hello from the component."
            class="mt-2"
        ></HelloWorld>
    </div>
</template>

<script>
    import HelloWorld from '../components/HelloWorld.vue';

    export default {
        name: 'Home',

        components: { HelloWorld },
    };
</script>

<style lang="css" scoped></style>
