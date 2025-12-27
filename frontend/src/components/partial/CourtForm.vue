<template>
  <div>
    <div class="w-full sm:w-auto flex sm:justify-end">
      <button
        type="button"
        class="cursor-pointer inline-flex items-center gap-2 rounded-full bg-emerald-600 px-4 sm:px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 whitespace-nowrap"
        @click="isOpen = true"
      >
        <PlusCircleIcon class="h-4 w-4" />
        <span>Tambah data</span>
      </button>
    </div>

    <!-- Show Modal Form -->
    <div
      v-if="isOpen"
      class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-50"
      @click.self="isOpen = false"
    >
      <div
        class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto"
      >
        <!-- Header -->
        <div
          class="bg-linear-to-r from-emerald-600 to-emerald-700 p-6 rounded-t-2xl"
        >
          <h2 class="text-2xl font-bold text-white">Form Lapangan Badminton</h2>
          <p class="text-emerald-100 text-sm mt-1">
            Lengkapi informasi lapangan badminton Anda
          </p>
        </div>

        <form @submit.prevent="handleSubmitCourtForm" class="p-6">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-2">
                Foto Lapangan
              </label>
              <div class="relative">
                <div
                  class="border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-emerald-500 transition-colors cursor-pointer"
                >
                  <div
                    class="aspect-square bg-gray-50 rounded-lg flex items-center justify-center overflow-hidden"
                  >
                    <img
                      v-if="imagePreview"
                      :src="imagePreview"
                      alt="preview-gambar"
                      class="w-full h-full object-cover"
                    />

                    <!-- Jika belum ada gambar tampilkan icon upload -->
                    <div
                      v-else
                      class="flex flex-col items-center justify-center text-gray-400"
                    >
                      <svg
                        class="w-12 h-12 mb-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 16l4-4a3 5 0 014 0l4 4m0 0l4-4a3 5 0 014 0l4 4M4 16v4a2 2 0 002 2h12a2 2 0 002-2v-4"
                        />
                      </svg>
                      <span class="text-sm">Upload Foto</span>
                    </div>
                  </div>
                  <input
                    type="file"
                    accept="image/*"
                    @change="handleImageUpload"
                    ref="fileInput"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                  />
                </div>
                <button
                  v-if="imagePreview"
                  @click="clearImage"
                  type="button"
                  class="mt-2 w-full px-3 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                >
                  Hapus Foto
                </button>
              </div>
            </div>

            <div class="lg:col-span-2 space-y-4">
              <!-- Nama Lapangan -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                  Nama Lapangan <span class="text-red-500">*</span>
                </label>
                <input
                  v-model="form.name"
                  type="text"
                  required
                  placeholder="Contoh: GOR Badminton Semarang"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                />
              </div>

              <!-- City & District -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kota <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.city"
                    type="text"
                    required
                    placeholder="Contoh: Semarang"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kecamatan <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.district"
                    type="text"
                    required
                    placeholder="Contoh: Tembalang"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
              </div>

              <!-- Open & Close Time -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jam Buka <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.open_time"
                    type="time"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jam Tutup <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.close_time"
                    type="time"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
              </div>

              <!-- Field Count & Rating -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jumlah Lapangan <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model.number="form.field_count"
                    type="number"
                    min="1"
                    required
                    placeholder="Contoh: 8"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Rating
                  </label>
                  <input
                    v-model.number="form.rating"
                    type="number"
                    step="0.1"
                    min="0"
                    max="5"
                    placeholder="0.0 - 5.0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
              </div>

              <!-- Maps URL -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                  Link Google Maps
                </label>
                <input
                  v-model="form.maps_url"
                  type="url"
                  placeholder="google Maps Tersedia"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                />
              </div>

              <!-- Contact Info -->
              <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                  <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    />
                  </svg>
                  Informasi Kontak
                </h3>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kontak
                  </label>
                  <input
                    v-model="form.contact_name"
                    type="text"
                    placeholder="Masukkan nama kontak"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition bg-white"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    WhatsApp
                  </label>
                  <input
                    v-model="form.contact_whatsapp"
                    type="tel"
                    placeholder="Masukkan nomer telepon"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition bg-white"
                  />
                </div>
              </div>
            </div>
          </div>

          <div
            class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-gray-200"
          >
            <button
              @click="isOpen = false"
              type="button"
              class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium"
            >
              Batal
            </button>
            <button
              type="submit"
              class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition font-medium shadow-lg shadow-emerald-500/30 flex items-center gap-2"
            >
              <svg
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"
                />
              </svg>
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from "vue";
import { PlusCircleIcon } from "@heroicons/vue/24/outline";
import { useToast } from "vue-toastification";
import api from "../../api";

const toast = useToast();

// Modal State
const isOpen = ref(false);

// Inisialisasi form data
const form = reactive({
  name: "",
  city: "",
  district: "",
  image_url: "",
  open_time: "",
  close_time: "",
  field_count: "",
  maps_url: "",
  contact_name: "",
  contact_whatsapp: "",
  rating: "",
});

// Image Handling
const imagePreview = ref(null);
const fileInput = ref(null);

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  imagePreview.value = URL.createObjectURL(file);
};

// Clear selected image
const clearImage = () => {
  imagePreview.value = null;
  if (fileInput.value) {
    fileInput.value.value = "";
  }
};

const handleSubmitCourtForm = async () => {
  try {
    const res = await api.post("/court-form", {
      name: form.name,
      city: form.city,
      district: form.district,
      image_url: form.image_url,
      open_time: form.open_time,
      close_time: form.close_time,
      field_count: form.field_count,
      maps_url: form.maps_url,
      contact_name: form.contact_name,
      contact_whatsapp: form.contact_whatsapp,
      rating: form.rating,
    });

    // Response sukses
    if (res.data?.message) {
      toast.success(res.data.message);
    }
  } catch (e) {
    console.error("Data lapangan gagal ditambahkan", e);
    const errors = e?.response?.data?.errors;

    if (errors) {
      const firstField = Object.keys(errors)[0];
      const firstMessage = errors[firstField][0];
      toast.error(firstMessage);
    }
  }
};
</script>
