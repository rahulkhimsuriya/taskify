<template>
    <div class="absolute top-0 right-0 mr-10 mt-10 z-40">
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
