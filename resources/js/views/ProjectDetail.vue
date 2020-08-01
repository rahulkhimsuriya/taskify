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
            <header @mouseover="isActive = true" @mouseleave="isActive = false">
                <div class="flex items-baseline">
                    <h2
                        class="text-2xl font-semibold text-gray-800 tracking-wide"
                    >
                        {{ project.title }}
                    </h2>

                    <div v-if="isActive">
                        <EditProject :initProject="project" />
                    </div>
                </div>

                <p
                    class="mt-4 text-sm text-gray-500 tracking-wide leading-tight"
                >
                    {{ project.description }}
                </p>
            </header>

            <div class="my-10">
                <h3
                    class="text-xl font-medium text-gray-800 tracking-wide leading-none"
                >
                    Tasks
                </h3>

                <div class="mt-6">
                    <TaskList />
                </div>
            </div>

            <CreateTask :projectId="project.id" />
        </div>
    </div>
</template>

<script>
    import store from '../store';
    import { mapState } from 'vuex';
    import CreateTask from '../components/CreateTask.vue';
    import EditProject from '../components/EditProject.vue';
    import TaskList from '../components/TaskList.vue';
    import UserProjectsCard from '../components/UserProjectsCard.vue';

    export default {
        name: 'ProjectDetail',

        props: {
            id: { type: [Number, String], required: true },
        },

        components: { CreateTask, EditProject, TaskList, UserProjectsCard },

        data() {
            return {
                isActive: false,
            };
        },

        computed: {
            user() {
                return this.$store.getters['auth/getUser'];
            },

            ...mapState('project', { project: 'selectedProject' }),
        },

        created() {
            this.$store.dispatch('project/fetchProject', this.id);
        },
    };
</script>

<style lang="css" scoped></style>
