<template>
  <component :is="tagName" :class="computedClass">
    {{ text }}
  </component>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  text: String,
  
  number: { 
    type: Number,
     default: 1 },
  
  styleProp: { 
    type: String,
     default: 'Bold' } 
     
})


const computedClass = computed(() => {
  const map = {
    'Extra Bold':'font-bold text-4xl text-[#586233]',
    'Bold': ' font-bold text-4xl  text-[#8CAA13]',
    'Medium': 'font-bold text-4xl  text-[#A3BB42]',
    'Light': 'font-bold text-4xl  text-[#BACC71]',
    'Very Light': 'font-bold text-4xl text-[#D1DDA1]',
  }
  return map[props.styleProp] || 'font-bold'
})


const tagName = computed(() => {
  const n = props.number
  return n >= 1 && n <= 6 ? `h${n}` : 'h1'
})
</script>
