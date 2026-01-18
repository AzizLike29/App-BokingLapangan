<template>
  <div
    class="min-h-screen bg-gray-100 flex items-center justify-center px-6 py-12"
  >
    <!-- Main Wrapper -->
    <div class="w-full max-w-5xl bg-white shadow-md rounded-md overflow-hidden">
      <!-- Title -->
      <h1 class="text-center text-2xl font-semibold text-gray-800 py-8">
        {{ t("contactUs.titleContact") }}
      </h1>
      <div class="grid grid-cols-1 md:grid-cols-2 border-t border-gray-100">
        <!-- Left Form -->
        <div class="p-8 bg-gray-50">
          <h2 class="text-xl font-semibold text-gray-500 mb-6">
            {{ t("contactUs.headContact") }}
          </h2>

          <form class="space-y-4" @submit.prevent="handleSubmitContactUs">
            <!-- Full name and email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="text-xs font-semibold text-gray-600 uppercase">{{
                  t("contactUs.fullName")
                }}</label>
                <input
                  type="text"
                  :placeholder="t('contactUs.fullName')"
                  required
                  v-model="full_name"
                  class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="text-xs font-semibold text-gray-600 uppercase">{{
                  t("contactUs.emailAddress")
                }}</label>
                <input
                  type="email"
                  v-model="email"
                  required
                  :placeholder="t('contactUs.emailAddress')"
                  class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>

            <!-- Subject -->
            <div>
              <label class="text-xs font-semibold text-gray-600 uppercase">{{
                t("contactUs.subject")
              }}</label>
              <input
                type="text"
                required
                :placeholder="t('contactUs.subject')"
                v-model="subject"
                class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
              />
            </div>

            <!-- Message -->
            <div>
              <label class="text-xs font-semibold text-gray-600 uppercase">
                {{ t("contactUs.message") }}
              </label>
              <textarea
                rows="4"
                required
                :placeholder="t('contactUs.message')"
                v-model="message"
                class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
              ></textarea>
            </div>

            <!-- Button -->
            <button
              type="submit"
              class="cursor-pointer mt-2 inline-flex items-center px-5 py-2 text-sm font-semibold text-white bg-emerald-600 rounded-sm shadow hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              <!-- Add loading spinner -->
              <svg
                v-if="isLoading"
                class="animate-spin h-4 w-4 mr-2"
                viewBox="0 0 24 24"
              >
                <circle
                  class="opacity-25"
                  cx="12"
                  cy="12"
                  r="10"
                  stroke="currentColor"
                  stroke-width="4"
                  fill="none"
                />
                <path
                  class="opacity-75"
                  fill="currentColor"
                  d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                />
              </svg>

              <PaperAirplaneIcon v-else class="h-4 w-4 mr-2" />

              <span>
                {{ isLoading ? "Memproses..." : "Kirim Pesan" }}
              </span>
            </button>
          </form>
        </div>

        <!-- Right Maps -->
        <div class="h-93 mid:h-full">
          <iframe
            class="w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24156.84088296026!2d-74.0060152!3d40.7127281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQyJzQ2LjIiTiA3NMKwMDAnMjIuMCJX!5e0!3m2!1sen!2sus!4v1700000000000"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>

      <!-- Bottom Info -->
      <div
        class="grid grid-cols-1 md:grid-cols-4 gap-8 px-8 py-8 text-sm text-gray-700"
      >
        <!-- Address -->
        <div class="flex items-start space-x-3">
          <div
            class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <MapPinIcon class="w-6"></MapPinIcon>
          </div>
          <p>
            <span class="font-semibold block">{{
              t("contactUs.btmAddress")
            }}</span>
            {{ t("contactUs.btmNameStreet") }}<br />
            {{ t("contactUs.btmCityStreet") }}
          </p>
        </div>

        <!-- Phone -->
        <div class="flex items-start space-x-3">
          <div
            class="flex w-10 h-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <PhoneIcon class="w-6"></PhoneIcon>
          </div>
          <p>
            <span class="font-semibold block">{{ t("contactUs.phone") }}</span>
            {{ t("contactUs.numberPhone") }}
          </p>
        </div>

        <!-- Contact Email -->
        <div class="flex items-start space-x-3">
          <div
            class="flex w-10 h-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <RocketLaunchIcon class="w-6"></RocketLaunchIcon>
          </div>
          <p>
            <span class="font-semibold block">{{
              t("contactUs.titleEmail")
            }}</span>
            {{ t("contactUs.infoEmail") }}
          </p>
        </div>

        <!-- Website -->
        <div class="flex items-start space-x-3">
          <div
            class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <GlobeAltIcon class="w-6"></GlobeAltIcon>
          </div>
          <p>
            <span class="font-semibold block">{{
              t("contactUs.titleWeb")
            }}</span>
            {{ t("contactUs.infoWeb") }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import api from "../../api";
import { ref } from "vue";
import { useToast } from "vue-toastification";
import { MapPinIcon } from "@heroicons/vue/24/outline";
import { PhoneIcon } from "@heroicons/vue/24/outline";
import { RocketLaunchIcon } from "@heroicons/vue/24/outline";
import { GlobeAltIcon } from "@heroicons/vue/24/outline";
import { PaperAirplaneIcon } from "@heroicons/vue/24/outline";
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const toast = useToast();
const isLoading = ref(false);
const full_name = ref("");
const email = ref("");
const subject = ref("");
const message = ref("");

const handleSubmitContactUs = async () => {
  const payload = {
    full_name: full_name.value,
    email: email.value,
    subject: subject.value,
    message: message.value,
  };
  try {
    // Set loading state
    isLoading.value = true;

    const { data } = await api.post("/contact-us", payload);
    toast.success(data.message);

    // If successful, clear the form
    full_name.value = "";
    email.value = "";
    subject.value = "";
    message.value = "";
  } catch (e) {
    const errors = e?.response?.data?.errors;

    if (errors) {
      const firstField = Object.keys(errors)[0];
      const firstMessage = errors[firstField][0];
      toast.error(firstMessage);
    }
  } finally {
    isLoading.value = false; // Reset loading state
  }
};
</script>
