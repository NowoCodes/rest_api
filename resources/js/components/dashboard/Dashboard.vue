<template>
    <div class="flex p-4 m-4 bg-white rounded-lg">
        <div>
            <h1 class="text-4xl font-bold text-center text-gray-700">Dashboard</h1>

            <p class="mt-4 text-lg">
                Hello <span class="font-bold">{{ user.name }}</span>, Welcome to the Dashboard. You have registered with
                the email <span class="italic font-bold">{{ user.email }}</span>.
            </p>

            <p class="mt-4">
                Velox humani generiss ducunt ad hippotoxota. When one believes milk and tantra, one is able to know
                mineral.
                Everything we do is connected with zen: intuition, sorrow, light, blessing.
                Klingons meet from paralysis like boldly space suits.
                Lord, weird cannibal. you won't fear the reef.Remember: toasted tofu tastes best when grilled in a
                casserole mashed up with basil.
            </p>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters([
            'user'
        ])
    }
}
</script>