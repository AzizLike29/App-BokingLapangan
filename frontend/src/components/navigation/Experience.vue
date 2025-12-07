<template>
  <div>
    <section class="max-w-6-xl mx-auto py-12 px-4">
      <div
        class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
      >
        <!-- Left Partial -->
        <SearchButton />

        <!-- Right Partial -->
        <CourtForm />
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

      <!-- Pagination -->
      <div
        v-if="!isLoading && !error && totalPages > 1"
        class="mt-6 flex justify-center gap-3"
      >
        <button
          v-for="page in totalPages"
          :key="page"
          @click="currentPage = page"
          class="h-9 w-9 flex items-center justify-center rounded-md text-sm font-semibold transition"
          :class="
            page === currentPage
              ? 'bg-red-500 text-white'
              : 'text-red-500 hover:bg-red-50'
          "
        >
          {{ page }}
        </button>
      </div>

      <!-- FAQ / Pertanyaan -->
      <div class="mt-10 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-900">FAQ</h2>

        <div class="mt-6 border-t border-gray-200">
          <div
            v-for="(item, index) in faqs"
            :key="item.question"
            class="border-b border-gray-200"
          >
            <button
              type="button"
              @click="toggleFaq(index)"
              class="flex w-full items-center justify-between py-6 text-left"
            >
              <span class="text-base sm:text-lg font-semibold text-gray-900">
                {{ item.question }}
              </span>
              <span class="text-2xl font-bold text-gray-900">
                {{ openFaq === index ? "−" : "+" }}
              </span>
            </button>

            <div
              v-if="openFaq === index"
              class="pb-6 pr-8 text-sm text-gray-600"
            >
              {{ item.answer }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import api from "../../api";
import SearchButton from "../partial/SearchButton.vue";
import CourtForm from "../partial/CourtForm.vue";
import defaultImage from "../../assets/img/example-image.jpg";
import { ClockIcon } from "@heroicons/vue/24/outline";

// Initial
const courts = ref([]);
const isLoading = ref(true);
const error = ref(null);

// Simulasi loading
onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 1000);
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

// Pagination
const perPage = 8;
const currentPage = ref(1);

const totalPages = computed(() => {
  if (!courts.value.length) return 1;
  return Math.ceil(courts.value.length / perPage);
});

const paginatedCourts = computed(() => {
  const start = (currentPage.value - 1) * perPage;
  const end = start + perPage;
  return courts.value.slice(start, end);
});

const faqs = ref([
  {
    question: "Apa kelebihan sewa lapangan di BadminKuy?",
    answer:
      "Kamu bisa melihat daftar lapangan lengkap dengan jam buka, rating, lokasi, dan kontak pengelola dalam satu platform.",
  },
  {
    question: "Bagaimana cara memesan lapangan di BadminKuy?",
    answer:
      "Pilih lapangan, cek jam yang tersedia, lalu ikuti instruksi pemesanan di detail lapangan. Beberapa lapangan bisa dipesan langsung, sebagian lewat WhatsApp.",
  },
  {
    question: "Berapa biaya sewa lapangan di BadminKuy?",
    answer:
      "Biaya sewa ditentukan oleh masing-masing pengelola lapangan dan bisa kamu lihat di halaman detail lapangan.",
  },
  {
    question: "Apakah bisa membatalkan atau mengubah jadwal booking?",
    answer:
      "Kebijakan pembatalan mengikuti aturan masing-masing lapangan. Hubungi pengelola melalui WhatsApp yang tertera jika ingin mengubah jadwal.",
  },
]);

const openFaq = ref(null);

const toggleFaq = (index) => {
  openFaq.value = openFaq.value === index ? null : index;
};
</script>
