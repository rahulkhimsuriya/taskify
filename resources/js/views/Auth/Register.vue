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
            <p class="text-sm font-semibold text-red-600" v-if="errors.name">
                {{ errors.name[0] }}
            </p>

            <BaseInput
                label="Email"
                type="email"
                class="mt-2"
                placeholder="email@example.com"
                v-model="user.email"
            />
            <p class="text-sm font-semibold text-red-600" v-if="errors.email">
                {{ errors.email[0] }}
            </p>

            <BaseInput
                label="Password"
                type="password"
                class="mt-2"
                placeholder="Password"
                v-model="user.password"
            />
            <p
                class="text-sm font-semibold text-red-600"
                v-if="errors.password"
            >
                {{ errors.password[0] }}
            </p>

            <BaseButton class="mt-4">Register</BaseButton>
        </form>

        <div class="mt-6 text-gray-800 text-center font-semibold underline">
            <router-link :to="{ name: 'login' }"
                >Already have account? Login</router-link
            >
        </div>
    </div>
</template>

<script>
    import NProgress from 'nprogress';

    export default {
        name: 'Register',

        data() {
            return {
                user: {},
                errors: [],
            };
        },

        methods: {
            register() {
                NProgress.start();

                this.$store
                    .dispatch('auth/register', this.user)
                    .then(() => {
                        this.$router.push({ name: 'dashboard' });

                        NProgress.done();
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;

                        NProgress.done();
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
