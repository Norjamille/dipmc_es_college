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
        url: route('admin.dashboard'),
        icon: HomeIcon,
    },
    {
        name: 'Programs',
        url: route('admin.programs'),
        icon: BookmarkIcon
    },
    {
        name: 'Courses',
        url: route('admin.courses'),
        icon: BookOpenIcon
    }
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
            <!-- Sidebar Search -->
            <div class="mt-5 px-3">
                <label for="search" class="sr-only">Search</label>
                <div class="relative mt-1 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                        aria-hidden="true">
                        <!-- Heroicon name: mini/magnifying-glass -->
                        <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="search" id="search"
                        class="block w-full rounded-md border-gray-300 pl-9 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Search">
                </div>
            </div>
            <!-- Navigation -->
            <nav class="mt-6 px-3">
                <div class="space-y-1">
                    <Link v-for="(navigation, index) in navigations" :href="navigation.url"
                        class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <component :is="navigation.icon" class="text-gray-400  mr-3 flex-shrink-0 h-6 w-6" />
                    {{ navigation.name }}
                    </Link>
                </div>
                <div class="mt-8">
                    <!-- Secondary navigation -->
                    <h3 class="px-3 text-sm font-medium text-gray-500" id="desktop-teams-headline">Teams</h3>
                    <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
                        <a href="#"
                            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                            <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                            <span class="truncate">Engineering</span>
                        </a>

                        <a href="#"
                            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                            <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                            <span class="truncate">Human Resources</span>
                        </a>

                        <a href="#"
                            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                            <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                            <span class="truncate">Customer Success</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>