<template>
    <div>
        <BaseNavbar />
        <!-- component matched by the route will render here -->
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'App',

        data() {
            return {};
        },
    };
</script>

<style lang="css" scoped></style>
