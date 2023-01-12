<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { PencilSquareIcon } from '@heroicons/vue/24/outline';
const props = defineProps({
    href: String,
})
</script>

<template>
    <component :is="props.href ? Link : 'button'" :href="href"
        class="flex space-x-2 items-center text-sm uppercase font-semibold text-yellow-500 hover:text-yellow-600">
        <PencilSquareIcon class="h-5" />
        <span>Edit</span>
    </component>
</template>