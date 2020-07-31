<template>
    <div>
        <BaseButton
            type="info"
            @click="$modal.show('modalCreateTask')"
            class="py-3 fixed bottom-0 right-0 mr-10 mb-10 rounded-lg shadow-lg hover-shadow"
        >
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path
                    fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd"
                />
            </svg>
        </BaseButton>

        <modal name="modalCreateTask" :height="200">
            <div class="max-w-md mx-auto">
                <h1
                    class="mt-2 text-xl text-gray-600 font-medium tracking-wide text-center"
                >
                    Create Task
                </h1>

                <form @submit.prevent="createTask">
                    <BaseInput
                        label="Task"
                        type="text"
                        class="mt-4"
                        placeholder="Create new task..."
                        v-model="task"
                    />
                    <p class="text-sm font-semibold text-red-600" v-if="error">
                        {{ error }}
                    </p>

                    <BaseButton class="block mt-2 ml-auto">Create</BaseButton>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CreateTask',

        props: {
            projectId: {
                required: true,
            },
        },

        data() {
            return {
                task: '',
                error: '',
            };
        },

        methods: {
            createTask() {
                this.$store
                    .dispatch('task/createTask', this.task)
                    .then((task) => {
                        this.$modal.hide('modalCreateTask');
                        this.task = '';
                    })
                    .catch((error) => {
                        this.error = error.response.data.errors.body[0];
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
