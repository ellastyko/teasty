<template>
    <a
        v-for="receipt in receipts"
        :key="receipt.id"
        :href="'/receipts/' + receipt.id"
        class="relative flex flex-col items-center border rounded-lg shadow md:flex-row md:max-w-xl border-gray-700 bg-gray-800 hover:bg-gray-700"
    >
        <rating :rating="receipt.rating"/>

        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" :src="receipt.preview_image" alt="">
        <div class="flex flex-col justify-between p-4 pt-6 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ receipt.header }}</h5>
            <p class="mb-3 font-normal text-gray-400">{{ receipt.description }}</p>
        </div>
    </a>
</template>

<script>
import Rating from "./Rating.vue";

export default {
    name: "ReceiptsListing",
    components: {Rating},
    props: {
        receipts: {
            type: Array,
            default: []
        }
    }
}
</script>
