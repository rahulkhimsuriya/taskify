<template>
    <div class="flex items-center">
        <UserAvatar
            v-for="(member, index) in members"
            :class="index > index - 1 ? '-ml-1' : ''"
            :key="index"
            :name="member.name"
        />
        <button
            @click="$modal.show('modalMemebrInvite')"
            class="-ml-1 bg-white focus:outline-none focus:shadow-outline group-hover rounded-full"
        >
            <svg
                viewBox="0 0 20 20"
                fill="currentColor"
                class="w-6 h-6 border border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-gray-100 rounded-full"
            >
                <path
                    fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </button>

        <modal name="modalMemebrInvite" height="auto" @closed="reset">
            <div class="pt-4 pb-6 max-w-md mx-auto">
                <h1
                    class="mt-2 text-xl text-gray-600 font-medium tracking-wide text-center"
                >
                    Invite Member
                </h1>

                <form @submit.prevent="sentInvitation">
                    <BaseInput
                        label="Email"
                        type="email"
                        class="mt-4"
                        placeholder="email@example.com"
                        v-model="email"
                        required
                    />
                    <p class="text-sm font-semibold text-red-600" v-if="errors">
                        {{ errors.email[0] }}
                    </p>

                    <BaseButton type="success" class="block mt-2 ml-auto">
                        Invite
                    </BaseButton>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    import UserAvatar from './UserAvatar';
    import NProgress from 'nprogress';

    export default {
        name: 'UserAvatarList',

        props: {
            members: {
                required: true,
                type: Array,
            },
            projectId: {
                required: true,
            },
        },

        components: {
            UserAvatar,
        },

        data() {
            return {
                email: '',
                errors: '',
            };
        },

        methods: {
            reset() {
                this.email = '';
                this.errors = '';
            },

            sentInvitation() {
                NProgress.start();

                this.$store
                    .dispatch('project/sendInvitation', {
                        projectId: this.projectId,
                        email: this.email,
                    })
                    .then((project) => {
                        this.$modal.hide('modalMemebrInvite');

                        this.reset();

                        NProgress.done();
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;

                        NProgress.done();
                    });
            },
        },
    };
</script>

<style lang="css" scoped></style>
