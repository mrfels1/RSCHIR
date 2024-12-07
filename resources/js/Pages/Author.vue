<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import BookList from '@/Components/BooksAndAuthors/BookList.vue';

const props = defineProps({
    author: {
        type: Object,
        required: true,
    },
});

const books = ref([]);

</script>

<template>
        <Head :title="props.author.name" />
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-500">
                        <div class="flex flex-col space-y-4">
                            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                {{ props.author.name }}
                            </h2>
                            <div class="flex space-x-2">
                                <p class="text-lg font-medium text-gray-900 dark:text-gray-300">
                                    Date of birth:
                                </p>
                                <p v-if="props.author.date_of_birth" class="text-lg text-gray-500 dark:text-gray-400">
                                    {{ props.author.date_of_birth }}
                                </p>
                                <p v-else class="text-lg text-gray-500 dark:text-gray-400">
                                    Date of birth not available
                                </p>
                            </div>
                            <h3 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                {{ `${props.author.name}'s books` }}
                            </h3>
                            <BookList :authorId="props.author.id" />
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
