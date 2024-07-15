<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const counter = ref(0);
</script>

<template>
  <div class="h-screen flex items-center justify-center gap-2">
    <Link
      href="/"
      type="button"
      class="p-3 text-blue-900 bg-blue-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-home"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
      </svg>
    </Link>
    <button
      type="button"
      @click="counter--"
      class="p-3 text-green-900 bg-lime-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-left"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M20 15h-8v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h8a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1z"
        />
      </svg>
    </button>
    <span class="px-7 py-3 text-gray-700 bg-gray-200 rounded-xl">
      {{ counter }}
    </span>
    <button
      type="button"
      @click="counter++"
      class="p-3 text-green-900 bg-lime-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-right"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M4 9h8v-3.586a1 1 0 0 1 1.707 -.707l6.586 6.586a1 1 0 0 1 0 1.414l-6.586 6.586a1 1 0 0 1 -1.707 -.707v-3.586h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1z"
        />
      </svg>
    </button>
    <button
      type="button"
      @click="counter = 0"
      class="p-3 text-red-900 bg-red-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-rotate-2"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M15 4.55a8 8 0 0 0 -6 14.9m0 -4.45v5h-5" />
        <path d="M18.37 7.16l0 .01" />
        <path d="M13 19.94l0 .01" />
        <path d="M16.84 18.37l0 .01" />
        <path d="M19.37 15.1l0 .01" />
        <path d="M19.94 11l0 .01" />
      </svg>
    </button>
  </div>
</template>