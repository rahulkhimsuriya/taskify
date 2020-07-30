<template>
    <div class="flex">
        <div class="w-1/2 flex items-center justify-center">
            <div class="max-w-sm">
                <header>
                    <h1
                        class="text-3xl text-semibold text-white tracking-wide leading-none"
                    >
                        Hi Rahul
                    </h1>
                    <p
                        class="mt-2 text-sm text-gray-600 tracking-wide leading-none"
                    >
                        Welcome back to the worksapce,we missed You.!
                    </p>

                    <div class="mt-6 relative">
                        <span class="absolute inset-y-0 left-0 ml-4 py-4">
                            <svg
                                class="h-4 w-4 text-gray-100"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </span>
                        <input
                            class="pl-10 pr-4 py-3 w-full bg-gray-700 text-sm font-normal tracking-wide border border-transparent text-md text-gray-100 focus:outline-none focus:shadow-xl focus:border-gray-600 transition duration-300 ease-linear rounded-full"
                            placeholder="Search Task or Project..."
                        />
                    </div>
                </header>

                <div class="mt-12">
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
                    <div class="mt-6">
                        <div
                            class="flex items-center flex-wrap overflow-auto"
                            style="height: 300px;"
                        >
                            <ProjectCard
                                class="w-1/3 mt-8"
                                v-for="project in projects"
                                :key="project.id"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="w-1/2 bg-white absolute right-0 inset-y-0 p-4 m-4 rounded shadow"
        ></div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import ProjectCard from '../components/ProjectCard.vue';

    export default {
        name: 'Dashboard',

        components: { ProjectCard },

        data() {
            return {};
        },

        mounted() {
            this.$store.dispatch('project/fetchProjects');
        },

        computed: {
            ...mapGetters('project', ['projects', 'totalProjects']),
        },
    };
</script>

<style lang="css" scoped></style>
