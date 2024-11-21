<script>
export default {
    name: 'Personal',
    data() {
        return {
            races: [
                // Пример забегов
                { startPoint: 'Точка А', endPoint: 'Точка Б', dateTime: '2024-11-20T09:00', distance: 5, time: 15986 },
                { startPoint: 'Точка B', endPoint: 'Точка C', dateTime: '2024-11-18T10:30', distance: 10, time: 3600 },
                { startPoint: 'Точка C', endPoint: 'Точка D', dateTime: '2024-11-17T12:00', distance: 7, time: 2500 },
            ],
        };
    },
    computed: {
        // Общее расстояние
        totalDistance() {
            return this.races.reduce((acc, race) => acc + race.distance, 0).toFixed(2);
        },
        // Общее время (в формате чч:мм:сс)
        totalTime() {
            let totalSeconds = this.races.reduce((acc, race) => acc + race.time, 0);
            let hours = Math.floor(totalSeconds / 3600);
            let minutes = Math.floor((totalSeconds % 3600) / 60);
            let seconds = totalSeconds % 60;
            return `${hours} ч. ${minutes} мин. ${seconds} с.`;
        },
    },
    methods: {
        // Форматируем дату
        formatDate(date) {
            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            return new Date(date).toLocaleDateString('ru-RU', options);
        },
        // Форматируем время забега в чч:мм:сс
        formatTime(time) {
            let hours = Math.floor(time / 3600);
            let minutes = Math.floor((time % 3600) / 60);
            let seconds = time % 60;
            return `${hours} ч ${minutes} мин ${seconds} с`;
        },
    },
};
</script>

<template>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Статистика</h1>

        <!-- Общая информация о забегах -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <!-- Общее расстояние -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-2xl font-medium text-gray-800 mb-4">Общее расстояние</h2>
                <p class="text-4xl font-semibold text-blue-600">{{ totalDistance }} км</p>
            </div>

            <!-- Общее время -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-2xl font-medium text-gray-800 mb-4">Общее время бега</h2>
                <p class="text-4xl font-semibold text-blue-600">{{ totalTime }}</p>
            </div>
        </div>

        <!-- Список забегов -->
        <div class="mt-8">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Список забегов</h2>

            <div v-if="races.length === 0" class="text-center text-lg text-gray-500">
                Нет забегов
            </div>

            <div v-else>
                <ul class="space-y-4">
                    <li v-for="(race, index) in races" :key="index" class="bg-white p-4 shadow-md rounded-md">
                        <h3 class="text-xl font-semibold text-gray-800">{{ race.startPoint }} — {{ race.endPoint }}</h3>
                        <p class="text-gray-600">Дата: {{ formatDate(race.dateTime) }}</p>
                        <p class="text-gray-600">Расстояние: {{ race.distance }} км</p>
                        <p class="text-gray-600">Время: {{ formatTime(race.time) }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

</script>

<style scoped>

</style>
