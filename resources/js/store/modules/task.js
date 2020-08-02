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

    UPDATE_TASK(state, task) {
        state.tasks.find((t) => {
            if (t.id === task.id) {
                t = task;
            }
        });
    },

    DELETE_TASK(state, task) {
        state.tasks.filter((t) => t.id !== task.id);
    },

    TOGGLE_TASK_COMPLETION(state, task) {
        state.tasks.find((t) => {
            if (t.id == task.data.id) {
                t = task.data;
            }
        });
    },
};

export const actions = {
    fetchTasks({ commit }, tasks) {
        commit('SET_TASKS_DATA', tasks);
    },

    createTask({ commit, dispatch, rootState }, task) {
        const project = rootState.project.selectedProject;
        return axios
            .post(`/api/projects/${project.id}/tasks`, {
                body: task,
            })
            .then(({ data }) => {
                commit('CREATE_TASK', data.data);

                const notification = {
                    type: 'success',
                    message: 'Task created.',
                };
                dispatch('notification/add', notification, { root: true });

                return data.data;
            });
    },

    updateTask({ commit, dispatch, rootState }, task) {
        const project = rootState.project.selectedProject;
        return axios
            .patch(`/api/projects/${project.id}/tasks/${task.id}`, task)
            .then(({ data }) => {
                commit('UPDATE_TASK', data.data);

                const notification = {
                    type: 'success',
                    message: 'Task updated.',
                };
                dispatch('notification/add', notification, { root: true });

                return data.data;
            });
    },

    deleteTask({ commit, dispatch, rootState }, task) {
        const project = rootState.project.selectedProject;
        return axios
            .delete(`/api/projects/${project.id}/tasks/${task.id}`)
            .then(() => {
                commit('DELETE_TASK', task);

                const notification = {
                    type: 'success',
                    message: 'Task deleted.',
                };
                dispatch('notification/add', notification, { root: true });

                return task;
            });
    },

    toggle({ commit, dispatch }, task) {
        return axios
            .patch(`/api/tasks/${task.id}/complete`)
            .then(({ data }) => {
                commit('TOGGLE_TASK_COMPLETION', data);

                const notification = {
                    type: 'success',
                    message: data.message,
                };

                dispatch('notification/add', notification, { root: true });

                return data;
            });
    },
};

export const getters = {
    getTasks(state) {
        return state.tasks;
    },
};
