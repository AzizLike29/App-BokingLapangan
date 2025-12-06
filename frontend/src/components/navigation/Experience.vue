<template>
  <section class="max-w-6-xl mx-auto px-4 pt-6">
    <div
      class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
    >
      <!-- Left Partial -->
      <SearchButton />

      <!-- Right Partial -->
      <CourtForm />
    </div>

    <!-- Content All Experience -->
    <div class="mt-6"></div>
  </section>
</template>

<script setup>
import SearchButton from "../partial/SearchButton.vue";
import CourtForm from "../partial/CourtForm.vue";
</script>
