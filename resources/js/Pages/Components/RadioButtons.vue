<template>
  <div class="flex gap-4">
    <label v-for="option in options" :key="option" class="cursor-pointer">
      <input
        type="radio"
        :value="option"
        :checked="option === modelValue"
        @change="$emit('update:modelValue', option)"
        class="mr-2"/>
      {{ option }}
    </label>
  </div>
</template>

<script setup>
const props = defineProps({
  options: { 
    type: Array,
    required: true
     },

  modelValue: { 
    type: String,
    default: ''
     } 
})
</script>
