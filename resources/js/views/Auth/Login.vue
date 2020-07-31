<template>
    <div class="p-6 mx-auto max-w-md">
        <h3 class="text-2xl text-gray-800 font-bold tracking-wide text-center">
            Login
        </h3>

        <div class="mt-4 mb-2" v-if="error">
            <BaseAlert type="danger" :message="error" />
        </div>

        <form @submit.prevent="login" class="mt-2">
            <BaseInput label="Email" type="email" v-model="user.email" />

            <BaseInput
                label="Password"
                type="password"
                class="mt-2"
                v-model="user.password"
            />

            <BaseButton class="mt-4">Login</BaseButton>
        </form>

        <div class="mt-6 text-gray-800 text-center font-semibold underline">
            <router-link :to="{ name: 'register' }"
                >Don't have account? Register</router-link
            >
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Login',

        data() {
            return {
                user: {},
                error: '',
            };
        },

        methods: {
            login() {
                this.$store
                    .dispatch('auth/login', this.user)
                    .then(() => {
                        this.$router.push({ name: 'dashboard' });
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                        if (error.response.data.errors) {
                            this.error = 'Please provide email and password.';
                        } else {
                            this.error = error.response.data.message;
                        }
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
