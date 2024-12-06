<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    num: {
        type: Number,
        required: false,
    },
});
</script>
<template>
    <Head title="Drawer" />
    <div class="flex justify-center items-center h-screen">
        <svg v-if="num == 1" width="100" height="100">
            <circle cx="50" cy="50" r="40" fill="red" />
        </svg>
        <svg v-else-if="num == 2" width="100" height="100">
            <rect width="80" height="80" fill="blue" x="10" y="10" />
        </svg>
        <svg v-else-if="num == 3" width="100" height="100">
            <polygon points="50,15 90,85 10,85" fill="green" />
        </svg>
        <p v-else>
            no number
        </p>
        
    </div>
</template>



