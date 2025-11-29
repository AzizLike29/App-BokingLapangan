<template>
  <div>
    <section class="relative w-full h-[400px] overflow-hidden">
      <video autoplay muted loop playsinline class="w-full h-full object-cover">
        <source :src="videoBadmin" type="video/mp4" />
      </video>
    </section>

    <section class="max-w-6xl mx-auto py-12 px-4">
      <h2 class="text-2xl font-semibold mb-4">Konten Lain</h2>
      <p class="text-gray-700">
        Ini tempat buat fitur, card, atau konten lainnya.
      </p>
    </section>
  </div>
</template>

<script setup>
import videoBadmin from "../../assets/video-badmin.mp4";
</script>
