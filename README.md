# React.js + Laravel REST API Fullstack App

Fullstack web application built using **React.js** for the frontend and **Laravel** for the backend REST API. It demonstrates how to structure a real-world project with separate repositories for client and server, RESTful API integration, authentication, responsive UI, and modern UX features.

---

## Live Demo

Frontend: [https://frapi.get-virtual-admin.com](https://frapi.get-virtual-admin.com)
Backend API: [https://rapi.get-virtual-admin.com](https://rapi.get-virtual-admin.com)

---

## Repositories

This project is divided into two repositories:

🔹 **Frontend (React.js):**  
GitHub: [https://github.com/MuhammadZulhusni/Frontend-React-App](https://github.com/MuhammadZulhusni/Frontend-React-App)

🔹 **Backend API (Laravel):**  
GitHub: [https://github.com/MuhammadZulhusni/Backend-Laravel-Api](https://github.com/MuhammadZulhusni/Backend-Laravel-Api)

---

## Default Login Details
### Admin Login
- **Email:** admin@gmail.com
- **Password:** password

---

## Features Overview

### Backend (Laravel REST API)
- RESTful API using Laravel
- Connected to a real MySQL database
- Laravel Passport for API authentication
- Laravel Jetstream for authentication scaffolding
- Admin panel integration
- Contact form handling
- API error/failure handling
- Fully deployable on shared/VPS server

### Frontend (React.js)
- Consumes Laravel REST API via Axios
- Authentication using access tokens from Laravel Passport
- Page animations and transitions
- Loader and API error states
- React plugins and modular architecture
- Responsive layout (mobile-first)
- Contact form integrated with backend API

---

## Tech Stack

| Frontend        | Backend       | Tools / Services |
|-----------------|---------------|------------------|
| React.js        | Laravel 12+    | Laravel Passport |
| Tailwind / Bootstrap | MySQL    | Laravel Jetstream |
| React Router    | REST API       | Axios             |
| Vite / Webpack  | PHP 8+         | GitHub / Git      |

---

## Local Development Setup

### 1. Clone Repositories

```bash
# Clone Backend (Laravel)
git clone https://github.com/your-username/laravel-api.git

# Clone Frontend (React)
git clone https://github.com/your-username/react-frontend.git
```

---

### 2. Backend Setup (Laravel)

```bash
cd project-name
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan passport:install
php artisan serve
```

---

### 3. Frontend Setup (React.js)

```bash
cd react-frontend
npm install
npm run dev
```

> Make sure to update the API URL in your React `.env` file:
```
VITE_API_BASE_URL=http://127.0.0.1:8000/api
```

---

## Authentication Flow

- Backend uses **Laravel Passport** to issue access tokens
- Frontend stores access tokens securely (e.g., in localStorage or HttpOnly cookies)
- Protected routes and API calls require valid token
- Users can register, login, logout, and access secured API endpoints

---

