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
          class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 cursor-pointer transform transition-all duration-700 ease-in-out"
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
          class="bg-white rounded-xl shadow-md overflow-hidden transform transation duration-700 ease-out hover:-translate-y-2 hover:shadow-xl"
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
            <!-- Waktu Buka / Tutup -->
            <div
              class="flex py-2 justify-center items-center text-emerald-500 gap-1 text-sm"
            >
              <ClockIcon class="h-4 w-4" />
              <span>{{ court.open_time }} - {{ court.close_time }}</span>
            </div>
            <div class="space-y-2">
              <div class="flex justify-between text-sm text-gray-700">
                <!-- Field + No Telp -->
                <div class="flex flex-col gap-1">
                  <div class="flex items-center gap-1">
                    <span class="text-gray-500">🏟️</span>
                    <span class="font-medium text-gray-900">
                      {{ court.field_count }}
                    </span>
                  </div>
                  <div class="flex items-center gap-1">
                    <span class="text-gray-500">📞</span>
                    <span class="text-gray-900">
                      {{ court.contact_whatsapp }}
                    </span>
                  </div>
                </div>

                <!-- Maps + Rating -->
                <div class="flex flex-col items-end gap-1">
                  <div class="flex items-center gap-1">
                    <span class="text-gray-500">📍</span>
                    <a
                      :href="court.maps_url"
                      target="_blank"
                      rel="noopener"
                      class="text-emerald-600 hover:underline"
                    >
                      View
                    </a>
                  </div>
                  <div class="flex items-center gap-1">
                    <span class="text-gray-500">⭐</span>
                    <span class="text-gray-900">
                      {{ court.rating }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <p class="mt-1 text-sm text-gray-600">
              {{ court.district ? court.district + ", " : "" }}{{ court.city }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Three card (Recommended Platform) -->
    <section class="mt-6" :class="{ 'animate-pulse': isLoading }">
      <!-- Title + Animated Line -->
      <div class="text-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-900">
          Why Book with BadminKuy?
        </h2>

        <!-- Garis animasi -->
        <div class="mt-2 flex justify-center">
          <span
            class="inline-block h-1 w-24 rounded-full bg-linear-to-r from-emerald-400 via-emerald-500 to-emerald-600 animate-pulse"
          ></span>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Card 1 -->
        <div
          class="bg-white rounded-xl shadow-md overflow-hidden px-6 py-8 flex flex-col items-center text-center transform transition duration-500 hover:-translate-y-1 hover:shadow-lg w-full max-w-xs mx-auto"
        >
          <div
            class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100"
          >
            <DevicePhoneMobileIcon class="h-7 w-7 text-emerald-600" />
          </div>
          <h1 class="text-lg font-semibold text-gray-900 mb-1">
            Platform Online
          </h1>
          <span class="text-sm text-gray-500">
            Badminton court reservations can be made via the website or online.
          </span>
        </div>
        <!-- Card 2 -->
        <div
          class="bg-white rounded-xl shadow-md overflow-hidden px-6 py-8 flex flex-col items-center text-center transform transition duration-500 hover:-translate-y-1 hover:shadow-lg w-full max-w-xs mx-auto"
        >
          <div
            class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100"
          >
            <BuildingOfficeIcon class="h-7 w-7 text-emerald-600" />
          </div>
          <h1 class="text-lg font-semibold text-gray-900 mb-1">
            Recomemended Field
          </h1>
          <span class="text-sm text-gray-500">
            Makes it easy to find badminton courts in the Bekasi area.
          </span>
        </div>
        <!-- Card 3 -->
        <div
          class="bg-white rounded-xl shadow-md overflow-hidden px-6 py-8 flex flex-col items-center text-center transform transition duration-500 hover:-translate-y-1 hover:shadow-lg w-full max-w-xs mx-auto"
        >
          <div
            class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100"
          >
            <CreditCardIcon class="h-7 w-7 text-emerald-600" />
          </div>
          <h1 class="text-lg font-semibold text-gray-900 mb-1">
            Online Payment
          </h1>
          <span class="text-sm text-gray-500">
            Providing online payments for customer security and convenience.
          </span>
        </div>
      </div>
    </section>

    <!-- About Us -->
    <section
      class="max-w-6xl mx-auto py-12 px-4"
      :class="{ 'animate-pulse': isLoading }"
    >
      <div class="grid gap-10 md:grid-cols-2 items-center">
        <div class="justify-self-center">
          <div class="relative inline-block">
            <div
              class="inline-block bg-emerald-700 rounded-t-[3rem] rounded-b-none p-2 pb-4"
            >
              <div
                class="bg-white rounded-t-[2.5rem] rounded-b-none overflow-hidden"
              >
                <img
                  src="https://images.pexels.com/photos/5739196/pexels-photo-5739196.jpeg"
                  alt="Badminton"
                  class="w-64 h-80 object-cover"
                />
              </div>
            </div>

            <span class="absolute -top-4 right-1 text-emerald-700 text-2xl">
              ✺
            </span>
            <span class="absolute bottom-0 -left-5 text-emerald-700 text-2xl">
              ✺
            </span>
          </div>
        </div>
        <div>
          <h2 class="text-3xl font-semibold mb-4">About Us</h2>
          <p class="text-gray-600 leading-relaxed mb-3">
            BadminKuy is a badminton court booking platform that makes it easy
            for you to search, compare, and book your favorite courts online.
          </p>
          <p class="text-gray-600 leading-relaxed">
            We work with various sports centers and badminton halls to provide a
            comfortable, convenient, and transparent playing experience for all
            players, from beginners to athletes.
          </p>
        </div>
      </div>
    </section>

    <!-- Athletes -->
    <section
      class="max-w-6xl mx-auto py-12 px-4"
      :class="{ 'animate-pulse': isLoading }"
    >
      <h2 class="text-2xl font-semibold text-gray-900 text-center">
        Featured Athletes
      </h2>
      <p class="mt-2 text-sm text-gray-500 text-center">
        Kenalan sama atlet-atlet yang sering main di BadminKuy.
      </p>

      <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-4">
        <!-- Atlet 1 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/kevin-sanjaya.webp"
            alt="Kevin Sanjaya"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">Kevin Sanjaya</h3>
          <p class="mt-1 text-sm text-gray-500">Men’s Doubles</p>
        </div>

        <!-- Atlet 2 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/marcus.webp"
            alt="Marcus Gideon"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">Marcus Gideon</h3>
          <p class="mt-1 text-sm text-gray-500">Men’s Doubles</p>
        </div>

        <!-- Atlet 3 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/ahsan.webp"
            alt="Mohammad Ahsan"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">Mohammad Ahsan</h3>
          <p class="mt-1 text-sm text-gray-500">Men’s Doubles</p>
        </div>

        <!-- Atlet 4 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/hendra.webp"
            alt="Hendra Setiawan"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">Hendra Setiawan</h3>
          <p class="mt-1 text-sm text-gray-500">Men’s Doubles</p>
        </div>

        <!-- Atlet 5 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/greysia-poli.webp"
            alt="Greysia Polii"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">Greysia Polii</h3>
          <p class="mt-1 text-sm text-gray-500">Women’s Doubles</p>
        </div>

        <!-- Atlet 6 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/georgia.webp"
            alt="Gregoria Mariska Tunjung"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">
            Gregoria Mariska Tunjung
          </h3>
          <p class="mt-1 text-sm text-gray-500">Women’s Singles</p>
        </div>

        <!-- Atlet 7 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/fajar.webp"
            alt="Fajar Alfian"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">Fajar Alfian</h3>
          <p class="mt-1 text-sm text-gray-500">Men’s Doubles</p>
        </div>

        <!-- Atlet 8 -->
        <div class="flex flex-col items-center text-center">
          <img
            src="../../assets/athlets/fikri.webp"
            alt="Muhammad Rian Ardianto"
            class="h-40 w-40 object-cover rounded-xl mb-3 transition-transform duration-300 ease-out hover:scale-110 hover:-translate-y-1"
          />
          <h3 class="text-lg font-semibold text-gray-900">
            Muhammad Rian Ardianto
          </h3>
          <p class="mt-1 text-sm text-gray-500">Men’s Doubles</p>
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
import { DevicePhoneMobileIcon } from "@heroicons/vue/24/outline";
import { BuildingOfficeIcon } from "@heroicons/vue/24/outline";
import { CreditCardIcon } from "@heroicons/vue/24/outline";
import { ClockIcon } from "@heroicons/vue/24/outline";

const courts = ref([]);
const isLoading = ref(true);
const error = ref(null);

// Simulasi loading
onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 2000);
});

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
