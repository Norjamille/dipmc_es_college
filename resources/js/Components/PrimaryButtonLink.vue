<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Link type="button"
        class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-600 focus:outline-none ">
    <slot />
    </Link>
</template>
