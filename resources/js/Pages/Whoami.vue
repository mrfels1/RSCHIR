<template>
    <div class="max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Whoami</h2>
        <pre>{{ $page.props.whoami }}</pre>
        <h2 class="text-2xl font-bold mt-10 mb-4">LS</h2>
        <pre>{{ $page.props.ls }}</pre>
        <h2 class="text-2xl font-bold mt-10 mb-4">PS</h2>
        <pre>{{ $page.props.ps }}</pre>
        <h2 class="text-2xl font-bold mt-10 mb-4">id</h2>
        <pre>{{ $page.props.id }}</pre>
    </div>
</template>

<script>
export default {
    props: {
        whoami: String,
        ls: String,
        ps: String,
        id: String
    }
}
</script>
