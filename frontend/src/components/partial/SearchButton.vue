<template>
  <div class="w-full">
    <div
      class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-start"
    >
      <!-- Column Nama Lapangan -->
      <div class="w-full sm:w-48">
        <input
          type="text"
          placeholder="Cari nama Lapangan"
          class="block w-full rounded-full border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 placeholder:text-gray-400 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500"
        />
      </div>

      <!-- Column Kota/Daerah -->
      <div class="w-full sm:w-48">
        <input
          type="text"
          placeholder="Pilih kota / daerah"
          class="block w-full rounded-full border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 placeholder:text-gray-400 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500"
        />
      </div>

      <div class="w-full sm:w-auto">
        <button
          type="button"
          class="inline-flex gap-2 w-full sm:w-auto items-center justify-center rounded-full bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
        >
          <MagnifyingGlassIcon class="h-4 w-4" />
          <span>Search</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
</script>
