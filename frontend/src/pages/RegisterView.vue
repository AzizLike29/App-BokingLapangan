<template>
  <div class="min-h-screen flex bg-gray-50">
    <AuthInfoRegister />
    <div
      class="flex-1 flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8"
    >
      <RegisterForm />
    </div>
  </div>
</template>

<script setup>
import AuthInfoRegister from "../components/auth/AuthInfoRegister.vue";
import RegisterForm from "../components/auth/RegisterForm.vue";

const handleSwitch = (mode) => {
  console.log("Switching to mode:", mode);
};
</script>
