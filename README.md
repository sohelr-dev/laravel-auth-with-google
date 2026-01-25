# laravel-auth-with-google
# OAuth 2.0

A Laravel authentication system built with Blade, featuring manual signup/login and Google OAuth (Gmail).

---

## ✨ Features

* Traditional email & password signup/login
* Google OAuth (Gmail) signup/login using Laravel Socialite
* Blade-based UI
* Secure authentication flow
* Auto-login for existing Google users
* Clean & extendable structure

---

## 🛠 Tech Stack

* Laravel
* Blade Templates
* Laravel Socialite
* MySQL
* Bootstrap 

---

## 🚀 Installation

```bash
# Clone the repository
git clone https://github.com/sohelr-dev/laravel-auth-with-google.git

# Go to project directory
cd laravel-auth-with-google

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate
```

---

## 🔐 Google OAuth Setup

1. Go to **Google Cloud Console**
2. Create a new project
3. Enable OAuth credentials
4. Set Authorized Redirect URI:

```
http://your-app-url/auth/google/callback
```

Add credentials to `.env` file:

```env
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_REDIRECT_URI=http://your-app-url/auth/google/callback
```

---

## 🧩 Database Migration

```bash
php artisan migrate
```

---

## ▶️ Run the Project

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## 📸 Screenshots

> Screenshots will be added soon.
The following views are implemented:

* Signup form
* Login form
* Google sign-in button
* Dashboard

---

## 📄 License

This project is open-source and available under the MIT License.

---

## 👨‍💻 Author

**Sohel Rana**

---

⭐ If you find this project helpful, don’t forget to star the repository!
