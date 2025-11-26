<template>
  <div class="w-full max-w-md mx-auto" v-fade-up>
    <h2 class="text-2xl font-semibold text-gray-900">Lupa Password</h2>
    <button
      type="button"
      class="cursor-pointer font-medium text-indigo-600 hover:text-indigo-500"
      @click="router.push('/login')"
    >
      Kembali sebelumnya
    </button>

    <form class="mt-6 space-y-5" @submit.prevent="handleSubmitForgotPassword">
      <!-- Email -->
      <div class="space-y-1">
        <label for="email" class="block text-sm font-medium text-gray-700">
          Email
        </label>
        <input
          id="email"
          v-model="email"
          type="email"
          required
          autocomplete="email"
          placeholder="Masukkan email sebelumnya"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
        />
      </div>
      <!-- Buat password baru -->
      <div class="space-y-1">
        <label for="password" class="block text-sm font-medium text-gray-700"
          >Password Baru</label
        >
        <input
          id="password"
          v-model="password"
          type="password"
          required
          autocomplete="password"
          placeholder="Masukkan password baru"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
        />
      </div>
      <!-- Konfirmasi password baru -->
      <div class="space-y-1">
        <label
          for="confirm-password"
          class="block text-sm font-medium text-gray-700"
          >Konfirmasi Password Baru</label
        >
        <input
          id="confirm-password"
          v-model="confirmPassword"
          type="password"
          required
          autocomplete="password"
          placeholder="Konfirmasi password baru"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
        />
      </div>

      <div class="space-y-3">
        <!-- Tombol ubah password -->
        <button
          type="submit"
          class="cursor-pointer w-full inline-flex justify-center rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
        >
          <!-- Tambah spinner loading -->
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

          <span>
            {{ isLoading ? "Memproses..." : "Ubah Password" }}
          </span>
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import api from "../../api";
import { useRouter } from "vue-router";
import { useToast } from "vue-toastification";

const toast = useToast();
const router = useRouter();
const isLoading = ref(false);

const email = ref("");
const password = ref("");
const confirmPassword = ref("");

const handleSubmitForgotPassword = async () => {
  if (password.value !== confirmPassword.value) {
    toast.error("Password dan konfirmasi password tidak sesuai.");
    return;
  }

  try {
    // Set loading state
    isLoading.value = true;

    await api.post("/lupa-password", {
      email: email.value,
      password: password.value,
      password_confirmation: confirmPassword.value,
    });
    toast.success(
      "Password berhasil diubah. Silakan masuk dengan password baru!"
    );
    router.push("/login");
  } catch (error) {
    toast.error("Terjadi kesalahan saat mengubah password. Silakan coba lagi.");
  } finally {
    isLoading.value = false; // Reset loading state
  }
};
</script>
