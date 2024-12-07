<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    pdf: null,
});

const handleFileChange = (event) => {
    form.pdf = event.target.files[0];
};

const submitForm = () => {
    form.post(route('save-file'));
};
</script>

<template>
    <div class="max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Upload PDF File</h2>
        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label for="pdf" class="block text-sm font-medium text-gray-700">PDF File</label>
                <input
                    type="file"
                    id="pdf"
                    accept=".pdf"
                    @change="handleFileChange"
                    class="mt-1 block w-full"
                />
            </div>
            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-black rounded hover:bg-blue-700"
                :disabled="form.processing"
            >
                Upload
            </button>
        </form>
    </div>
</template>
