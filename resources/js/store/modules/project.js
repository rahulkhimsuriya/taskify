import axios from 'axios';

export const namespaced = true;

export const state = {
    projects: null,
    totalProjects: 0,
};

export const mutations = {
    SET_PROJECTS_DATA(state, projects) {
        state.projects = projects;
        state.totalProjects = projects.length;
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

    fetchProject({ commit }, projectId) {
        return axios.get(`/api/projects/${projectId}`).then(({ data }) => {
            return data.data;
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
};
