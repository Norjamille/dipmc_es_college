<script setup>
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import Table from '@/Components/Table.vue';
import Tdata from '@/Components/Tdata.vue';
import Thead from '@/Components/Thead.vue';
import Trow from '@/Components/Trow.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue'
import SearchInput from '@/Components/SearchInput.vue'
import { PlusIcon } from '@heroicons/vue/24/outline';
import Pagination from '@/Components/Pagination.vue';
import { debounce } from 'lodash'
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import EditButton from '@/Components/EditButton.vue';
const props = defineProps({
    courses: Object,
    filters: Object
})

let search = ref(props.filters.search)

watch(search, debounce((searchQuery) => {
    Inertia.get(route('admin.courses'), { search: searchQuery }, {
        preserveScroll: true,
        preserveState: true,
        replace: true
    })
}, 500))
</script>

<template>
    <AdminLayout title="Courses">
        <div class="grid gap-4">
            <h1 class="text-xl uppercase font-semibold text-gray-700">
                Courses List
            </h1>
            <div class="flex justify-between">
                <div class="flex">
                    <SearchInput v-model="search" />
                </div>
                <div class="flex">
                    <PrimaryButtonLink :href="route('admin.courses.create')">
                        <PlusIcon class="h-6 w-6 mr-2" />
                        Create Course
                    </PrimaryButtonLink>
                </div>
            </div>
            <Table>
                <template #header>
                    <Thead>Code</Thead>
                    <Thead>Descriptive Title</Thead>
                    <Thead>No. of Unit</Thead>
                    <Thead>Action</Thead>
                </template>
                <template #body>
                    <Trow v-for="course in courses.data" :key="course.id">
                        <Tdata>{{ course.code }}</Tdata>
                        <Tdata>{{ course.descriptive_title }}</Tdata>
                        <Tdata>{{ course.unit }}</Tdata>
                        <Tdata>
                            <EditButton :href="route('admin.courses.edit', { course: course.id })" />
                        </Tdata>
                    </Trow>
                    <Trow v-if="courses.data.length === 0">
                        <Tdata colspan="3" class=" text-center">
                            No record found
                        </Tdata>
                    </Trow>
                </template>
                <template #footer>
                    <Pagination :prev-url="courses.prev_page_url" :next-url="courses.next_page_url" :from="courses.from"
                        :to="courses.to" :total="courses.total" />
                </template>
            </Table>
        </div>
    </AdminLayout>
</template>