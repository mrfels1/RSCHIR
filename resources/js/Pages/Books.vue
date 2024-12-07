<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import BookList from '@/Components/BooksAndAuthors/BookList.vue';
</script>

<template>
    <Head title="Books" class="text-white" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white dark:bg-gray-800 dark:text-white">
                    <BookList />
                </div>
            </div>
        </div>
    </div>
</template>
