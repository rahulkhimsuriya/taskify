<template>
    <div :class="isLogedIn ? 'bg-gray-800 min-h-screen relative' : 'bg-white'">
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
