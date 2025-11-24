# App Boking Lapangan 🏸

Aplikasi **Sewa / Booking Lapangan Badminton** dengan arsitektur **frontend–backend terpisah**.

- **Backend**: Laravel (REST API, autentikasi, manajemen data booking)
- **Frontend**: Vue 3 + Vite + Tailwind CSS (Single Page Application)
- **Tujuan**: Memudahkan pengguna untuk melihat jadwal, memesan lapangan, dan mengelola booking secara online, kapan saja dan dari mana saja.

---

## 🧭 Daftar Isi

- [App Boking Lapangan 🏸](#app-boking-lapangan-)
  - [🧭 Daftar Isi](#-daftar-isi)
  - [✨ Ringkasan Proyek](#-ringkasan-proyek)
  - [📦 Tech Stack](#-tech-stack)
  - [📁 Struktur Folder](#-struktur-folder)
  - [⚙️ Persiapan Lingkungan](#️-persiapan-lingkungan)
  - [🚀 Setup Backend (Laravel)](#-setup-backend-laravel)
  - [💻 Setup Frontend (Vue \+ Vite \+ Tailwind)](#-setup-frontend-vue--vite--tailwind)
  - [🌐 Konfigurasi URL API](#-konfigurasi-url-api)
  - [🔐 Fitur Autentikasi](#-fitur-autentikasi)
  - [📅 Fitur Booking Lapangan](#-fitur-booking-lapangan)
  - [📡 Contoh Endpoint API](#-contoh-endpoint-api)
  - [🧪 Cara Menjalankan di Lokal](#-cara-menjalankan-di-lokal)
  - [📸 Screenshots (Opsional)](#-screenshots-opsional)
  - [🛠️ Panduan Pengembangan](#️-panduan-pengembangan)
  - [✅ Checklist Pengerjaan](#-checklist-pengerjaan)
  - [📄 Lisensi](#-lisensi)
  - [👤 Author](#-author)

---

## ✨ Ringkasan Proyek

**App Boking Lapangan** adalah sistem pemesanan lapangan badminton berbasis web yang memungkinkan:

- Pengguna mendaftar & login.
- Melihat daftar lapangan yang tersedia.
- Melihat jadwal kosong & jadwal yang sudah dibooking.
- Membuat, mengubah, atau membatalkan booking (sesuai aturan).
- Admin mengelola data lapangan, jam operasional, dan seluruh booking.

## 📦 Tech Stack

**Backend (folder `backend/`):**

- PHP 8.2
- Laravel 12
- MySQL / MariaDB
- Composer

**Frontend (folder `frontend/`):**

- Vue 3
- Vite
- Tailwind CSS (v4)
- Axios (komunikasi dengan API Laravel)

---

## 📁 Struktur Folder

Struktur utama repo:

```bash
App-BokingLapangan/
├── backend/     # Project Laravel (API & business logic)
└── frontend/    # Project Vue + Vite + Tailwind (UI)

backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   ├── BookingController.php
│   │   │   └── CourtController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Court.php
│   │   └── Booking.php
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── api.php
│   └── web.php
└── .env.example

frontend/
├── src/
│   ├── api/           # konfigurasi axios / API client
│   ├── assets/
│   ├── components/
│   │   ├── auth/
│   │   ├── layout/
│   │   └── booking/
│   ├── views/
│   │   ├── LoginView.vue
│   │   ├── RegisterView.vue
│   │   ├── DashboardView.vue
│   │   └── BookingView.vue
│   ├── router/
│   │   └── index.js
│   └── main.js
└── index.html
