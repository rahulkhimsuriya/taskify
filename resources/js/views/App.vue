<template>
    <div
        class="bg-white min-h-screen relative"
        :class="{ 'bg-gray-800': isLogedIn }"
    >
        <BaseNavbar />
        <!-- component matched by the route will render here -->
        <router-view :key="$route.fullPath"></router-view>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'App',

        data() {
            return {};
        },

        computed: {
            ...mapGetters('auth', ['isLogedIn']),
        },
    };
</script>

<style lang="css" scoped></style>
