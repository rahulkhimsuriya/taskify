import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: null,
    },

    mutations: {
        SET_USER_DATA(state, user) {
            state.user = user;
            localStorage.setItem('user', JSON.stringify(user));
            axios.defaults.headers.common[
                'Authorization'
            ] = `Bearer ${user.access_token}`;
        },
    },

    actions: {
        login({ commit }, { email, password }) {
            return axios
                .post('/api/login', { email, password })
                .then(({ data }) => {
                    commit('SET_USER_DATA', data);
                });
        },
    },

    getters: {},
});
