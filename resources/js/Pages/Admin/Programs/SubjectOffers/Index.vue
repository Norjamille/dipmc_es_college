<script setup>
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import Table from '@/Components/Table.vue';
import Tdata from '@/Components/Tdata.vue';
import Thead from '@/Components/Thead.vue';
import Trow from '@/Components/Trow.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { computed, onMounted, ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import EditButton from '@/Components/EditButton.vue';
import SelectInput from '@/Components/SelectInput.vue'
import { usePage } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FormSelect from '@/Components/FormSelect.vue'
import { XCircleIcon } from '@heroicons/vue/24/outline';
import SecondaryButton from '@/Components/SecondaryButton.vue';
const props = defineProps({
    program: Object,
    yearLevels: Object,
    filters: Object,
    subjects: Object
})

let yearLevelId = ref(props.filters.year_level_id);

watch(yearLevelId, (yearLevelIdValue) => {
    Inertia.get(usePage().url.value, { year_level_id: yearLevelIdValue }, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
        only: ['subjects', 'filters']
    })
})

const loadedUnit = computed(() => {
    return props.subjects.reduce((accumulator, currentSubject) => accumulator + currentSubject.unit, 0);
})

const reload = () => {
    Inertia.reload()
}

</script>
<template>
    <AdminLayout title="Programs">
        <div class="grid gap-4">
            <h1 class="text-xl font-semibold text-gray-700 uppercase">
                Program Subject Offer
            </h1>
            <div class="overflow-hidden bg-white border sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-bold leading-6 text-green-600 uppercase">
                        {{ props.program.name }}
                    </h3>
                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                        Subject Offers
                    </p>
                </div>
                <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="flex justify-between p-2" v-auto-animate>
                            <div class="flex space-x-3">
                                <SelectInput v-model="yearLevelId" class="font-bold text-green-700 ">
                                    <option value="" hidden>Select Level & Semester</option>
                                    <option value="">All</option>
                                    <template v-for="yearLevel in yearLevels" :key="yearLevel.id">
                                        <option :value="yearLevel.id">
                                            {{ yearLevel.name }} | {{ yearLevel.semester }}
                                        </option>
                                    </template>
                                </SelectInput>
                                <SecondaryButton @click="reload">
                                    Reload
                                </SecondaryButton>
                            </div>
                            <PrimaryButtonLink v-if="yearLevelId"
                                :href="route('admin.programs.subject.offers.create', { program: program.id, yearLevel: yearLevelId })">
                                Add Subject
                            </PrimaryButtonLink>
                        </div>
                        <div class="flex items-center p-2 space-x-3">
                            <div><span>TOTAL UNIT </span>: {{ loadedUnit }}</div>
                        </div>
                        <div class="p-2">
                            <Table>
                                <template #header>
                                    <Thead>Course Code</Thead>
                                    <Thead>Descriptive Title</Thead>
                                    <Thead>No. of Unit</Thead>
                                    <Thead>Semester</Thead>
                                </template>
                                <template #body>
                                    <Trow v-for="subject in subjects" :key="subject.id">
                                        <Tdata>{{ subject.code }}</Tdata>
                                        <Tdata>{{ subject.descriptive_title }}</Tdata>
                                        <Tdata>{{ subject.unit }}</Tdata>
                                        <Tdata>{{ subject.year_level }} | {{ subject.semester }}</Tdata>
                                    </Trow>
                                    <Trow v-if="subjects.length === 0">
                                        <Tdata colspan="3" class="text-center ">
                                            No record found
                                        </Tdata>
                                    </Trow>
                                </template>
                            </Table>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>