<script setup>
import { ref } from "vue";
import NavBar from '../Layouts/NavBar.vue';
defineProps({
  users: Object,
});

const getDate=(date)=>
new Date(date).toLocaleDateString("en-us" ,{
  year:"numeric",
  month:"long" , 
  day:"numeric",
});
</script>

<template>
  <div >
    <navBar />
    <Head :title="` | ${$page.component}`" />

    <div class="overflow-x-auto">
<table class="min-w-[900px] mx-auto divide-y divide-gray-200 border border-gray-200 rounded-lg">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Avatar</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Registration Date</th>
          </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-50">
            <td class="px-6 py-4">
              <img 
                :src="user.avatar ? ('/storage/' + user.avatar) : '/storage/avatars/default.jpg'" 
                class="h-10 w-10 rounded-full object-cover" 
                alt="Avatar"
              />
            </td>
            <td class="px-6 py-4 text-sm text-gray-800">{{ user.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-800">{{ user.email }}</td>
            <td class="px-6 py-4 text-sm text-gray-800">{{ getDate(user.created_at) }}</td>
          </tr>
        </tbody>
      </table>
    </div>

<div class="pt-8 ml-80">
  <Link
    v-for="link in users.links"
    :key="link.label"
    v-html="link.label"
    :href="link.url ?? '#'"
    class="p-1 mx-1"
  :class="{ 
  'text-black': !link.url, 
  'text-brandGreen font-medium': link.active 
}"> </Link>
</div>



  </div>
</template>
