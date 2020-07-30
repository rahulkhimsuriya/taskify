import axios from 'axios';

export const namespaced = true;

export const state = {
    user: null,
};

export const mutations = {
    SET_USER_DATA(state, user) {
        state.user = user;
        localStorage.setItem('user', JSON.stringify(user));
        axios.defaults.headers.common[
            'Authorization'
        ] = `Bearer ${user.access_token}`;
    },

    CLEAR_USER_DATA(state) {
        localStorage.removeItem('user');
        location.reload('/login');
    },
};

export const actions = {
    login({ commit }, { email, password }) {
        return axios
            .post('/api/login', { email, password })
            .then(({ data }) => {
                commit('SET_USER_DATA', data);
            });
    },

    register({ commit }, { name, email, password }) {
        return axios
            .post('/api/register', { name, email, password })
            .then(({ data }) => {
                commit('SET_USER_DATA', data);
            });
    },

    logout({ commit }) {
        return axios.delete('/api/logout').then(() => {
            commit('CLEAR_USER_DATA');
        });
    },
};

export const getters = {
    isLogedIn(state) {
        return !!state.user;
    },

    getUser(state) {
        return state.user.user;
    },
};
