<template>
<Head title="Cookies Information" />
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Cookies Information</h1>
        <p class="mb-6">
            This page provides information about the cookies used on our website.
        </p>
        <div v-if="cookies && cookies.length" class="mb-4 p-4 border rounded shadow" >
            <ul>
                <li  class="mb-2">
                    <p><strong>ID:</strong> {{ JSON.parse(cookies).id }}</p>
                    <p><strong>Name:</strong> {{ JSON.parse(cookies).name }}</p>
                    <p><strong>Email:</strong> {{ JSON.parse(cookies).email }}</p>
                    <p><strong>Email Verified At:</strong> {{ JSON.parse(cookies).email_verified_at }}</p>
                    <p><strong>Created At:</strong> {{ JSON.parse(cookies).created_at }}</p>
                    <p><strong>Updated At:</strong> {{ JSON.parse(cookies).updated_at }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    cookies: {
        type: Array,
        required: true,
    },
});
</script>
