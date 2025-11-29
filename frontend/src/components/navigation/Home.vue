<template>
  <div>
    <!-- Video -->
    <section class="relative w-full h-[400px] overflow-hidden">
      <video autoplay muted loop playsinline class="w-full h-full object-cover">
        <source :src="videoBadmin" type="video/mp4" />
      </video>
    </section>

    <section class="max-w-6xl mx-auto py-12 px-4">
      <!-- Header -->
      <div class="flex h-18 items-center justify-between">
        <h1 class="text-2xl font-bold font-cairo">Featured Venues For You</h1>
        <button
          type="button"
          class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
        >
          <svg
            class="h-4 w-4"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <circle cx="11" cy="11" r="7" />
            <line x1="16.65" y1="16.65" x2="21" y2="21" />
          </svg>
          <span>Discover All Experiences</span>
        </button>
      </div>

      <!-- Grid Card -->
      <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Loading State -->
        <div v-if="isLoading" class="col-span-full flex justify-center py-6">
          <div
            class="flex items-center gap-3 text-gray-500 text-sm animate-pulse"
          >
            <span
              class="inline-flex h-5 w-5 items-center justify-center rounded-full border-2 border-emerald-500 border-t-transparent animate-spin"
            ></span>
            <span>Memuat data lapangan...</span>
          </div>
        </div>

        <!-- Error state -->
        <div
          v-else-if="error"
          class="col-span-full text-center text-red-500 text-sm py-6"
        >
          {{ error }}
        </div>

        <!-- Data -->
        <div
          v-else
          v-for="court in courts"
          :key="court.id"
          class="bg-white rounded-xl shadow-md overflow-hidden"
        >
          <img
            :src="court.image_url || defaultImage"
            :alt="court.name"
            class="h-40 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-base font-semibold">
              {{ court.name }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
              {{ court.district ? court.district + ", " : "" }}{{ court.city }}
            </p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import api from "../../api";
import defaultImage from "../../assets/img/example-image.jpg";
import videoBadmin from "../../assets/video-badmin.mp4";

const courts = ref([]);
const isLoading = ref(true);
const error = ref(null);

onMounted(async () => {
  try {
    // Ambil data dari API
    const res = await api.get("/courts", {
      params: { city: "Bekasi" },
    });

    // Value respons
    courts.value = res.data.data || [];

    // Validation apabila data kosong
    if (!courts.value.length) {
      error.value = "Tidak ada data lapangan yang tersedia";
    }
  } catch (e) {
    // Cegah error
    console.error(e);
    error.value = "Gagal memuat data lapangan";
  } finally {
    isLoading.value = false;
  }
});
</script>
