<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    loadingOn: {
        type: Boolean,
        default: false,
    }
});
</script>

<template>
    <button :type="type" :disabled="loadingOn"
        class="inline-flex items-center disabled:bg-gray-500 disabled:cursor-not-allowed px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-600 focus:outline-none ">
        <slot />
    </button>
</template>
