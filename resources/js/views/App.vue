<template>
    <div
        class="bg-white min-h-screen relative"
        :class="{ 'bg-gray-800': isLogedIn }"
    >
        <BaseNavbar />
        <NotificationContainer />
        <!-- component matched by the route will render here -->
        <router-view :key="$route.fullPath"></router-view>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import NotificationContainer from '../components/NotificationContainer.vue';

    export default {
        name: 'App',

        components: {
            NotificationContainer,
        },

        data() {
            return {};
        },

        computed: {
            ...mapGetters('auth', ['isLogedIn']),
        },
    };
</script>

<style lang="css" scoped></style>
