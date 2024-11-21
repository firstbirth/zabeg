<script>
import Sidebar from "@/components/Sidebar.vue";

export default {
    name: "Index",
    components: {
        Sidebar,
    },
    data() {
        return {
            accessToken: null,
        }
    },
    mounted() {
        this.getAccessToken();
    },

    // updated() {
    //     this.getAccessToken();
    // },

    methods: {
        getAccessToken() {
            this.accessToken = localStorage.getItem('access_token');
            // window.location.reload()
        }
    },


}
</script>

<template>
    <div class="flex flex-col">
        <div>
            <Sidebar v-model:access-token="accessToken">
                <div class="w-1/3 p-4">
                    <router-view></router-view>
                </div>
            </Sidebar>
        </div>
    </div>
</template>

<style scoped>
</style>
