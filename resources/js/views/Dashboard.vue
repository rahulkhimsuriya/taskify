<template>
    <div class="flex">
        <div class="w-1/2 flex items-center justify-center">
            <div class="w-3/6">
                <UserProjectsCard />
            </div>
        </div>
        <div
            class="w-1/2 bg-white absolute right-0 inset-y-0 p-10 m-4 rounded shadow"
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
