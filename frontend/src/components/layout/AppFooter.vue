<template>
  <footer
    class="relative bg-linear-to-br from-emerald-600 via-emerald-500 to-teal-600 text-white overflow-hidden"
  >
    <div
      class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNiIgc3Ryb2tlPSJyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDUpIi8+PC9nPjwvc3ZnPg==')] opacity-10"
    ></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
      <div
        class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8"
      >
        <!-- Brand -->
        <div class="space-y-2">
          <div class="flex items-center gap-2">
            <h3
              class="text-3xl font-black text-white"
              style="font-family: &quot;Poppins&quot;, sans-serif"
            >
              {{ t("AppFooter.titleWeb") }}
            </h3>
          </div>
          <p class="text-white/90 text-sm">
            © {{ year }} {{ t("AppFooter.copyright") }}
          </p>
        </div>

        <!-- Links -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-12">
          <!-- Column 1 -->
          <div class="space-y-3">
            <a
              href="#"
              class="flex items-center gap-3 text-white hover:text-white/80 transition-colors duration-200"
            >
              <span class="text-base">{{ t("AppFooter.linksFooter") }}</span>
            </a>
            <a
              href="#"
              class="flex items-center gap-3 text-white hover:text-white/80 transition-colors duration-200"
            >
              <span class="text-base">{{ t("AppFooter.privacyFooter") }}</span>
            </a>
          </div>

          <!-- Column 2 -->
          <div class="space-y-3">
            <a
              href="#"
              class="flex items-center gap-3 text-white hover:text-white/80 transition-colors duration-200"
            >
              <svg
                class="w-6 h-6 shrink-0"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                />
              </svg>
              <span class="text-base">{{ t("AppFooter.followMedsos1") }}</span>
            </a>
            <a
              href="#"
              class="flex items-center gap-3 text-white hover:text-white/80 transition-colors duration-200"
            >
              <svg
                class="w-6 h-6 shrink-0"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                />
              </svg>
              <span class="text-base">{{ t("AppFooter.followMedsos2") }}</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
const year = new Date().getFullYear();
import { useI18n } from "vue-i18n";
const { t } = useI18n();
</script>
