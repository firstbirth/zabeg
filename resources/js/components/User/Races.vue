<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Создание забега</h2>

        <!-- Форма для создания забега -->
        <form @submit.prevent="submitRace">
            <!-- Точка А -->
            <div class="mb-4">
                <label for="startPoint" class="block text-sm font-medium text-gray-700">Точка А</label>
                <input
                    id="startPoint"
                    v-model="race.startPoint"
                    type="text"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>

            <!-- Точка Б -->
            <div class="mb-4">
                <label for="endPoint" class="block text-sm font-medium text-gray-700">Точка Б</label>
                <input
                    id="endPoint"
                    v-model="race.endPoint"
                    type="text"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>

            <!-- Дата и время -->
            <div class="mb-4">
                <label for="dateTime" class="block text-sm font-medium text-gray-700">Дата/Время</label>
                <input
                    id="dateTime"
                    v-model="race.dateTime"
                    type="datetime-local"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>

            <!-- Расстояние -->
            <div class="mb-4">
                <label for="distance" class="block text-sm font-medium text-gray-700">Расстояние (км)</label>
                <input
                    id="distance"
                    v-model="race.distance"
                    type="number"
                    min="0"
                    step="0.1"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>

            <!-- Тип забега -->
            <div class="mb-4">
                <label for="raceType" class="block text-sm font-medium text-gray-700">Тип забега</label>
                <select
                    id="raceType"
                    v-model="race.type"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                >
                    <option value="sprint">Спринт</option>
                    <option value="circle">Круг</option>
                </select>
            </div>

            <!-- Количество кругов (если тип забега Круг) -->
            <div v-if="race.type === 'circle'" class="mb-4">
                <label for="laps" class="block text-sm font-medium text-gray-700">Количество кругов</label>
                <input
                    id="laps"
                    v-model="race.laps"
                    type="number"
                    min="1"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>

            <!-- Кнопка отправки -->
            <div class="mt-6">
                <button
                    type="submit"
                    class="w-full bg-green-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                >
                    Создать забег
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            race: {
                startPoint: '',
                endPoint: '',
                dateTime: '',
                distance: '',
                type: 'sprint', // По умолчанию тип забега Спринт
                laps: null, // Количество кругов для типа Круг
            },
        };
    },
    methods: {
        submitRace() {
            // Здесь будет логика отправки данных на сервер
            const raceData = { ...this.race };

            // Пример отправки данных с использованием API (предположим, что у вас есть метод API.post)
            this.$axios
                .post('/api/races', raceData) // Замените на правильный URL вашего API
                .then(response => {
                    // Обработка успешного ответа (например, очистка формы или уведомление)
                    console.log('Забег создан:', response.data);
                    this.resetForm();
                    this.$router.push({ name: 'user.races' }); // Перенаправление на страницу с забегами
                })
                .catch(error => {
                    console.error('Ошибка при создании забега:', error);
                });
        },
        resetForm() {
            this.race = {
                startPoint: '',
                endPoint: '',
                dateTime: '',
                distance: '',
                type: 'sprint',
                laps: null,
            };
        },
    },
};
</script>

<style scoped>
/* Здесь можно добавить дополнительные стили, если необходимо */
</style>
>
