<template>
  <div class="hidden lg:flex w-1/2 relative text-white">
    <!-- Background gambar blur sedikit -->
    <div
      class="absolute inset-0 bg-cover bg-center blur-sm"
      :style="{ backgroundImage: `url(${backgroundBola})` }"
    ></div>
    <!-- Supaya teks masih bisa kebaca -->
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 p-10 flex flex-col justify-between" v-fade-up>
      <div>
        <h1 class="text-3xl font-bold">Lupa Password?</h1>
        <p class="mt-4 max-w-md text-indigo-100 text-sm">
          Tenang, itu hal yang wajar. Masukkan email yang terdaftar dan silakan
          atur ulang kata sandi akun Sewa Lapangan langsung di halaman ini.
        </p>
      </div>
      <p class="text-xs text-indigo-100/80">
        @ {{ year }} Sewa Lapangan. All rights reserved
      </p>
    </div>
  </div>
</template>

<script setup>
import backgroundBola from "../../assets/img/background-badminton.webp";
const year = new Date().getFullYear();
</script>
