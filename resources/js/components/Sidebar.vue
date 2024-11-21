<script>
import API from "@/API.js";

export default {
    name: "Sidebar",
    props: {
        accessToken: {
            type: String,
            default: null,
        },
    },

    methods: {
        logout() {
            API.post('api/auth/logout').then(res => {
                localStorage.removeItem('access_token');

                this.$router.push({name: 'user.login'})
            })
        }
    },
    mounted() {
        // window.location.reload()
    }
}
</script>

<template>

    <div>

        <!-- component -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"/>

        <div class="min-h-screen flex flex-row bg-gray-100">

            <div class="flex flex-col w-56 bg-white rounded-r-3xl overflow-hidden">
                <div class="flex items-center justify-center h-20 shadow-md">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-3xl text-gray-400"><i
                        class="bx bx-accessibility text-green-500"></i></span>
                    <h1 class="text-3xl uppercase text-green-500">zabeg</h1>
                </div>
                <ul class="flex flex-col py-4">
                    <li>
                        <router-link :to="{ name: 'user.login' }" class="button-link">
                            <a
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400">
                                <i
                                    class="bx bxs-log-in-circle"></i></span>
                                <span class="text-sm font-medium">Login</span>
                            </a>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'user.registration' }"
                                     class="button-link">
                            <a
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bxs-extension"></i>
                            </span>
                                <span class="text-sm font-medium">Registration</span>
                            </a>
                        </router-link>
                    </li>
                    <li>
                        <router-link v-if="accessToken" :to="{ name: 'user.personal' }"
                                     class="button-link">
                            <a
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bx-bar-chart-square"></i></span>
                                <span class="text-sm font-medium">Статистика</span>
                            </a>
                        </router-link>
                    </li>
                    <li>
                        <router-link v-if="accessToken" :to="{ name: 'user.races' }"
                                     class="button-link">
                            <a
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bx-run"></i></span>
                                <span class="text-sm font-medium">ЗАБЕГИ</span>
                            </a>
                        </router-link>
                    </li>
                    <li>
                        <router-link v-if="accessToken" :to="{ name: 'fruit.index' }"
                                     class="button-link">
                            <a
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bx-chat"></i></span>
                                <span class="text-sm font-medium">List</span>
                            </a>
                        </router-link>
                    </li>
                    <li>
                        <router-link v-if="accessToken" :to="{ name: 'user.personal' }"
                                     class="button-link">
                            <a
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bx-user"></i></span>
                                <span class="text-sm font-medium">Personal</span>
                            </a>
                        </router-link>
                    </li>
                    <!--                    <li>-->
                    <!--                        <a href="#"-->
                    <!--                           class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">-->
                    <!--                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i-->
                    <!--                                class="bx bx-bell"></i></span>-->
                    <!--                            <span class="text-sm font-medium">Notifications</span>-->
                    <!--                            <span class="ml-auto mr-6 text-sm bg-red-100 rounded-full px-3 py-px text-red-500">5</span>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <li>
                        <a href="#" @click.prevent="logout"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bx-log-out"></i></span>
                            <span class="text-sm font-medium">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ml-2 rounded-3xl flex flex-row w-full bg-white pt-20">
                <slot></slot>
            </div>

        </div>

    </div>
</template>

<style scoped>

</style>
