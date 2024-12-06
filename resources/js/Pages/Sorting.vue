<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    array: {
        type: String,
        required: false,
    },
});
</script>

<template>
    <Head title="Sorting" />
    <div>
        <h1 class="text-3xl font-bold underline mb-4">
            Sorting
        </h1>
        <p v-if="props.array" class="mb-4">
            Given array:
            <code>{{ props.array.split(',').filter(v => !isNaN(v)).map(Number) }}</code>
            <br>
            Sorted array:
            <code>{{ quickSort(props.array.split(',').filter(v => !isNaN(v)).map(Number)) }}</code>
        </p>
    </div>
</template>

<script>
function quickSort(arr) {
    if (arr.length <= 1) {
        return arr;
    }

    const pivot = arr[0];
    const less = arr.slice(1).filter((el) => el <= pivot);
    const greater = arr.slice(1).filter((el) => el > pivot);

    return [...quickSort(less), pivot, ...quickSort(greater)];
}
</script>
