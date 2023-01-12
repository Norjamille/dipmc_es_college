<script setup>
import FormInput from '@/Components/FormInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    abbreviation: '',
    name: '',
});

const submitHandler = () => {
    form.post(route('admin.programs.store'))
}
</script>

<template>
    <AdminLayout title="Programs">
        <div class="grid gap-4">
            <h1 class="text-xl uppercase font-semibold text-gray-700">
                Create Program
            </h1>
            <div class="p-5 w-1/2 border bg-gray-100  rounded-lg">
                <form @submit.prevent="submitHandler" class="sm:grid sm:grid-cols-2  gap-4 ">
                    <div class="sm:col-span-2">
                        <FormInput v-model="form.abbreviation" :error="form.errors.abbreviation" type="text"
                            label="Abbreviation" />
                    </div>
                    <div class="sm:col-span-2">
                        <FormInput v-model="form.name" :error="form.errors.name" type="text" label="Name" />
                    </div>
                    <div class="flex space-x-3">
                        <PrimaryButton :loading-on="form.processing" type="submit">
                            Submit
                        </PrimaryButton>
                        <SecondaryButtonLink :href="route('admin.programs')">
                            Cancel
                        </SecondaryButtonLink>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>