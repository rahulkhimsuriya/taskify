<template>
    <div class="bg-white min-h-screen" :class="{ 'bg-gray-800': isLogedIn }">
        <BaseNavbar />
        <!-- component matched by the route will render here -->
        <router-view></router-view>
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
            ...mapGetters(['isLogedIn']),
        },
    };
</script>

<style lang="css" scoped></style>
