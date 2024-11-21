<script>
import API from "@/API.js";

export default {
    name: "Registration",
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },

    mounted() {
        console.log(localStorage.getItem('access_token'));
    },

    methods: {
        store() {
            API.post('/api/users', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then( res => {
                localStorage.setItem('access_token', res.data.access_token);

                this.$router.push({name: 'user.personal'})

                console.log(res);
            })
        }
    }
}

</script>

<template>
    <div>
        <div class="w-full">
            <input v-model="name" type="text" class="block w-full py-3 px-1 mt-2
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200" placeholder="name">
            <input v-model="email" type="email" class="block w-full py-3 px-1 mt-2
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200" placeholder="email">
            <input v-model="password" type="password" class="block w-full py-3 px-1 mt-2
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200" placeholder="password">
            <input v-model="password_confirmation" type="password" class="block w-full py-3 px-1 mt-2
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                   placeholder="confirm password">
            <button @click.prevent="store" type="submit" class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-700 hover:shadow-none">Зарегистрироваться</button>
        </div>
    </div>
</template>

<style scoped>

</style>
