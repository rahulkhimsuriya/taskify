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
    fetchProjects({ commit }) {
        return axios.get('/api/projects').then(({ data }) => {
            commit('SET_PROJECTS_DATA', data.data);
        });
    },
};

export const getters = {
    projects(state) {
        return state.projects;
    },

    totalProjects(state) {
        return state.totalProjects;
    },
};
