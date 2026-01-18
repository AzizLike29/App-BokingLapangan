<template>
  <div class="w-full max-w-md mx-auto" v-fade-up>
    <h2 class="text-2xl font-semibold text-gray-900">
      {{ t("Auth.titleLogin") }}
    </h2>
    <p class="mt-1 text-sm text-gray-500">
      {{ t("Auth.descLogin") }}
      <button
        type="button"
        class="cursor-pointer font-medium text-indigo-600 hover:text-indigo-500"
        @click="router.push('/register')"
      >
        {{ t("Auth.directRegister") }}
      </button>
    </p>

    <form class="mt-6 space-y-5" @submit.prevent="handleSubmitLogin">
      <!-- Email -->
      <div class="space-y-1">
        <label for="email" class="block text-sm font-medium text-gray-700">
          {{ t("Auth.textEmail") }}
        </label>
        <input
          id="email"
          v-model="email"
          type="email"
          required
          autocomplete="email"
          placeholder="johndoe@gmail.com"
          class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
        />
      </div>

      <!-- Password -->
      <div class="space-y-1">
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium text-gray-700">
            {{ t("Auth.textPassword") }}
          </label>
          <button
            type="button"
            class="cursor-pointer text-xs font-medium text-emerald-600 hover:text-emerald-500"
            @click="router.push('/lupa-password')"
          >
            {{ t("Auth.descPass") }}
          </button>
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

      <!-- Remember me -->
      <div class="flex items-center justify-between">
        <label class="flex items-center gap-2">
          <input
            v-model="remember"
            type="checkbox"
            class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500"
          />
          <span class="text-xs text-gray-600">{{ t("Auth.rememberMe") }}</span>
        </label>
      </div>

      <div class="space-y-3">
        <!-- Submit button -->
        <button
          type="submit"
          class="cursor-pointer w-full inline-flex justify-center rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
        >
          {{ t("Auth.btnSubmit") }}
        </button>

        <div class="flex items-center gap-3">
          <div class="h-px flex-1 bg-gray-200"></div>
          <span class="text-[11px] uppercase tracking-wide text-gray-400">
            {{ t("Auth.btnOr") }}
          </span>
          <div class="h-px flex-1 bg-gray-200"></div>
        </div>

        <!-- Sign in with Google button -->
        <button
          type="button"
          class="cursor-pointer w-full inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 shadow-sm hover:bg-gray-50"
          @click="loginWithGoogle"
        >
          <!-- Icon Google -->
          <svg
            class="h-4 w-4"
            viewBox="0 0 48 48"
            xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true"
          >
            <path
              fill="#FFC107"
              d="M43.6 20.5H42V20H24v8h11.3C33.9 32.6 29.4 36 24 36 16.8 36 11 30.2 11 23S16.8 10 24 10c3.1 0 5.9 1.1 8.1 2.9l5.7-5.7C34.6 4.1 29.6 2 24 2 12.3 2 3 11.3 3 23s9.3 21 21 21 21-9.3 21-21c0-1.1-.1-2.2-.4-3.5z"
            />
            <path
              fill="#FF3D00"
              d="M6.3 14.7l6.6 4.8C14.5 16.2 18.9 14 24 14c3.1 0 5.9 1.1 8.1 2.9l5.7-5.7C34.6 4.1 29.6 2 24 2 16 2 9.1 6.3 6.3 14.7z"
            />
            <path
              fill="#4CAF50"
              d="M24 44c5.3 0 10.2-2 13.9-5.3l-6.4-5.4C29.5 34.7 26.9 36 24 36c-5.3 0-9.8-3.4-11.4-8.2l-6.6 5.1C9.1 39.7 16 44 24 44z"
            />
            <path
              fill="#1976D2"
              d="M43.6 20.5H42V20H24v8h11.3C34.8 32.7 29.9 36 24 36c-5.3 0-9.8-3.4-11.4-8.2l-6.6 5.1C9.1 39.7 16 44 24 44c10.8 0 19.6-8.8 19.6-19.6 0-1.1-.1-2.2-.4-3.5z"
            />
          </svg>

          <span class="text-xs">{{ t("Auth.signInGoogle") }}</span>
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
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const toast = useToast();
const router = useRouter();
const email = ref("");
const password = ref("");
const remember = ref(false);

const handleSubmitLogin = async () => {
  if (!remember.value) {
    toast.error("Please check ‘Remember me’ first.");
    return; // stop the process, do not send requests to the backend
  }

  try {
    const res = await api.post("/login", {
      email: email.value,
      password: password.value,
      remember: remember.value,
    });

    console.log("Login successful ", res.data);
    if (res.data?.message) {
      toast.success(res.data.message);
    }
    router.push("/badmin-kuy");
  } catch (e) {
    console.error("Login failed", e);
    const errors = e?.response?.data?.errors;

    if (errors) {
      const firstField = Object.keys(errors)[0];
      const firstMessage = errors[firstField][0];
      toast.error(firstMessage);
    }
  }
};

const loginWithGoogle = () => {
  window.location.href = `${import.meta.env.VITE_API_URL}/google/redirect`;
};
</script>
