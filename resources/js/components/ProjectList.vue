<template>
    <div>
        <BaseSearchInput v-model="search" class="mb-8" />

        <div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <h2
                        class="text-white font-semibold text-base tracking-wide"
                    >
                        Projects
                    </h2>
                    <span class="ml-2 text-sm text-gray-600"
                        >({{ totalProjects }})</span
                    >
                </div>
                <div>
                    <CreateProject />
                </div>
            </div>
            <div class="mt-6">
                <div
                    class="pb-4 lg:pb-0 flex lg:flex-wrap overflow-x-auto lg:overflow-auto"
                    style="max-height: 300px;"
                    :class="totalProjects > 0 ? 'items-cemter' : ''"
                >
                    <template v-if="totalProjects">
                        <ProjectCard
                            class="w-1/3 mt-8"
                            v-for="project in filterProjects"
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
    </div>
</template>

<script>
    import store from '../store';
    import NProgress from 'nprogress';
    import { mapState } from 'vuex';
    import ProjectCard from '../components/ProjectCard.vue';
    import CreateProject from '../components/CreateProject.vue';

    export default {
        name: 'ProjectList',

        components: { ProjectCard, CreateProject },

        data() {
            return {
                search: '',
            };
        },

        created() {
            NProgress.start();

            store.dispatch('project/fetchProjects').then(() => {
                NProgress.done();
            });
        },

        computed: {
            ...mapState('project', ['projects', 'totalProjects']),

            filterProjects() {
                return this.projects.filter((post) => {
                    return post.title
                        .toLowerCase()
                        .includes(this.search.toLowerCase());
                });
            },
        },
    };
</script>

<style lang="css" scoped></style>
