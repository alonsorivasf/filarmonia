<template>
    <Head title="Bienvenido" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 mx-auto sm:justify-start sm:pt-0">
                <img src="/images/logowh.webp" alt="DS-App Logo" class="w-116 h-16" viewBox="0 0 48 155" fill="none">
            </div>
            <br>
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="https://scontent.fcjs4-1.fna.fbcdn.net/v/t1.6435-9/178924115_3683354688454181_1295775707753003564_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=730e14&_nc_eui2=AeHwNzEwKb367ZLkjN3UjT9sGvx1N-jdy-ca_HU36N3L55LG9LJxmi5lB--m1bhUsr9zqaPK7yJfdOr75uc-_XzQ&_nc_ohc=ER57g4zu8woAX_2wwFP&_nc_ht=scontent.fcjs4-1.fna&oh=00_AT8QBBM_R5bQGzxl0IPuAC4tVVxx79otcH6QVKMKE9x-MQ&oe=61F0B55A" alt="Donación de sangre">
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <Link v-if="!$page.props.user" :href="route('login')" class="text-sm text-gray-700 underline">
                            <button class="bg-red-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Iniciar Sesión
                            </button>
                        </Link>

                        <Link v-if="canRegister && !$page.props.user" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                            <button class="bg-red-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Registrarse
                            </button>
                        </Link>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                        <button class="bg-red-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Dashboard
                        </button>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            Link,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })
</script>
