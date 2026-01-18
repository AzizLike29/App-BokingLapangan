<template>
  <div class="hidden lg:flex w-1/2 relative text-white">
    <!-- Slightly blurred image background -->
    <div
      class="absolute inset-0 bg-cover bg-center blur-sm"
      :style="{ backgroundImage: `url(${backgroundBola})` }"
    ></div>
    <!-- So that the text can still be read -->
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 p-10 flex flex-col justify-between" v-fade-up>
      <div>
        <h1 class="text-3xl font-bold">{{ t("Auth.titleForgot") }}</h1>
        <p class="mt-4 max-w-md text-indigo-100 text-sm">
          {{ t("Auth.descForgot") }}
        </p>
      </div>
      <p class="text-xs text-indigo-100/80">
        @ {{ year }} {{ t("Auth.footer") }}
      </p>
    </div>
  </div>
</template>

<script setup>
import backgroundBola from "../../assets/img/background-badminton.webp";
const year = new Date().getFullYear();
import { useI18n } from "vue-i18n";
const { t } = useI18n();
</script>
