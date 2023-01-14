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
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({
    program: Object,
    yearLevel: Object,
    formatedSemester: String,
    subjects: Object
})

let form = useForm({
    subjectIds: [],
    programId: props.program.id,
    yearLevelId: props.yearLevel.id
})

const store = () => {
    form.post(route('admin.programs.subject.offers.store'))
}

</script>
<template>
    <AdminLayout title="Programs">
        <div class="grid gap-4" v-auto-animate>
            <h1 class="text-xl font-semibold text-gray-700 uppercase">
                Add new subject
            </h1>
            <div class="overflow-hidden bg-white border sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-bold leading-6 text-green-600 uppercase">
                        {{ props.program.name }}
                    </h3>
                    <p class="max-w-2xl mt-1 font-semibold text-gray-700">
                        {{ props.yearLevel.name }} | {{ props.formatedSemester }}
                    </p>
                </div>
            </div>
            <div class="flex justify-end">
                <PrimaryButton @click="store" :disabled="form.subjectIds.length === 0" :loading-on="form.processing"
                    v-text="form.subjectIds.length === 0 ? 'Please Select Subject' : 'Save'">
                </PrimaryButton>
            </div>
            <Table>
                <template #header>
                    <Thead>Select ( {{ form.subjectIds.length }} )</Thead>
                    <Thead>Code</Thead>
                    <Thead>Descriptive Title</Thead>
                    <Thead>No. of Unit</Thead>
                </template>
                <template #body>
                    <template v-for="subject in subjects" :key="subject.id">
                        <Trow :class="{
                            'bg-green-100': form.subjectIds.includes(subject.id)
                        }">
                            <Tdata>
                                <input v-model="form.subjectIds" :value="subject.id" :key="subject.id" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                            </Tdata>
                            <Tdata>{{ subject.code }}</Tdata>
                            <Tdata>{{ subject.descriptive_title }}</Tdata>
                            <Tdata>{{ subject.unit }}</Tdata>
                        </Trow>
                    </template>
                    <Trow v-if="subjects.length === 0">
                        <Tdata colspan="3" class="text-center ">
                            No record found
                        </Tdata>
                    </Trow>
                </template>
            </Table>
        </div>
    </AdminLayout>
</template>