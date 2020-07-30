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
                class="flex items-center flex-wrap overflow-auto"
                style="height: 300px;"
            >
                <ProjectCard
                    class="w-1/3 mt-8"
                    v-for="project in projects"
                    :key="project.id"
                    :project="project"
                />
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import ProjectCard from '../components/ProjectCard.vue';

    export default {
        name: 'ProjectList',

        components: { ProjectCard },

        data() {
            return {};
        },

        created() {
            this.$store.dispatch('project/fetchProjects');
        },

        computed: {
            ...mapGetters('project', {
                projects: 'getProjects',
                totalProjects: 'getTotalProjects',
            }),
        },
    };
</script>

<style lang="css" scoped></style>
