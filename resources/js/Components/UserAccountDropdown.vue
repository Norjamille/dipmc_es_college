<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
let show = ref(false);
</script>

<template>
    <div @mouseenter="show = true" @mouseleave="show = false" class="relative inline-block px-3 text-left">
        <div>
            <button type="button"
                class="group w-full rounded-md bg-gray-100 px-3.5 py-2 text-left text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none"
                id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="flex items-center justify-between w-full">
                    <span class="flex items-center justify-between min-w-0 space-x-3">
                        <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                            src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            alt="">
                        <span class="flex flex-col flex-1 min-w-0">
                            <span class="text-sm font-medium text-gray-900 truncate">
                                {{ $page.props.auth.user.name }}
                            </span>
                            <span class="text-sm text-gray-500 truncate">
                                {{ $page.props.auth.user.email }}
                            </span>
                        </span>
                    </span>
                    <!-- Heroicon name: mini/chevron-up-down -->
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>

        <!--
          Dropdown menu, show/hide based on menu state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        <transition enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0">
            <div v-show="show"
                class="absolute left-0 right-0 z-10 mx-3 origin-top bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <Link :href="route('logout')" method="post" as="button"
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-5">Logout</Link>
                </div>
            </div>
        </transition>
    </div>
</template>