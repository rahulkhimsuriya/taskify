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

                    <div v-if="isActive" class="flex items-baseline">
                        <EditProject :initProject="project" />

                        <button class="ml-2" @click="remove">
                            <svg
                                class="h-4 w-4 text-red-400 hover:text-red-500"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <p
                    class="mt-4 text-sm text-gray-500 tracking-wide leading-tight"
                >
                    {{ project.description }}
                </p>
            </header>

            <div class="my-10">
                <TaskList />
            </div>

            <CreateTask :projectId="project.id" />
        </div>
    </div>
</template>

<script>
    import store from '../store';
    import NProgress from 'nprogress';
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
            ...mapState('auth', ['user']),
            ...mapState('project', { project: 'selectedProject' }),
        },

        created() {
            store.dispatch('project/fetchProject', this.id);
        },

        // beforeRouteEnter(to, from, next) {
        //     NProgress.start();

        //     store
        //         .dispatch('project/fetchProject', to.params.id)
        //         .then(() => {
        //             NProgress.done();
        //             next();
        //         })
        //         .catch((error) => {
        //             console.log(error.response);
        //             NProgress.done();
        //         });
        // },

        beforeRouteUpdate(to, from, next) {
            NProgress.start();

            store.dispatch('project/fetchProject', to.params.id).then(() => {
                NProgress.done();
                next();
            });
        },

        methods: {
            remove() {
                NProgress.start();
                store
                    .dispatch('project/deleteProject', this.project)
                    .then(() => {
                        NProgress.done();
                        this.$router.push({ name: 'dashboard' });
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
