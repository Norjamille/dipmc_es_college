<script setup>
import UserAccountDropdown from '@/Components/UserAccountDropdown.vue';
import { Link } from '@inertiajs/inertia-vue3';
import {
    BookmarkIcon,
    BookOpenIcon,
    HomeIcon,
} from '@heroicons/vue/24/outline'

const navigations = [
    {
        name: 'Dashboard',
        url: route('staff.dashboard'),
        icon: HomeIcon,
    },
    {
        name: 'Enrollment',
        url: route('staff.enrollment'),
        icon: BookmarkIcon
    },
];
</script>

<template>
    <div
        class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-gray-200 lg:bg-gray-100 lg:pt-5 lg:pb-4">
        <div class="flex flex-shrink-0 justify-center items-center px-6">
            <h1 class="tracking-widest text-2xl font-bold text-green-500 uppercase">
                DIPMC
            </h1>
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="mt-5 flex h-0 flex-1 flex-col overflow-y-auto pt-1">
            <!-- User account dropdown -->
            <UserAccountDropdown />
            <!-- Navigation -->
            <nav class="mt-6 px-3">
                <div class="space-y-1">
                    <Link v-for="(navigation, index) in navigations" :href="navigation.url"
                        class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <component :is="navigation.icon" class="text-gray-400  mr-3 flex-shrink-0 h-6 w-6" />
                    {{ navigation.name }}
                    </Link>
                </div>
            </nav>
        </div>
    </div>
</template>