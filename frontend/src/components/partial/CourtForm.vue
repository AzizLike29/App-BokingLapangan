<template>
  <div>
    <div class="w-full sm:w-auto flex sm:justify-end">
      <button
        type="button"
        class="cursor-pointer inline-flex items-center gap-2 rounded-full bg-emerald-600 px-4 sm:px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 whitespace-nowrap"
        @click="isOpen = true"
      >
        <PlusCircleIcon class="h-4 w-4" />
        <span>{{ t("courtForm.addData") }}</span>
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
          <h2 class="text-2xl font-bold text-white">
            {{ t("courtForm.header") }}
          </h2>
          <p class="text-emerald-100 text-sm mt-1">
            {{ t("courtForm.headerChild") }}
          </p>
        </div>

        <form @submit.prevent="handleSubmitCourtForm" class="p-6">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-2">
                {{ t("courtForm.imageCourts") }}
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

                    <!-- If there is no image, display the upload icon -->
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
                      <span class="text-sm">{{
                        t("courtForm.imageUpload")
                      }}</span>
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
                  @click.prevent="clearImage"
                  type="button"
                  class="relative z-10 mt-2 w-full px-3 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                >
                  {{ t("courtForm.deleteImage") }}
                </button>
              </div>
            </div>

            <div class="lg:col-span-2 space-y-4">
              <!-- Field Name -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                  {{ t("courtForm.nameCourt") }}
                  <span class="text-red-500">*</span>
                </label>
                <input
                  v-model="form.name"
                  type="text"
                  required
                  :placeholder="t('courtForm.placeholder.placeName')"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                />
              </div>

              <!-- City & District -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ t("courtForm.cityCourt") }}
                    <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.city"
                    type="text"
                    required
                    :placeholder="t('courtForm.placeholder.placeCity')"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ t("courtForm.district") }}
                    <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.district"
                    type="text"
                    required
                    :placeholder="t('courtForm.placeholder.placeDistrict')"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
              </div>

              <!-- Open & Close Time -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ t("courtForm.openClock") }}
                    <span class="text-red-500">*</span>
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
                    {{ t("courtForm.closeClock") }}
                    <span class="text-red-500">*</span>
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
                    {{ t("courtForm.numberCourts") }}
                    <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model.number="form.field_count"
                    type="number"
                    min="1"
                    required
                    :placeholder="t('courtForm.placeholder.placeCountCourts')"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ t("courtForm.rating") }}
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
                  {{ t("courtForm.location") }}
                  <span class="text-red-500">*</span>
                </label>

                <input
                  v-model="form.maps_url"
                  type="text"
                  required
                  :placeholder="t('courtForm.placeholder.placeLocation')"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                />

                <p class="text-xs text-gray-500 mt-1">
                  {{ t("courtForm.locTextChild") }}
                </p>
              </div>

              <!-- Preview Maps -->
              <div v-if="mapsEmbedUrl" class="mt-3">
                <div class="rounded-lg overflow-hidden border border-gray-200">
                  <iframe
                    :src="mapsEmbedUrl"
                    class="w-full h-64 border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                  ></iframe>
                </div>

                <a
                  :href="mapsOpenUrl"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="inline-flex mt-2 text-sm text-emerald-700 hover:underline"
                >
                  {{ t("courtForm.openMaps") }}
                </a>
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
                  {{ t("courtForm.contactInfo") }}
                </h3>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ t("courtForm.nameTxtContact") }}
                  </label>
                  <input
                    v-model="form.contact_name"
                    type="text"
                    :placeholder="t('courtForm.placeholder.placeInfoContact')"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition bg-white"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    {{ t("courtForm.medWhatsapp") }}
                  </label>
                  <input
                    v-model="form.contact_whatsapp"
                    type="tel"
                    :placeholder="t('courtForm.placeholder.placeNumberTelp')"
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
              {{ t("courtForm.closeBtn") }}
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
              {{ t("courtForm.submitBtn") }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, computed } from "vue";
import { PlusCircleIcon } from "@heroicons/vue/24/outline";
import { useToast } from "vue-toastification";
import api from "../../api";
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const toast = useToast();

// Modal State
const isOpen = ref(false);

const mapsOpenUrl = computed(() => {
  const q = (form.maps_url || "").trim();
  if (!q) return "";
  return `https://www.google.com/maps?q=${encodeURIComponent(q)}`;
});

const mapsEmbedUrl = computed(() => {
  const q = (form.maps_url || "").trim();
  if (!q) return "";
  return `https://www.google.com/maps?q=${encodeURIComponent(q)}&output=embed`;
});

// Inisialisasi form data
const form = reactive({
  name: "",
  city: "",
  district: "",
  open_time: "",
  close_time: "",
  field_count: null,
  maps_url: "",
  contact_name: "",
  contact_whatsapp: "",
  rating: null,
});

// Image Handling
const imagePreview = ref(null);
const fileInput = ref(null);
const selectedFile = ref(null);

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  selectedFile.value = file;
  imagePreview.value = URL.createObjectURL(file);
};

// Delete image button action
const clearImage = () => {
  if (imagePreview.value) {
    URL.revokeObjectURL(imagePreview.value);
  }
  imagePreview.value = null;
  selectedFile.value = null;

  if (fileInput.value) {
    // reset input file
    fileInput.value.value = "";
  }
};

// Form reset after submission
const resetForm = () => {
  form.name = "";
  form.city = "";
  form.district = "";
  form.open_time = "";
  form.close_time = "";
  form.field_count = null;
  form.maps_url = "";
  form.contact_name = "";
  form.contact_whatsapp = "";
  form.rating = null;
  clearImage();
};

const handleSubmitCourtForm = async () => {
  try {
    const fd = new FormData();
    fd.append("name", form.name);
    fd.append("city", form.city);
    fd.append("district", form.district);
    fd.append("open_time", form.open_time);
    fd.append("close_time", form.close_time);
    fd.append("field_count", String(Number(form.field_count)));
    fd.append("maps_url", form.maps_url);
    fd.append("contact_name", form.contact_name);
    fd.append("contact_whatsapp", form.contact_whatsapp);
    fd.append("rating", String(form.rating ?? ""));
    fd.append("image", selectedFile.value);

    // Send data to the backend
    const res = await api.post("/court-form", fd, {
      headers: { "Content-Type": "multipart/form-data" },
    });

    // Success response
    if (res.data?.message) {
      toast.success(res.data.message);
      resetForm(); // Delete previous value
      isOpen.value = false; // Closed-end fund
    }
  } catch (e) {
    console.log("Status:", e?.response?.status);
    console.log("Data:", e?.response?.data);
    console.log("Errors:", JSON.stringify(e?.response?.data?.errors, null, 2));

    const errors = e?.response?.data?.errors;
    if (errors) {
      const firstField = Object.keys(errors)[0];
      const firstMessage = errors[firstField][0];
      toast.error(`${firstField}: ${firstMessage}`);
    } else {
      toast.error(
        e?.response?.data?.message || "Data lapangan gagal ditambahkan",
      );
    }
  }
};
</script>
