<script setup>
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import Table from '@/Components/Table.vue';
import Tdata from '@/Components/Tdata.vue';
import Thead from '@/Components/Thead.vue';
import Trow from '@/Components/Trow.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { onMounted, ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import EditButton from '@/Components/EditButton.vue';
import SelectInput from '@/Components/SelectInput.vue'
import { usePage } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FormSelect from '@/Components/FormSelect.vue'
import { XCircleIcon } from '@heroicons/vue/24/outline';
const props = defineProps({
    program: Object,
    yearLevels: Object,
    courses: Object,
    filters: Object,
    offers: Object
})

let showCreateSubjectOfferModal = ref(false)

let yearLevelId = ref(props.filters.year_level_id);

let courseCode = ref(props.filters.course_code);


watch(yearLevelId, (yearLevelIdValue) => {
    Inertia.get(usePage().url.value, { year_level_id: yearLevelIdValue }, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
        only: ['offers', 'filters']
    })
})

watch(courseCode, (courseCodeValue) => {
    Inertia.get(usePage().url.value, { course_code: courseCodeValue }, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
        only: ['courses', 'filters']
    })
})

const showCreateSubjectOfferModalHanler = () => {
    showCreateSubjectOfferModal.value = true
}

</script>
<template>
    <AdminLayout title="Programs">
        <div class="grid gap-4">
            <h1 class="text-xl uppercase font-semibold text-gray-700">
                Program Subject Offer
            </h1>
            <div class="overflow-hidden bg-white border sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-bold leading-6 uppercase  text-green-600">
                        {{ props.program.name }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Course Subject Offers
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="p-2 flex justify-between">
                            <SelectInput v-model="yearLevelId" class="font-bold text-green-700 ">
                                <option value="" hidden>Select Level & Semester</option>
                                <template v-for="(yearLevel, key) in yearLevels" :key="key">
                                    <option :value="yearLevel.id">
                                        {{ yearLevel.name }} | {{ yearLevel.semester }}
                                    </option>
                                </template>
                            </SelectInput>
                            <PrimaryButton @click="showCreateSubjectOfferModalHanler">
                                Add Course
                            </PrimaryButton>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!--  -->
        <div v-show="showCreateSubjectOfferModal" class="relative z-10" role="dialog" aria-modal="true">

            <transition enter-active-class="ease-out duration-300" enter-from-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="ease-in duration-200" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <div v-show="showCreateSubjectOfferModal"
                    class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>
            </transition>

            <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20">

                <transition enter-active-class="ease-out duration-300" enter-from-class="opacity-0 scale-95"
                    enter-to-class="opacity-100 scale-100" leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
                    <div v-show="showCreateSubjectOfferModal"
                        class="mx-auto max-w-2xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
                        <div class="flex items-center  w-full">
                            <div class="relative w-full">
                                <!-- Heroicon name: mini/magnifying-glass -->
                                <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input type="text" v-model="courseCode"
                                    class="h-12 w-full  border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm"
                                    placeholder="Search..." role="combobox" aria-expanded="false"
                                    aria-controls="options">

                            </div>
                            <button class="mr-4" @click="showCreateSubjectOfferModal = false">
                                <XCircleIcon class="pointer-events-none top-3.5 right-4 h-5 w-5 text-red-500" />
                            </button>
                        </div>
                        <template v-if="props.courses">
                            <ul class="max-h-72 scroll-py-2 overflow-y-auto py-2 text-sm text-gray-800" id="options"
                                role="listbox">
                                <li v-for="course in props.courses" :key="course.id"
                                    class="cursor-default group hover:bg-green-500 hover:text-white flex justify-between select-none px-4 py-2"
                                    id="option-1" role="option" tabindex="-1">
                                    <div class="font-semibold  flex space-x-2">
                                        <span class=" text-green-500 group-hover:text-white">{{
                                            course.code
                                        }}</span>
                                        <span class="col-span-4">- {{ course.descriptive_title }}</span>
                                    </div>
                                    <button
                                        class="text-green-500 duration-150 ease-in-out group-hover:text-white group-hover:underline  font-semibold">
                                        SELECT
                                    </button>
                                </li>
                                <li v-if="props.courses.length === 0"
                                    class="cursor-default group  flex justify-center select-none px-4 py-2"
                                    id="option-1" role="option" tabindex="-1">
                                    <div class="font-semibold text-gray-400">
                                        No record found
                                    </div>
                                </li>
                            </ul>
                        </template>
                    </div>
                </transition>
            </div>
        </div>

    </AdminLayout>
</template>