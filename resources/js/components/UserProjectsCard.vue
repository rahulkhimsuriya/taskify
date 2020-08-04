<template>
    <div>
        <header>
            <h1
                class="text-3xl text-semibold text-white tracking-wide leading-none"
                v-text="greetingWithName"
            ></h1>
            <p class="mt-2 text-sm text-gray-600 tracking-wide leading-none">
                Welcome back to the worksapce, we missed You.!
            </p>
        </header>

        <div class="mt-8">
            <ProjectList />
        </div>
    </div>
</template>

<script>
    import ProjectList from '../components/ProjectList.vue';

    export default {
        name: 'UserProjectsCard',

        components: {
            ProjectList,
        },

        data() {
            return {};
        },

        computed: {
            user() {
                return this.$store.getters['auth/getUser'];
            },

            greetingWithName() {
                let name = this.user.name.split(' ')[0];
                let firstname = name.charAt(0).toUpperCase() + name.slice(1);
                return `Hi ${firstname}`;
            },
        },
    };
</script>

<style lang="css" scoped></style>
