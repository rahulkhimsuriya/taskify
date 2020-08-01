<template>
    <div>
        <button
            class="ml-4 text-gray-500 hover:text-gray-600 focus:outline-none focus:shadow-outline"
            @click="$modal.show('modalEditProject')"
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

        <modal name="modalEditProject">
            <div class="max-w-md mx-auto">
                <h1
                    class="mt-2 text-xl text-gray-600 font-medium tracking-wide text-center"
                >
                    Update Project
                </h1>

                <form @submit.prevent="update">
                    <BaseInput
                        label="Title"
                        type="text"
                        class="mt-4"
                        placeholder="Title..."
                        v-model="project.title"
                    />
                    <p
                        class="text-sm font-semibold text-red-600"
                        v-if="errors.title"
                    >
                        {{ errors.title[0] }}
                    </p>

                    <BaseTextarea
                        label="Description"
                        type="text"
                        class="mt-4"
                        placeholder="Description..."
                        v-model="project.description"
                    />
                    <p
                        class="text-sm font-semibold text-red-600"
                        v-if="errors.description"
                    >
                        {{ errors.description[0] }}
                    </p>

                    <BaseButton type="success" class="block mt-2 ml-auto">
                        Save
                    </BaseButton>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    export default {
        name: 'EditProject',

        props: {
            initProject: {
                type: Object,
                required: true,
            },
        },

        data() {
            return {
                project: {
                    id: this.initProject.id,
                    title: this.initProject.title,
                    description: this.initProject.description,
                },

                errors: {},
            };
        },

        methods: {
            update() {
                this.$store
                    .dispatch('project/updateProject', this.project)
                    .then((project) => {
                        this.$modal.hide('modalEditProject');
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
