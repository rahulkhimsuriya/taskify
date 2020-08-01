<template>
    <div>
        <header>
            <h1
                class="text-3xl text-semibold text-white tracking-wide leading-none"
                v-text="greetingWithName"
            ></h1>
            <p class="mt-2 text-sm text-gray-600 tracking-wide leading-none">
                Welcome back to the worksapce,we missed You.!
            </p>

            <BaseSearchInput class="mt-6" />
        </header>

        <div class="mt-12">
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
                name =
                    this.user.name.charAt(0).toUpperCase() +
                    this.user.name.slice(1);
                return `Hi ${name}`;
            },
        },
    };
</script>

<style lang="css" scoped></style>
