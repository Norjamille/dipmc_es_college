<script setup>
import { ref } from 'vue'

let show = ref(false);
</script>

<template>
    <div @mouseenter="show = true" @mouseleave="show = false" class="relative inline-block px-3 text-left">
        <div>
            <button type="button"
                class="group w-full rounded-md bg-gray-100 px-3.5 py-2 text-left text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none"
                id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="flex w-full items-center justify-between">
                    <span class="flex min-w-0 items-center justify-between space-x-3">
                        <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                            src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            alt="">
                        <span class="flex min-w-0 flex-1 flex-col">
                            <span class="truncate text-sm font-medium text-gray-900">
                                {{ $page.props.auth.user.name }}
                            </span>
                            <span class="truncate text-sm text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </span>
                        </span>
                    </span>
                    <!-- Heroicon name: mini/chevron-up-down -->
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
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
        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div v-show="show"
                class="absolute right-0 left-0 z-10 mx-3  origin-top divide-y divide-gray-200 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-0">View profile</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-1">Settings</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-2">Notifications</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-3">Get desktop app</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-4">Support</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-5">Logout</a>
                </div>
            </div>
        </transition>
    </div>
</template>