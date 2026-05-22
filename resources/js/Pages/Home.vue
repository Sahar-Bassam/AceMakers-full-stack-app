<template>
  <div>
    <NavBar :selectedStyle="selectedStyle" />

    <div class="m-20 flex flex-col items-center justify-center gap-4">
      <TitleComponent :text="'Font Types'" :number="4" :styleProp="selectedStyle" />
      <div class="flex gap-4">
        <RadioButtons v-model="selectedStyle" :options="options" />
      </div>
    </div>
    <div>
      </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import TitleComponent from './Components/TitleComponent.vue'
import RadioButtons from './Components/RadioButtons.vue'
import NavBar from '../Layouts/NavBar.vue'

const options = ['Extra Bold', 'Bold', 'Medium', 'Light', 'Very Light']
const selectedStyle = ref('Bold')

</script>
