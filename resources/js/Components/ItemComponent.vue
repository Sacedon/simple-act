<template>

    <div class="bg-white p-6 rounded shadow-sm cursor-pointer" @click="openItem">
        <img :src="item.picUrl" alt="Product photo" class="aspect-square w-full object-cover mb-4">
        <h4 class="text-2xl">Item: {{ item?.name }}</h4>
        <div class="text-gray-400">{{ item?.description }}</div>
    </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';


const prop = defineProps({
    item: Object
})

function openItem() {
    router.visit('/items/' + prop.item.id)
}

</script>
