<template>
    <router-link :to="link" class="text-center">
        <div
            class="h-20 w-20 bg-pink-400 flex items-center justify-center rounded-lg"
        >
            <span class="text-white text-base font-semibold tracking-wider"
                >GH</span
            >
        </div>
        <p class="mt-4 w-20 text-xs text-gray-600 font-medium truncate">
            {{ project.title }}
        </p>
    </router-link>
</template>

<script>
    export default {
        name: 'ProjectCard',

        props: ['project'],

        data() {
            return {};
        },

        computed: {
            link() {
                return {
                    name: 'project-detail',
                    params: { id: this.project.id },
                };
            },
        },
    };
</script>

<style lang="css" scoped></style>
