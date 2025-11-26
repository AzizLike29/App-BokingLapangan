<template>
  <div class="min-h-screen flex bg-gray-50">
    <AuthInfoForgotPassword />
    <div
      class="flex-1 flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8"
    >
      <ForgotPasswordForm />
    </div>
  </div>
</template>

<script setup>
import AuthInfoForgotPassword from "../components/auth/AuthInfoForgotPassword.vue";
import ForgotPasswordForm from "../components/auth/ForgotPasswordForm.vue";

const handleSwitch = (mode) => {
  console.log("Switching to mode:", mode);
};
</script>
