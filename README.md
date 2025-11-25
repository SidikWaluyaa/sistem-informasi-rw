
# Sistem Informasi RW

![Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg){:width="200"}

[![Laravel 10](https://img.shields.io/badge/Laravel-10.x-orange.svg)](https://laravel.com)
[![PHP 8.2](https://img.shields.io/badge/PHP-8.2-blue.svg)](https://www.php.net/releases/8_2_0.php)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

---

## 📖 Project Overview

**Sistem Informasi RW** is a modern web application built with **Laravel 10** that enables RW (neighbourhood) administrators to manage community data, announcements, media galleries, and resident profiles. The UI follows a premium, responsive design with dark‑mode support and smooth micro‑animations.

---

## 📚 Table of Contents

- [Features](#features)
- [Architecture & Tech Stack](#architecture--tech-stack)
- [Screenshots](#screenshots)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Schema Overview](#database-schema-overview)
- [Testing](#testing)
- [Deployment (Docker)](#deployment-docker)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## ✨ Features

- **Galeri** – Upload, categorize, and showcase photos of community events.
- **Berita** – Publish news articles and announcements with rich text editor.
- **Struktur** – Visualize the organisational chart of the RW committee.
- **Profil Warga** – Manage resident profiles, contact information, and roles.
- **Responsive Design** – Works flawlessly on desktop, tablet, and mobile devices.
- **Dark Mode** – Automatic theme switching based on user preference.
- **Role‑Based Access Control** – Admins manage content; residents view their own profile.
- **API Ready** – JSON endpoints for mobile or third‑party integration (future work).

---

## 🏗️ Architecture & Tech Stack

| Layer | Technology |
|-------|------------|
| **Backend** | Laravel 10 (PHP 8.2), Eloquent ORM, Laravel Sanctum (API auth) |
| **Frontend** | Blade templates, Tailwind‑CSS (custom utilities), Alpine.js for interactivity |
| **Database** | MySQL / MariaDB |
| **Testing** | PHPUnit, Laravel Dusk (browser testing) |
| **Containerisation** | Docker & Docker‑Compose |
| **CI/CD** | GitHub Actions (run tests, lint, build assets) |

---

## 📸 Screenshots

> *Replace the placeholders with actual screenshots of your application.*

![Dashboard Screenshot](https://via.placeholder.com/800x400?text=Dashboard+Screenshot)
![Galeri Page](https://via.placeholder.com/800x400?text=Galeri+Page)

---

## 🛠️ Installation

### Prerequisites

- PHP **≥ 8.2**
- Composer
- Node.js **≥ 18** (npm or Yarn)
- MySQL / MariaDB
- Git
- Docker (optional, for containerised setup)

### Steps (Local Development)

```bash
# 1. Clone the repository
git clone https://github.com/SidikWaluyaa/sistem-informasi-rw.git
cd sistem-informasi-rw

# 2. Install PHP dependencies
composer install

# 3. Install front‑end assets
npm install && npm run dev

# 4. Set up environment file
cp .env.example .env
php artisan key:generate

# 5. Configure database in .env and run migrations
php artisan migrate --seed

# 6. Serve the application
php artisan serve
```

The app will be available at `http://127.0.0.1:8000`.

---

## ⚙️ Configuration

| Variable | Description |
|----------|-------------|
| `APP_ENV` | `local` for development, `production` for live site |
| `APP_DEBUG` | `true` (dev) or `false` (prod) |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | Database host (e.g., `127.0.0.1`) |
| `DB_DATABASE` | Database name |
| `DB_USERNAME` | Database user |
| `DB_PASSWORD` | Database password |
| `MAIL_MAILER` | Mail driver (`smtp`, `mailgun`, etc.) |
| `CACHE_DRIVER` | `file` (dev) or `redis` (prod) |
| `QUEUE_CONNECTION` | `sync` (dev) or `redis` |

Adjust any additional environment variables as needed for your infrastructure.

---

## 🗂️ Database Schema Overview

- **users** – Laravel default users table (admin & resident accounts).
- **galeris** – Stores image metadata (`title`, `description`, `path`).
- **beritas** – News articles (`title`, `content`, `published_at`).
- **strukturs** – Hierarchical representation of RW committee members.
- **wargas** – Resident profiles (`name`, `address`, `phone`, `photo`).

Relationships are defined via Eloquent models with appropriate foreign keys.

---

## 🧪 Testing

```bash
# Run unit & feature tests
php artisan test

# Run browser tests (requires Chrome/Chromium)
php artisan dusk
```

Continuous Integration runs these tests on every push via GitHub Actions.

---

## 🚀 Deployment (Docker)

A minimal `docker-compose.yml` is provided for production‑grade deployment.

```yaml
version: "3.8"
services:
  app:
    image: php:8.2-fpm
    container_name: rw_app
    working_dir: /var/www/html
    volumes:
      - ./:/var/www/html
    environment:
      - APP_ENV=production
      - APP_DEBUG=false
    depends_on:
      - db
  web:
    image: nginx:alpine
    container_name: rw_web
    ports:
      - "80:80"
    volumes:
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
      - ./:/var/www/html
    depends_on:
      - app
  db:
    image: mysql:8.0
    container_name: rw_db
    environment:
      MYSQL_ROOT_PASSWORD: secret
      MYSQL_DATABASE: rw_db
      MYSQL_USER: rw_user
      MYSQL_PASSWORD: secret
    volumes:
      - db_data:/var/lib/mysql
volumes:
  db_data:
```

After configuring the `.env` to match the Docker service names (`DB_HOST=db`), run:

```bash
docker-compose up -d
```

The application will be reachable at `http://localhost`.

---

## 📦 Usage

- Open `http://127.0.0.1:8000` (or the Docker URL) in a browser.
- **Admin** users log in via `/login` and access the dashboard to manage Galeri, Berita, Struktur, and Warga.
- **Residents** can view their personal profile at `/warga/profil/{id}`.
- API endpoints (future) will be available under `/api/v1/...`.

---

## 🤝 Contributing

We welcome contributions! Follow these steps:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature`.
3. Commit your changes with clear, descriptive messages.
4. Push to your fork and open a Pull Request.
5. Ensure all tests pass (`php artisan test`).

Please adhere to the [Laravel coding standards](https://laravel.com/docs/10.x/contributions#coding-style) and run `phpcs` locally before submitting.

---

## 📄 License

This project is open‑source and licensed under the **MIT License**. See the `LICENSE` file for details.

---

## 📞 Contact

For questions, suggestions, or support, open an issue on GitHub or contact the maintainer at `sidik@example.com`.

---
