<script>
import config from "tailwindcss/defaultConfig.js";
import router from "@/router.js";

import API from "@/api.js";

export default {
    name: "Index",
    data() {
        return {
            fruits: null,
        }
    },

    mounted() {
        this.getFruits();
    },

    methods: {
        getFruits() {
            API.get('/api/auth/fruits/').then(res => {
                this.fruits = res.data.data
            })
        },
    },
}
</script>

<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="fruit in fruits">
                <th scope="row">{{ fruit.id }}</th>
                <td>{{ fruit.name }}</td>
                <td>{{ fruit.price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
