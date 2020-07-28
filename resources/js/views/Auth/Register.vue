<template>
    <div class="mx-auto max-w-sm">
        <h3 class="text-2xl text-gray-800 font-bold text-center">Register</h3>

        <form @submit.prevent="register">
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
                placeholder="example@example.com"
                v-model="user.email"
            />

            <BaseInput
                label="Password"
                type="password"
                class="mt-2"
                placeholder="password"
                v-model="user.password"
            />

            <BaseButton type="submit" name="submit" class="mt-4"
                >Register</BaseButton
            >
        </form>
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
                this.$store.dispatch('register', this.user).then(() => {
                    this.$router.push({ name: 'dashboard' });
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
