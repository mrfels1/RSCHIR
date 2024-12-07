<template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-500">
                        <SessionsDisplay />
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SessionsDisplay from '@/Components/SessionsDisplay.vue';

export default {
    components: {
        AuthenticatedLayout,
        SessionsDisplay,
    },
};
</script>

