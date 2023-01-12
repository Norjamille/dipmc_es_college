<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ClipboardDocumentListIcon } from '@heroicons/vue/24/outline';
const props = defineProps({
    href: String,
})
</script>

<template>
    <component :is="props.href ? Link : 'button'" :href="href"
        class="flex space-x-2 items-center text-sm uppercase font-semibold text-green-500 hover:text-green-600">
        <ClipboardDocumentListIcon class="h-5" />
        <span>SUBJECT OFFERS</span>
    </component>
</template>