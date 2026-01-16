<template>
  <div class="w-full">
    <div
      class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-start"
    >
      <!-- Column Nama Lapangan -->
      <div class="w-full sm:w-48">
        <input
          v-model.trim="name"
          type="text"
          placeholder="Cari nama Lapangan"
          @keyup.enter="onSearch"
          class="block w-full rounded-full border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 placeholder:text-gray-400 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500"
        />
      </div>

      <!-- Column Kota/Daerah -->
      <div class="w-full sm:w-48">
        <input
          v-model.trim="city"
          type="text"
          placeholder="Pilih kota / daerah"
          @keyup.enter="onSearch"
          class="block w-full rounded-full border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 placeholder:text-gray-400 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500"
        />
      </div>

      <div class="w-full sm:w-auto">
        <button
          type="button"
          @click="onSearch"
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
import { ref, watch } from "vue";
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";

const emit = defineEmits(["search", "reset"]);

const name = ref("");
const city = ref("");
const hasSearched = ref(false);

const onSearch = () => {
  hasSearched.value = true;
  emit("search", {
    name: name.value.trim(),
    city: city.value.trim(),
  });
};

// User hapus salah satu kata kembali semula
watch([name, city], ([n, c]) => {
  if (!hasSearched.value) return;
  emit("reset"); // Reset list ke default
  hasSearched.value = false; // Reset sekali sampai user search lagi
});
</script>
