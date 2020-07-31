import axios from 'axios';

export const namespaced = true;

export const state = {
    tasks: {},
};

export const mutations = {
    SET_TASKS_DATA(state, tasks) {
        state.tasks = tasks;
    },

    CREATE_TASK(state, task) {
        state.tasks.push(task);
    },
};

export const actions = {
    fetchTasks({ commit }, tasks) {
        commit('SET_TASKS_DATA', tasks);
    },

    createTask({ commit, rootState }, task) {
        const project = rootState.project.selectedProject;
        return axios
            .post(`/api/projects/${project.id}/tasks`, {
                body: task,
            })
            .then(({ data }) => {
                commit('CREATE_TASK', data.data);
                return data.data;
            });
    },
};

export const getters = {
    getTasks(state) {
        return state.tasks;
    },
};
