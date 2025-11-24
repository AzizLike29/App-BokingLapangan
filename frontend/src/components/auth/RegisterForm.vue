<template>
  <div class="w-full max-w-md mx-auto" v-fade-up>
    <h2 class="text-2xl font-semibold text-gray-900">
      Daftarkan akun anda sekarang
    </h2>
    <p class="mt-1 text-sm text-gray-500">Sudah punya akun?</p>
    <button
      type="button"
      class="cursor-pointer font-medium text-indigo-600 hover:text-indigo-500"
      @click="router.push('/login')"
    >
      Login Sekarang
    </button>

    <form class="mt-6 space-y-5" @submit.prevent="handleSubmit">
      <!-- Nama -->
      <div class="space-y-1">
        <label for="name" class="block text-sm font-medium text-gray-700"
          >Nama Lengkap</label
        >
        <input
          id="name"
          v-model="nama"
          type="text"
          required
          autocomplete="nama"
          placeholder="Masukkan nama anda"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        />
      </div>

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
          placeholder="johndoe@gmail.com"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        />
      </div>

      <!-- Password -->
      <div class="space-y-1">
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium text-gray-700">
            Password
          </label>
        </div>
        <input
          id="password"
          v-model="password"
          type="password"
          required
          autocomplete="current-password"
          placeholder="*************"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
        />
      </div>

      <div class="space-y-3">
        <!-- Tombol Daftar -->
        <button
          type="submit"
          class="w-full inline-flex justify-center rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus-outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Daftar
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import api from "../../api";
import { useRouter } from "vue-router";

const router = useRouter();
const nama = ref("");
const email = ref("");
const password = ref("");

const handleSubmit = async () => {
  try {
    const res = await api.post("/register", {
      name: nama.value,
      email: email.value,
      password: password.value,
    });

    console.log("Register berhasil", res.data);
    router.push("/login");
  } catch (e) {
    console.error("Register gagal", e);
  }
};
</script>
