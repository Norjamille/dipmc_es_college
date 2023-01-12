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
import ViewSubjectOfferLink from '@/Components/ViewSubjectOfferLink.vue';
const props = defineProps({
    programs: Object,
    filters: Object
})

let search = ref(props.filters.search)

watch(search, debounce((searchQuery) => {
    Inertia.get(route('admin.programs'), { search: searchQuery }, {
        preserveScroll: true,
        preserveState: true,
        replace: true
    })
}, 500))
</script>

<template>
    <AdminLayout title="Programs">
        <div class="grid gap-4">
            <h1 class="text-xl uppercase font-semibold text-gray-700">
                Program List
            </h1>
            <div class="flex justify-between">
                <div class="flex">
                    <SearchInput v-model="search" />
                </div>
                <div class="flex">
                    <PrimaryButtonLink :href="route('admin.programs.create')">
                        <PlusIcon class="h-6 w-6 mr-2" />
                        Create Program
                    </PrimaryButtonLink>
                </div>
            </div>
            <Table>
                <template #header>
                    <Thead>Abbreviation</Thead>
                    <Thead>Name</Thead>
                    <Thead>Status</Thead>
                    <Thead>Action</Thead>
                </template>
                <template #body>
                    <Trow v-for="program in programs.data">
                        <Tdata>{{ program.abbreviation }}</Tdata>
                        <Tdata>{{ program.name }}</Tdata>
                        <Tdata>
                            <span :class="{
                                ' bg-green-100 text-green-800': program.active,
                                'bg-red-100 text-red-800': !program.active
                            }" class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium "
                                v-text="program.active ? 'Active' : 'Inactive'">

                            </span>
                        </Tdata>
                        <Tdata>
                            <div class="flex space-x-3 items-center">
                                <EditButton :href="route('admin.programs.edit', { program: program.id })" />
                                <span class="text-gray-300">
                                    |
                                </span>
                                <ViewSubjectOfferLink
                                    :href="route('admin.programs.subject.offers', { program: program.id })" />
                            </div>
                        </Tdata>
                    </Trow>
                    <Trow v-if="programs.data.length === 0">
                        <Tdata colspan="4" class=" text-center">
                            No record found
                        </Tdata>
                    </Trow>
                </template>
                <template #footer>
                    <Pagination :prev-url="programs.prev_page_url" :next-url="programs.next_page_url"
                        :from="programs.from" :to="programs.to" :total="programs.total" />
                </template>
            </Table>
        </div>
    </AdminLayout>
</template>