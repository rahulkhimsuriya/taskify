import Vue from 'vue';
import Vuex from 'vuex';
import * as auth from './modules/auth';
import * as project from './modules/project';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        project,
    },
});
