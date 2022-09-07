<script setup>
const props = defineProps({
    label: String,
    placeholder: {
        type: String,
        default: null
    },
    modelValue: {
        type: String
    },
    type: String,
    error: {
        type: [Object, String],
        default: null
    },
    id: String
})
defineEmits(['update:modelValue'])
</script>
<template>
    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2"> {{ props.label }} </label>
        <input :class="{ 'border-red-400': error }" :placeholder="placeholder" :autocomplete="props.id" :name="props.id"
            :type="props.type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value) "
            class="border border-gray-200 rounded p-2 w-full" />

        <p v-if="error" class="text-sm text-red-500">{{ props.error }}</p>
    </div>
</template>