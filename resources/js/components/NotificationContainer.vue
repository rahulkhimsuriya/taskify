<template>
    <div class="fixed top-0 right-0 m-4 md:m-6 lg:m-8 z-40">
        <BaseNotification
            v-for="notification in notifications"
            :key="notification.id"
            :notification="notification"
            class="mt-2"
        />
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    export default {
        name: 'NotificationContainer',

        data() {
            return {};
        },

        computed: {
            ...mapState('notification', ['notifications']),
        },
    };
</script>

<style lang="css" scoped></style>
