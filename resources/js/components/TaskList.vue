<template>
    <div>
        <h3
            class="text-xl font-medium text-gray-800 tracking-wide leading-none"
            v-if="tasks.length > 0"
        >
            Tasks
        </h3>

        <div class="mt-6" v-if="tasks.length > 0">
            <Task
                v-for="task in tasks"
                :key="task.id"
                :task="task"
                class="mt-2"
                @edited="showEditTaskModal"
            />

            <modal name="modalEditTask" :height="200">
                <div class="max-w-md mx-auto">
                    <h1
                        class="mt-2 text-xl text-gray-600 font-medium tracking-wide text-center"
                    >
                        Update Task
                    </h1>

                    <form @submit.prevent="update">
                        <BaseInput
                            label="Task"
                            type="text"
                            class="mt-4"
                            placeholder="Create new task..."
                            v-model="task.body"
                        />
                        <p
                            class="text-sm font-semibold text-red-600"
                            v-if="error"
                        >
                            {{ error }}
                        </p>

                        <BaseButton type="success" class="block mt-2 ml-auto"
                            >Save</BaseButton
                        >
                    </form>
                </div>
            </modal>
        </div>

        <div class="flex flex-col items-center justify-center" v-else>
            <img
                src="/image/design_sprint.svg"
                class="h-64 w-64 opacity-75"
                alt="Design Sprint"
            />

            <h1
                class="text-3xl font-light text-gray-500 leading-none tracking-wide"
            >
                You don't have any task yet.
            </h1>
        </div>
    </div>
</template>

<script>
    import store from '../store';
    import NProgress from 'nprogress';
    import Task from '../components/Task.vue';

    export default {
        name: 'TaskList',

        components: {
            Task,
        },

        data() {
            return {
                task: {},
                error: '',
            };
        },

        computed: {
            tasks() {
                return this.$store.state.task.tasks;
            },
        },

        methods: {
            showEditTaskModal(task) {
                this.task = task;
                this.$modal.show('modalEditTask');
            },

            update() {
                NProgress.start();
                store.dispatch('task/updateTask', this.task).then(() => {
                    this.$modal.hide('modalEditTask');
                    NProgress.done();
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
