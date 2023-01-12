<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'type', 'label', 'error']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

</script>

<template>
    <div>
        <label v-if="label" class="text-gray-700">
            {{ label }}
        </label>
        <div class="mt-1">
            <select class="border-gray-300 w-full focus:border-gray-300 focus:ring-0  rounded-md shadow-sm"
                :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">

            </select>
        </div>
        <span v-if="error" class="text-red-500 mt-1">
            {{ error }}
        </span>
    </div>
</template>
