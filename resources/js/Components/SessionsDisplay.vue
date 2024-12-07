<script >
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head title="Sessions" />
    <div class="space-y-6">
        <h2 class="text-3xl font-bold">Active Sessions</h2>

        <ul class="space-y-2">
            <li
                v-for="(session, index) in sessions"
                :key="index"
                class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-2 rounded-md"
            >
                <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ session.id }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 ml-2">
                        {{ session.ip_address }}
                        {{ session.user_agent }}
                    </div>
                </div>

                <button
                    @click="destroySession(session.id)"
                    class="text-red-500 hover:text-red-700 focus:outline-none"
                >
                    Delete
                </button>
            </li>
        </ul>
    </div>
</template>