<template>
  <Disclosure
    as="nav"
    class="relative bg-linear-to-br from-emerald-600 via-emerald-500 to-teal-600 text-white after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10"
    v-slot="{ open }"
  >
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <!-- KIRI: BRAND + MENU DESKTOP -->
        <div class="flex flex-1 items-center sm:items-stretch">
          <!-- BRAND KIRI -->
          <div class="flex shrink-0 items-center gap-2">
            <h1
              class="text-2xl font-bold leading-none text-white"
              style="font-family: 'Poppins', sans-serif"
            >
              BadminKuy
            </h1>
          </div>
          <!-- MENU DESKTOP (TENGAH) -->
          <div class="hidden sm:flex flex-1 justify-center">
            <div class="flex space-x-4">
              <a
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                :class="[
                  item.current
                    ? 'bg-gray-950/50 text-white'
                    : 'text-gray-300 hover:bg-white/5 hover:text-white',
                  'rounded-md px-3 py-2 text-sm font-medium',
                ]"
                :aria-current="item.current ? 'page' : undefined"
              >
                {{ item.name }}
              </a>
            </div>
          </div>
        </div>

        <!-- KANAN: SIGN IN + BAHASA (DESKTOP) + HAMBURGER (MOBILE) -->
        <div class="flex items-center gap-3">
          <!-- Sign In: hanya muncul di DESKTOP -->
          <button
            type="button"
            class="hidden sm:inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-sm font-semibold text-white hover:bg-white/20 cursor-pointer transition duration-300 ease-in-out focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            @click="router.push('/login')"
          >
            <UserIcon class="size-5" aria-hidden="true" />
            <span>Sign In</span>
          </button>

          <!-- Menu Bahasa: hanya muncul di DESKTOP -->
          <Menu as="div" class="relative hidden sm:block">
            <MenuButton
              class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            >
              <span class="text-lg">
                {{ currentLanguage === "id" ? "🇮🇩" : "🇺🇸" }}
              </span>
              <span class="hidden sm:inline">
                {{ currentLanguage === "id" ? "ID" : "EN" }}
              </span>
            </MenuButton>

            <transition
              enter-active-class="transition ease-out duration-100"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform scale-100 opacity-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform scale-100 opacity-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <MenuItems
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-800 py-1 outline -outline-offset-1 outline-white/10"
              >
                <MenuItem v-slot="{ active }">
                  <button
                    type="button"
                    @click="currentLanguage = 'id'"
                    :class="[
                      active ? 'bg-white/5 outline-hidden' : '',
                      'flex w-full items-center gap-2 px-4 py-2 text-sm text-gray-300',
                    ]"
                  >
                    <span>🇮🇩</span>
                    <span>Bahasa Indonesia</span>
                  </button>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <button
                    type="button"
                    @click="currentLanguage = 'en'"
                    :class="[
                      active ? 'bg-white/5 outline-hidden' : '',
                      'flex w-full items-center gap-2 px-4 py-2 text-sm text-gray-300',
                    ]"
                  >
                    <span>🇺🇸</span>
                    <span>English</span>
                  </button>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>

          <!-- Tombol HAMBURGER: pindah ke KANAN, hanya MOBILE -->
          <div class="flex sm:hidden">
            <DisclosureButton
              class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-200 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"
            >
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block size-6" aria-hidden="true" />
              <XMarkIcon v-else class="block size-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
        </div>
      </div>
    </div>

    <!-- MOBILE MENU: muncul dari bawah -->
    <transition
      enter-active-class="transition ease-out duration-150"
      enter-from-class="transform opacity-0 translate-y-4"
      enter-to-class="transform opacity-100 translate-y-0"
      leave-active-class="transition ease-in duration-100"
      leave-from-class="transform opacity-100 translate-y-0"
      leave-to-class="transform opacity-0 translate-y-4"
    >
      <DisclosurePanel class="sm:hidden">
        <!-- Link utama -->
        <div class="space-y-1 px-2 pt-2 pb-3">
          <DisclosureButton
            v-for="item in navigation"
            :key="item.name"
            as="a"
            :href="item.href"
            :class="[
              item.current
                ? 'bg-gray-950/50 text-white'
                : 'text-gray-300 hover:bg-white/5 hover:text-white',
              'block rounded-md px-3 py-2 text-base font-medium',
            ]"
            :aria-current="item.current ? 'page' : undefined"
          >
            {{ item.name }}
          </DisclosureButton>
        </div>

        <!-- Sign In + Bahasa di dalam hamburger (mobile only) -->
        <div class="border-t border-white/10 px-4 pt-3 pb-4 space-y-3">
          <!-- Sign In mobile -->
          <button
            type="button"
            class="w-full inline-flex justify-center items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white hover:bg-white/20 focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
          >
            <UserIcon class="size-5" aria-hidden="true" />
            <span>Sign In</span>
          </button>

          <!-- Bahasa mobile -->
          <div class="space-y-2">
            <p
              class="text-xs font-medium uppercase tracking-wide text-gray-400"
            >
              Bahasa
            </p>
            <div class="flex gap-2">
              <button
                type="button"
                @click="currentLanguage = 'id'"
                :class="[
                  currentLanguage === 'id'
                    ? 'bg-white/10 text-white'
                    : 'bg-transparent text-gray-300',
                  'flex flex-1 items-center justify-center gap-2 rounded-full px-3 py-1.5 text-sm',
                ]"
              >
                <span>🇮🇩</span>
                <span>ID</span>
              </button>
              <button
                type="button"
                @click="currentLanguage = 'en'"
                :class="[
                  currentLanguage === 'en'
                    ? 'bg-white/10 text-white'
                    : 'bg-transparent text-gray-300',
                  'flex flex-1 items-center justify-center gap-2 rounded-full px-3 py-1.5 text-sm',
                ]"
              >
                <span>🇺🇸</span>
                <span>EN</span>
              </button>
            </div>
          </div>
        </div>
      </DisclosurePanel>
    </transition>
  </Disclosure>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import api from "../../api";

import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import {
  Bars3Icon,
  BellIcon,
  XMarkIcon,
  UserIcon,
} from "@heroicons/vue/24/outline";

const router = useRouter();

const navigation = [
  { name: "Home", href: "#", current: true },
  { name: "Experience", href: "#", current: false },
  { name: "Contact Us", href: "#", current: false },
];

// State bahasa yang aktif
const currentLanguage = ref("id");
</script>
