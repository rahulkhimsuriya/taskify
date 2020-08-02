<template>
    <div
        class="flex items-center justify-between"
        v-if="isVisible"
        @mouseover="isActive = true"
        @mouseleave="isActive = false"
    >
        <div class="flex">
            <button @click="toggle" class="focus:outline-none">
                <svg
                    class="h-6 w-6 border focus:border-gray-800 rounded-full"
                    :class="isCompleted ? 'text-teal-600' : 'text-gray-400'"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>
            <p class="ml-2 text-sm font-normal text-gray-800">
                {{ task.body }}
            </p>
        </div>
        <div v-if="isActive">
            <button
                class="text-orange-500 hover:text-orange-600 focus:outline-none focus:shadow-outline"
                @click="$emit('edited', task)"
            >
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>

            <button
                class="ml-2 text-red-500 hover:text-red-600 focus:outline-none focus:shadow-outline"
                @click="remove"
            >
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
    import store from '../store';
    import NProgress from 'nprogress';

    export default {
        name: 'Task',

        props: ['task'],

        data() {
            return {
                isVisible: true,
                isCompleted: false,
                isActive: false,
            };
        },

        created() {
            this.isCompleted = !!this.task.completed;
        },

        methods: {
            toggle() {
                NProgress.start();

                store.dispatch('task/toggle', this.task).then(() => {
                    this.isCompleted = !this.isCompleted;

                    NProgress.done();
                });
            },

            remove() {
                NProgress.start();

                store.dispatch('task/deleteTask', this.task).then(() => {
                    this.isVisible = false;

                    NProgress.done();
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
