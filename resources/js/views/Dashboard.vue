<template>
    <div class="lg:flex">
        <div class="lg:w-1/2 flex items-center justify-center">
            <div class="w-4/6 lg:w-3/6 flex-shrink-0">
                <UserProjectsCard />
            </div>
        </div>
        <div
            class="lg:w-1/2 bg-white mx-2 mt-8 lg:absolute lg:right-0 lg:inset-y-0 p-10 lg:m-4 rounded shadow"
        >
            <div class="flex flex-col items-center justify-center h-full">
                <img
                    src="/image/task_list.svg"
                    class="h-64 w-64 opacity-75"
                    alt="Task List"
                />

                <h1
                    class="text-3xl font-light text-gray-500 leading-none tracking-wide"
                >
                    Manage your work.
                </h1>
            </div>
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
