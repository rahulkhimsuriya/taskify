<template>
    <div class="mx-auto max-w-sm">
        <h3 class="text-2xl text-gray-800 font-bold text-center">Login</h3>

        <form @submit.prevent="login">
            <BaseInput label="Email" type="email" v-model="user.email" />

            <BaseInput
                label="Password"
                type="password"
                class="mt-2"
                v-model="user.password"
            />

            <BaseButton type="submit" name="submit" class="mt-4"
                >Login</BaseButton
            >
        </form>
    </div>
</template>

<script>
    export default {
        name: 'Login',

        data() {
            return {
                user: {},
            };
        },

        methods: {
            login() {
                this.$store.dispatch('login', this.user).then(() => {
                    this.$router.push({ name: 'dashboard' });
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
