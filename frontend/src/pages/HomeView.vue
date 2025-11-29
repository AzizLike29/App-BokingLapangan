<template>
  <div class="min-h-screen flex flex-col">
    <!-- NAVBAR -->
    <AppNavbar />

    <!-- CONTENT -->
    <main class="flex-1">
      <Home />
    </main>

    <!-- FOOTER -->
    <AppFooter />
  </div>
</template>

<script setup>
import AppNavbar from "../components/layout/AppNavbar.vue";
import AppFooter from "../components/layout/AppFooter.vue";
import Home from "../components/navigation/Home.vue";
</script>
