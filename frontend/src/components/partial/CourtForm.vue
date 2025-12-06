<template>
  <div class="w-full sm:w-auto flex sm:justify-end">
    <button
      type="button"
      class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-4 sm:px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 whitespace-nowrap"
    >
      <PlusCircleIcon class="h-4 w-4" />
      <span>Tambah data</span>
    </button>
  </div>
</template>

<script setup>
import { PlusCircleIcon } from "@heroicons/vue/24/outline";
</script>
