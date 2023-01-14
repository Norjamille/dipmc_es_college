<script setup>
import FormInput from '@/Components/FormInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    subject: Object,
})

let form = useForm({
    code: props.subject.code,
    descriptive_title: props.subject.descriptive_title,
    unit: props.subject.unit,
});

const submitHandler = () => {
    form.put(route('admin.subjects.update', props.subject.id))
}
</script>

<template>
    <AdminLayout title="Courses">
        <div class="grid gap-4">
            <h1 class="text-xl uppercase font-semibold text-gray-700">
                Edit Subject
            </h1>
            <div class="p-5 w-1/2 border bg-gray-100  rounded-lg">
                <form @submit.prevent="submitHandler" class="sm:grid sm:grid-cols-2  gap-4 ">
                    <div class="sm:col-span-2">
                        <FormInput v-model="form.code" :error="form.errors.code" type="text" label="Code" />
                    </div>
                    <div class="sm:col-span-2">
                        <FormInput v-model="form.descriptive_title" :error="form.errors.descriptive_title" type="text"
                            label="Descriptive Title" />
                    </div>
                    <div class="sm:col-span-2">
                        <FormInput v-model="form.unit" :error="form.errors.unit" type="number" label="NO. of unit" />
                    </div>
                    <div class="flex space-x-3">
                        <PrimaryButton :loading-on="form.processing" type="submit">
                            Submit
                        </PrimaryButton>
                        <SecondaryButtonLink :href="route('admin.subjects')">
                            Cancel
                        </SecondaryButtonLink>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>