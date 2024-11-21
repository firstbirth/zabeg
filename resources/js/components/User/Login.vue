<script>
import Sidebar from "@/components/Sidebar.vue";
import API from "@/API.js";

export default {
    name: "Login",
    components: {
        Sidebar,
    },
    data() {
        return {
            email: null,
            password: null
        }
    },
    methods: {
        login() {
            API.post('/api/auth/login', {email: this.email, password: this.password})
                .then(res => {
                localStorage.setItem('access_token', res.data.access_token);

                this.$router.push({name: 'user.personal'})
            }).catch(error => {
                console.log(error.response);
            })
        }
    }
}
</script>

<template>

    <div class="w-full">
        <div class="max-w-md space-y-3">
            <div class="relative">
                <input v-model="email" type="email"
                       class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                       placeholder="Логин">
                <div
                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                    <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>

            <div class="relative">
                <input v-model="password" type="password"
                       class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                       placeholder="Пароль">
                <div
                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                    <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                        <circle cx="16.5" cy="7.5" r=".5"></circle>
                    </svg>
                </div>
            </div>
        </div>

        <button @click.prevent="login" type="submit" class="w-1/2 py-3 mt-10 bg-indigo-500 rounded-lg
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-700 hover:shadow-none">Войти
        </button>
    </div>
</template>

<style scoped>

</style>
