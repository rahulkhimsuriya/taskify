import axios from 'axios';

export const namespaced = true;

export const state = {
    projects: null,
    totalProjects: 0,
    selectedProject: {},
};

export const mutations = {
    SET_PROJECTS_DATA(state, projects) {
        state.projects = projects;
        state.totalProjects = projects.length;
    },

    SET_SELECTED_PROJECT(state, selectedProject) {
        state.selectedProject = selectedProject;
    },

    UPDATE_PROJECT(state, project) {
        state.selectedProject = { ...project };
    },

    DELETE_PROJECT(state, project) {
        state.totalProjects -= 1;

        state.projects.splice(project, 1);

        console.log(state.projects);
    },
};

export const actions = {
    fetchProjects({ commit, state }) {
        if (state.projects) {
            return state.projects;
        }
        return axios.get('/api/projects').then(({ data }) => {
            commit('SET_PROJECTS_DATA', data.data);
        });
    },

    fetchProject({ commit, dispatch }, projectId) {
        return axios.get(`/api/projects/${projectId}`).then(({ data }) => {
            commit('SET_SELECTED_PROJECT', data.data);
            dispatch('task/fetchTasks', data.data.tasks, { root: true });
            return data.data;
        });
    },

    updateProject({ commit, dispatch }, project) {
        return axios
            .patch(`/api/projects/${project.id}`, project)
            .then(({ data }) => {
                commit('UPDATE_PROJECT', data.data);

                const notification = {
                    type: 'success',
                    message: 'Project updated.',
                };
                dispatch('notification/add', notification, { root: true });

                return data.data;
            });
    },

    deleteProject({ commit, dispatch }, project) {
        return axios.delete(`/api/projects/${project.id}`).then(() => {
            commit('DELETE_PROJECT', project);

            const notification = {
                type: 'success',
                message: 'Project deleted.',
            };
            dispatch('notification/add', notification, { root: true });

            return null;
        });
    },
};

export const getters = {
    getProjects(state) {
        return state.projects;
    },

    getTotalProjects(state) {
        return state.totalProjects;
    },

    getSelectedProject(state) {
        return state.selectedProject;
    },
};
