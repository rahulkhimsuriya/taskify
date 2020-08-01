<template>
    <div>
        <BaseButton
            style="color:#eee;"
            @click="$modal.show('modalCreateProject')"
        >
            New Project
        </BaseButton>

        <modal name="modalCreateProject">
            <div class="max-w-md mx-auto">
                <h1
                    class="mt-2 text-xl text-gray-600 font-medium tracking-wide text-center"
                >
                    Create Project
                </h1>

                <form @submit.prevent="create">
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
                        Create Project
                    </BaseButton>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    export default {
        name: 'CreateProject',

        data() {
            return {
                project: {},
                errors: {},
            };
        },

        methods: {
            create() {
                this.$store
                    .dispatch('project/createProject', this.project)
                    .then((project) => {
                        this.$modal.hide('modalCreateProject');

                        this.$router.push({
                            name: 'project-detail',
                            params: { id: project.id },
                        });
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
