import Vue from 'vue';
import App from './views/App.vue';
import router from './router';
import store from './store';
import axios from 'axios';

import upperFirst from 'lodash/upperFirst';
import camelCase from 'lodash/camelCase';

import 'nprogress/nprogress.css';

import VModal from 'vue-js-modal';
Vue.use(VModal);

const requireComponent = require.context(
    './components',
    false,
    /Base[A-Z]\w+\.(vue|js)$/
);

requireComponent.keys().forEach((fileName) => {
    const componentConfig = requireComponent(fileName);

    const componentName = upperFirst(
        camelCase(
            fileName
                .split('/')
                .pop()
                .replace(/\.\w+$/, '')
        )
    );

    Vue.component(componentName, componentConfig.default || componentConfig);
});

new Vue({
    store,
    router,
    created() {
        const userString = localStorage.getItem('user');

        if (userString) {
            const userData = JSON.parse(userString);
            this.$store.commit('auth/SET_USER_DATA', userData);
        }

        axios.interceptors.response.use(
            (response) => response,
            (error) => {
                if (error == 'Error: Network Error') {
                    const notification = {
                        type: 'error',
                        message: error,
                    };
                    this.$store.dispatch('notification/add', notification);
                }
                return Promise.reject(error);
            }
        );
    },
    render: (h) => h(App),
}).$mount('#app');
