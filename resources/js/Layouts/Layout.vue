<template>
  <div>
    <main>
        <slot/>
    </main>
  </div>
</template>

<script>
 import {Link} from "@inertiajs/vue3"
export default{
    components:{
        Link,
    }
}
</script>

<style>

</style>