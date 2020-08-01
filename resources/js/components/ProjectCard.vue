<template>
    <router-link
        :to="link"
        class="flex flex-col items-center justify-center text-center"
    >
        <div
            class="p-2 border-2 border-transparent rounded-lg shadow-inside"
            :class="project.id == selectedProject.id ? 'border-pink-400' : ''"
        >
            <div
                class="h-20 w-20 bg-pink-500 flex items-center justify-center rounded-lg"
            >
                <span
                    class="text-white text-base font-semibold tracking-wider"
                    v-text="initials"
                ></span>
            </div>
        </div>
        <p class="mt-4 w-20 text-xs text-gray-600 font-medium truncate">
            {{ project.title }}
        </p>
    </router-link>
</template>

<script>
    import { mapState } from 'vuex';

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

            initials() {
                return this.project.title
                    .split(' ')
                    .map((c, i) => {
                        if (i > 1) return;
                        return c[0].toUpperCase();
                    })
                    .join('');
            },

            ...mapState('project', ['selectedProject']),
        },
    };
</script>

<style lang="css" scoped></style>
