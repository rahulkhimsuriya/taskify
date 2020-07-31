<template>
    <div :class="classes" v-if="isActive">
        <div class="flex items-center">
            <span>
                <svg
                    class="h-6 w-6 text-white"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                        v-if="notification.type == 'success'"
                    ></path>

                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"
                        v-if="notification.type == 'error'"
                    />
                </svg>
            </span>
            <p class="ml-2 text-sm" v-text="notification.message"></p>
        </div>
        <button
            class="ml-4 focus:outline-none focus:shadow-outline"
            @click="isActive = false"
        >
            <svg
                class="h-4 w-4 text-white"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </button>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';

    export default {
        name: 'BaseNotification',

        props: {
            notification: {
                type: Object,
                required: true,
            },
        },

        data() {
            return {
                isActive: true,
                timeout: null,
            };
        },

        mounted() {
            this.timeout = setTimeout(() => {
                this.remove(this.notification);
            }, 3000);
        },

        beforeDestroy() {
            clearTimeout(this.timeout);
        },

        computed: {
            classes() {
                let defaults = [
                    'flex',
                    'items-center',
                    'justify-between',
                    'px-4',
                    'py-4',
                    'text-base',
                    'text-white',
                    'rounded',
                    'shadow-lg',
                    'z-40',
                ];

                if (this.notification.type == 'success')
                    defaults.push('bg-green-500');

                if (this.notification.type == 'error')
                    defaults.push('bg-red-500');

                return defaults;
            },
        },

        methods: {
            ...mapActions('notification', ['remove']),
        },
    };
</script>

<style lang="css" scoped></style>
