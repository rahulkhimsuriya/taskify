<template>
    <div>
        <div class="flex items-center">
            <h2 class="text-white font-semibold text-base tracking-wide">
                Projects
            </h2>
            <span class="ml-2 text-sm text-gray-600"
                >({{ totalProjects }})</span
            >
        </div>
        <div class="mt-6">
            <div
                class="flex flex-wrap overflow-auto"
                style="height: 300px;"
                :class="totalProjects > 0 ? 'items-cemter' : ''"
            >
                <template v-if="totalProjects">
                    <ProjectCard
                        class="w-1/3 mt-8"
                        v-for="project in projects"
                        :key="project.id"
                        :project="project"
                    />
                </template>
                <template v-else>
                    <p class="text-sm text-gray-600 font-base">
                        You don't have any project yet.
                    </p>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import ProjectCard from '../components/ProjectCard.vue';

    export default {
        name: 'ProjectList',

        components: { ProjectCard },

        data() {
            return {};
        },

        mounted() {
            this.$store.dispatch('project/fetchProjects');
        },

        computed: {
            ...mapState('project', {
                projects: 'projects',
                totalProjects: 'totalProjects',
            }),
        },
    };
</script>

<style lang="css" scoped></style>
