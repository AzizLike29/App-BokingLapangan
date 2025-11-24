<template>
  <div class="min-h-screen flex bg-gray-50">
    <AuthInfo />
    <div
      class="flex-1 flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8"
    >
      <LoginForm />
    </div>
  </div>
</template>

<script setup>
import AuthInfo from "../components/auth/AuthInfo.vue";
import LoginForm from "../components/auth/LoginForm.vue";

const handleSwitch = (mode) => {
  console.log("Switching to mode:", mode);
};
</script>
