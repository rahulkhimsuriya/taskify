<template>
    <div class="px-8">
        <nav class="container mx-auto py-4 flex items-center justify-between">
            <template v-if="!isLogedIn">
                <div class="text-lg tracking-wide font-semibold text-gray-800">
                    <router-link :to="{ name: 'home' }" exact
                        >taskify</router-link
                    >
                </div>

                <div>
                    <ul class="flex items-center">
                        <li
                            class="text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800"
                        >
                            <router-link :to="{ name: 'login' }"
                                >Login</router-link
                            >
                        </li>
                        <li
                            class="ml-4 text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800"
                        >
                            <router-link :to="{ name: 'register' }"
                                >Register</router-link
                            >
                        </li>
                    </ul>
                </div>
            </template>
            <template v-else>
                <div>
                    <button
                        class="block p-2 bg-gray-700 rounded-lg relative"
                        @click="isDropdownOpen = !isDropdownOpen"
                    >
                        <svg
                            class="h-6 w-6 text-white"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <div
                        v-if="isDropdownOpen"
                        class="mt-2 absolute bg-white w-40 rounded py-2"
                    >
                        <button
                            class="block tetx-sm font-semibold w-full px-4 py-2 text-gray-800 hover:bg-gray-300"
                            @click="logout"
                        >
                            Logout
                        </button>
                    </div>
                </div>
            </template>
        </nav>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import NProgress from 'nprogress';

    export default {
        name: 'BaseNavbar',

        data() {
            return {
                isDropdownOpen: false,
            };
        },

        computed: {
            ...mapGetters('auth', ['isLogedIn']),
        },

        methods: {
            logout() {
                NProgress.start();

                this.$store.dispatch('auth/logout').then(() => {
                    this.$router.push({ name: 'home' });

                    NProgress.done();
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
