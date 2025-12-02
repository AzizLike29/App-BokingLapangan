<template>
  <div
    class="min-h-screen bg-gray-100 flex items-center justify-center px-6 py-12"
  >
    <!-- Wrapper Utama -->
    <div class="w-full max-w-5xl bg-white shadow-md rounded-md overflow-hidden">
      <!-- Judul -->
      <h1 class="text-center text-2xl font-semibold text-gray-800 py-8">
        Contact Form #06
      </h1>
      <div class="grid grid-cols-1 md:grid-cols-2 border-t border-gray-100">
        <!-- Form Kiri -->
        <div class="p-8 bg-gray-50">
          <h2 class="text-xl font-semibold text-gray-500 mb-6">Contact Us</h2>

          <form class="space-y-4">
            <!-- Full name & email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="text-xs font-semibold text-gray-600 uppercase"
                  >Full Name</label
                >
                <input
                  type="text"
                  placeholder="name"
                  class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
              <div>
                <label class="text-xs font-semibold text-gray-600 uppercase"
                  >Email Address</label
                >
                <input
                  type="email"
                  placeholder="Email"
                  class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
              </div>
            </div>

            <!-- Subject -->
            <div>
              <label class="text-xs font-semibold text-gray-600 uppercase"
                >Subject</label
              >
              <input
                type="text"
                placeholder="Subject"
                class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
              />
            </div>

            <!-- Message -->
            <div>
              <label class="text-xs font-semibold text-gray-600 uppercase">
                Message
              </label>
              <textarea
                rows="4"
                placeholder="Message"
                class="mt-1 block w-full border border-gray-300 rounded-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
              ></textarea>
            </div>

            <!-- Tombol -->
            <button
              type="submit"
              class="mt-2 inline-flex items-center px-5 py-2 text-sm font-semibold text-white bg-emerald-600 rounded-sm shadow hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              Send Message
            </button>
          </form>
        </div>

        <!-- Maps Kanan -->
        <div class="h-93 mid:h-full">
          <iframe
            class="w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24156.84088296026!2d-74.0060152!3d40.7127281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQyJzQ2LjIiTiA3NMKwMDAnMjIuMCJX!5e0!3m2!1sen!2sus!4v1700000000000"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>

      <!-- Info Bawah -->
      <div
        class="grid grid-cols-1 md:grid-cols-4 gap-8 px-8 py-8 text-sm text-gray-700"
      >
        <!-- Address -->
        <div class="flex items-start space-x-3">
          <div
            class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <MapPinIcon class="w-6"></MapPinIcon>
          </div>
          <p>
            <span class="font-semibold block">Address:</span>
            198 West 21th Street,<br />
            Suite 721 New York NY 10016
          </p>
        </div>

        <!-- Phone -->
        <div class="flex items-start space-x-3">
          <div
            class="flex w-10 h-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <PhoneIcon class="w-6"></PhoneIcon>
          </div>
          <p>
            <span class="font-semibold block">Phone:</span>
            + 1235 2355 98
          </p>
        </div>

        <!-- Contact Email -->
        <div class="flex items-start space-x-3">
          <div
            class="flex w-10 h-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <RocketLaunchIcon class="w-6"></RocketLaunchIcon>
          </div>
          <p>
            <span class="font-semibold block">Email:</span>
            info@yoursite.com
          </p>
        </div>

        <!-- Website -->
        <div class="flex items-start space-x-3">
          <div
            class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-950/50 text-white"
          >
            <GlobeAltIcon class="w-6"></GlobeAltIcon>
          </div>
          <p>
            <span class="font-semibold block">Website:</span>
            yoursite.com
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { MapPinIcon } from "@heroicons/vue/24/outline";
import { PhoneIcon } from "@heroicons/vue/24/outline";
import { RocketLaunchIcon } from "@heroicons/vue/24/outline";
import { GlobeAltIcon } from "@heroicons/vue/24/outline";
</script>
