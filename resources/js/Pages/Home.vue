<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
  <div class="h-screen flex items-center justify-center gap-2">
    <Link
      href="counter"
      type="button"
      class="p-3 text-blue-900 bg-blue-500 rounded-xl"
    >
      Counter
    </Link>
  </div>
</template>
