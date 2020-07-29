<template>
    <div class="p-6 mx-auto max-w-md">
        <h3 class="text-2xl text-gray-800 font-bold tracking-wide text-center">
            Register
        </h3>

        <form @submit.prevent="register" class="mt-2">
            <BaseInput
                label="Name"
                type="text"
                placeholder="Enter Your Name..."
                v-model="user.name"
            />

            <BaseInput
                label="Email"
                type="email"
                class="mt-2"
                placeholder="email@example.com"
                v-model="user.email"
            />

            <BaseInput
                label="Password"
                type="password"
                class="mt-2"
                placeholder="Password"
                v-model="user.password"
            />

            <BaseButton type="submit" name="submit" class="mt-4"
                >Register</BaseButton
            >
        </form>

        <div class="mt-6 text-gray-800 text-center font-semibold underline">
            <router-link :to="{ name: 'login' }"
                >Already have account? Login</router-link
            >
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Register',

        data() {
            return {
                user: {},
            };
        },

        methods: {
            register() {
                this.$store.dispatch('auth/register', this.user).then(() => {
                    this.$router.push({ name: 'dashboard' });
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
