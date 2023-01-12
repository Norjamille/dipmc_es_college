<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    prevUrl: {
        type: String,
        required: false,
    },
    nextUrl: {
        type: String,
        required: false,
    },
    from: Number,
    to: Number,
    total: Number
})
</script>

<template>
    <nav class="flex items-center justify-between border-t border-gray-200 bg-white  py-3 " aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">
                    {{ props.from }}
                </span>
                to
                <span class="font-medium">
                    {{ props.to }}
                </span>
                of
                <span class="font-medium">
                    {{ props.total }}
                </span>
                results
            </p>
        </div>
        <div class="flex flex-1 justify-between sm:justify-end">
            <component :is="prevUrl ? Link : 'span'" :href="prevUrl" :class="{
                'border-gray-300 bg-white hover:bg-gray-50': prevUrl,
                'border-gray-100 bg-gray-100': !prevUrl
            }"
                class="relative inline-flex items-center rounded-md border  px-4 py-2 text-sm font-medium text-gray-700 ">
                Previous</component>
            <component :is="nextUrl ? Link : 'span'" :href="nextUrl" :class="{
                'border-gray-300 bg-white hover:bg-gray-50': nextUrl,
                'border-gray-100 bg-gray-100': !nextUrl
            }"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Next</component>
        </div>
    </nav>
</template>