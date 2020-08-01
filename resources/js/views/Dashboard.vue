<template>
    <div class="flex">
        <div class="w-1/2 flex items-center justify-center">
            <div class="max-w-sm">
                <UserProjectsCard />
            </div>
        </div>
        <div
            class="w-1/2 bg-white absolute right-0 inset-y-0 p-10 m-4 rounded shadow"
        >
            <header>
                <div></div>
            </header>
        </div>
    </div>
</template>

<script>
    import ProjectList from '../components/ProjectList.vue';
    import UserProjectsCard from '../components/UserProjectsCard.vue';

    export default {
        name: 'Dashboard',

        components: { ProjectList, UserProjectsCard },

        data() {
            return {};
        },
    };
</script>

<style lang="css" scoped></style>
