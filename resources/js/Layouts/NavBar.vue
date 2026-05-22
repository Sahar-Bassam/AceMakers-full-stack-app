<template>
  <div>
    <header
      class="h-20 px-8 bg-gradient-to-r from-[#2e3b00] to-[#8caa13] text-white 
             flex items-center justify-between">

      <div class="flex items-center space-x-2">
        <img src="/public/logo.png" class="h-12 w-12" />
        <h1 class="text-[22px] font-bold drop-shadow-lg">AceMakers</h1>
      </div>

      <nav class="flex space-x-8">
        <Link :href="route('Home')" class="hover:underline">Home</Link>
        <Link href="/con" class="hover:underline">About</Link>
        <Link href="/con" class="hover:underline">Contact</Link>
        <Link href="/con" class="hover:underline">FAQs</Link>
           <p class="pl-20"> {{selectedStyle}}</p>
      </nav>
   

      <div v-if="$page.props.auth.user" class="flex items-center space-x-3">
        <img
          :src="
            $page.props.auth.user.avatar
              ? '/storage/' + $page.props.auth.user.avatar
              : '/storage/avatars/default.jpg'
          "
          class="h-10 w-10 rounded-full object-cover"
        />
              <div class="relative">
        <img
          src="/public/bell.png"
          class="h-5 w-5 cursor-pointer"
        />
        </div>
        <Link :href="route('dashboard')" class="hover:underline">
          Dashboard
        </Link>

        <Link
          type="button"
          as="button"
          method="post"
          :href="route('logout')"
          class="hover:underline"
        >
          Logout
        </Link>
      </div>

      <div v-else class="space-x-3">
        <Link :href="route('register')" class="hover:underline">Register</Link>
        <Link :href="route('login')" class="hover:underline">Login</Link>
      </div>
    </header>
  </div>
</template>

<script setup>
const props = defineProps({
  selectedStyle:String,
})
</script>
