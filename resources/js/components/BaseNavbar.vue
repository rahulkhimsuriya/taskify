<template>
    <nav class="container mx-auto py-4 flex items-center justify-between">
        <div
            class="text-lg uppercase tracking-wide font-semibold text-gray-800"
        >
            <router-link :to="{ name: 'home' }" exact>Home</router-link>
        </div>

        <div>
            <ul class="flex items-center">
                <li
                    class="text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800"
                >
                    <router-link :to="{ name: 'login' }">Login</router-link>
                </li>
                <li
                    class="ml-4 text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800"
                >
                    <router-link :to="{ name: 'register' }"
                        >Register</router-link
                    >
                </li>

                <li class="ml-4">
                    <button
                        @click="logout"
                        class="text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800 focus:outline-none"
                    >
                        Logout
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'BaseNavbar',

        data() {
            return {};
        },

        methods: {
            logout() {
                this.$store.dispatch('logout');
            },
        },
    };
</script>

<style lang="css" scoped></style>
