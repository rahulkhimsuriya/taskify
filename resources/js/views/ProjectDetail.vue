<template>
    <div class="flex">
        <div class="w-1/2 flex items-center justify-center">
            <div class="max-w-sm">
                <header>
                    <h1
                        class="text-3xl text-semibold text-white tracking-wide leading-none"
                        v-text="greetingWithName"
                    ></h1>
                    <p
                        class="mt-2 text-sm text-gray-600 tracking-wide leading-none"
                    >
                        Welcome back to the worksapce,we missed You.!
                    </p>

                    <BaseSearchInput class="mt-6" />
                </header>

                <div class="mt-12">
                    <ProjectList />
                </div>
            </div>
        </div>
        <div
            class="w-1/2 bg-white absolute right-0 inset-y-0 p-10 m-4 rounded shadow"
        >
            <header>
                <h2
                    class="text-2xl font-semibold text-gray-800 tracking-wide leading-none"
                >
                    {{ project.title }}
                </h2>
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
    import CreateTask from '../components/CreateTask.vue';
    import ProjectList from '../components/ProjectList.vue';
    import TaskList from '../components/TaskList.vue';

    export default {
        name: 'ProjectDetail',

        props: {
            id: { type: [Number, String], required: true },
        },

        components: { CreateTask, ProjectList, TaskList },

        data() {
            return {
                project: {},
            };
        },

        computed: {
            user() {
                return this.$store.getters['auth/getUser'];
            },

            greetingWithName() {
                return `Hi ${this.user.name}`;
            },
        },

        created() {
            this.$store
                .dispatch('project/fetchProject', this.id)
                .then((project) => (this.project = project));
        },
    };
</script>

<style lang="css" scoped></style>
