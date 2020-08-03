<template>
    <div
        class="bg-gray-300 max-w-lg mx-auto p-8 flex flex-col items-center justify-center rounded shadow-lg"
    >
        <img
            src="/image/warning.svg"
            class="h-64 w-64 opacity-75"
            alt="Not Found"
        />
        <h1 class="text-4xl text-gray-600">Not Found</h1>

        <div class="mt-6">
            <router-link
                :to="link"
                class="text-sm font-semibold px-4 py-2 uppercase tracking-wide border border-gray-800 hover:bg-gray-800 hover:text-white rounded shadow"
                >BACK TO MAIN PAGE</router-link
            >
        </div>
    </div>
</template>

<script>
    export default {
        name: 'NotFound',

        data() {
            return {};
        },

        computed: {
            isLogedIn() {
                return this.$store.getters['auth/isLogedIn'];
            },

            link() {
                return this.isLogedIn
                    ? { name: 'dashboard' }
                    : { name: 'home' };
            },
        },
    };
</script>

<style lang="css" scoped></style>
