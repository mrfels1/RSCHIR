<template>
    <div>
        <h1 class="text-3xl">PDF files</h1>
        <ul>
            <li v-for="file in props.files" :key="file"><a :href="`/storage/pdfs/${file}`">{{ file }}</a></li>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
    files: {
        type: Array,
        required: true,
    }
})
</script>
