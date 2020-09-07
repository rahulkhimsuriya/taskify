import axios from 'axios';

export const namespaced = true;

export const state = {
    projects: null,
    totalProjects: 0,
    selectedProject: {},
    colors: null,
};

export const mutations = {
    SET_PROJECTS_DATA(state, projects) {
        state.projects = projects;
        state.totalProjects = projects.length;
    },

    SET_SELECTED_PROJECT(state, selectedProject) {
        state.selectedProject = selectedProject;
    },

    CREATE_PROJECT(state, project) {
        state.totalProjects += 1;

        state.projects.unshift(project);
    },

    UPDATE_PROJECT(state, project) {
        state.selectedProject = project;

        state.projects.find((p) => {
            if (p.id == project.id) {
                p.color = project.color;
                p.title = project.title;
                p.description = project.description;
            }
        });
    },

    DELETE_PROJECT(state, project) {
        state.totalProjects -= 1;

        state.projects.splice(project, 1);
    },

    SET_COLORS(state, colors) {
        state.colors = colors;
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

    fetchColors({ commit, state }) {
        if (state.colors) {
            return state.colors;
        }
        return axios.get('/api/colors').then(({ data }) => {
            commit('SET_COLORS', data);
        });
    },

    fetchProject({ commit, dispatch, state }, projectId) {
        if (state.selectedProject.id == projectId) {
            return state.selectedProject;
        }
        return axios.get(`/api/projects/${projectId}`).then(({ data }) => {
            commit('SET_SELECTED_PROJECT', data.data);
            dispatch('task/fetchTasks', data.data.tasks, { root: true });
            return data.data;
        });
    },

    createProject({ commit, dispatch }, project) {
        return axios.post('/api/projects', project).then(({ data }) => {
            commit('CREATE_PROJECT', data.data);

            const notification = {
                type: 'success',
                message: 'Project created.',
            };
            dispatch('notification/add', notification, { root: true });

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

    sendInvitation({ dispatch }, { projectId, email }) {
        return axios
            .post(`/api/projects/${projectId}/invitation`, { email })
            .then(({ data }) => {
                const notification = {
                    type: 'success',
                    message: data.message,
                };
                dispatch('notification/add', notification, { root: true });

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

    getSelectedProject(state) {
        return state.selectedProject;
    },
};
