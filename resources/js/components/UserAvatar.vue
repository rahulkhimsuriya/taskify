<template>
    <img
        class="h-8 w-8 border border-white rounded-full shadow-sm"
        :src="avatar"
        :alt="this.name"
    />
</template>

<script>
    export default {
        props: {
            name: {
                required: true,
                type: String,
            },
        },

        name: 'UserAvatar',

        data() {
            return {};
        },

        computed: {
            avatar() {
                return `https://ui-avatars.com/api/?name=${this.name}&color=7F9CF5&background=EBF4FF`;
            },
        },
    };
</script>

<style lang="css" scoped></style>
