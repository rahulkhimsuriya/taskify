<template>
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
        <p class="ml-2 text-sm font-normal text-gray-800">{{ task.body }}</p>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Task',

        props: ['task'],

        data() {
            return {
                isCompleted: false,
            };
        },

        created() {
            this.isCompleted = !!this.task.completed;
        },

        methods: {
            toggle() {
                axios
                    .patch(`/api/tasks/${this.task.id}/complete`)
                    .then(({ data }) => {
                        this.isCompleted = !this.isCompleted;

                        const notification = {
                            type: 'success',
                            message: data.message,
                        };

                        this.$store.dispatch('notification/add', notification, {
                            root: true,
                        });
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
