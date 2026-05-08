# 🎫 Ticket System

A support ticket management platform built with **Laravel 12**, **Livewire 3**, and **Laravel Jetstream**. Designed for teams that need a structured, role-based workflow to create, track, and resolve internal requests.

---

## ✨ Features

### 🎟️ Ticket Management
- Create tickets with title, description, category, priority, and status
- Auto-assigned default status and priority on creation
- Full ticket detail view with comment thread
- Ticket history log (audit trail of changes)
- Ticket assignment to users and groups

### 👥 Roles & Permissions

| Role  | Permissions |
|-------|-------------|
| **Admin** | Create tickets · View all tickets · Assign to users · Change status & priority · Comment on any ticket · Access management & configuration panels |
| **User** | Create tickets · View only their own tickets · Comment on their own tickets |

### ⚙️ Configuration
- Ticket **statuses**, **priorities**, and **categories** are fully configurable from the UI
- Each status and priority can have a custom colour assigned
- New entries can be added at any time beyond the defaults

### 📊 Admin Dashboard (Diabolo)
- Overview dashboard with summary cards
- Recent activity feed
- User management
- Job offers & posts sections
- Analytics panel

### 🔐 Authentication
- Powered by **Laravel Jetstream** + **Fortify**
- Two-factor authentication support
- Profile management
- Sanctum-based API tokens

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2+, Laravel 12 |
| Reactive frontend | Livewire 3 |
| Auth | Laravel Jetstream + Fortify + Sanctum |
| Database | PostgreSQL 17 |
| Frontend build | Vite + Tailwind CSS 3 + Chart.js |
| Containerisation | Docker (Laravel Sail) |
| Testing | PHPUnit 11 |

---

## 🚀 Installation

### Prerequisites

- Docker & Docker Compose

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/your-username/ticketing.git
cd ticketing/Laravel

# 2. Install PHP dependencies (via Docker, no local PHP needed)
docker run --rm -v "$(pwd):/app" -w /app composer install

# 3. Set up the environment file
cp .env.example .env
chmod -R 775 storage/* bootstrap/cache

# 4. Start the containers
docker compose up -d

# 5. Generate the application key
docker compose exec laravel.test php artisan key:generate

# 6. Run migrations and seed default data
docker compose exec laravel.test php artisan migrate --seed
```

The app will be available at [http://localhost:8280](http://localhost:8280).

---

## 🔑 Default Credentials

| Role  | Email           | Password |
|-------|-----------------|----------|
| Admin | admin@admin.com | password |
| User  | user@user.com   | password |

---

## 📋 Default Values

These are seeded automatically and can be extended from the configuration panel:

| Status     | Priority | Category  |
|------------|----------|-----------|
| Open       | Low      | RRHH      |
| In Process | Medium   | IT        |
| Resolved   | High     | Web       |
| Closed     | Critical | Marketing |

---

## ⚙️ Environment Variables

Key variables in `.env`:

```env
APP_NAME="Ticket System"
APP_URL=http://localhost:8280

# PostgreSQL (managed by Docker Compose)
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=ticketing
DB_USERNAME=sail
DB_PASSWORD=secret

# Queue and cache
QUEUE_CONNECTION=database
CACHE_STORE=database
```

---

## 🗂️ Project Structure

```
Laravel/
├── app/
│   ├── Actions/Fortify/     # Auth actions (register, password reset...)
│   ├── Http/
│   │   ├── Controllers/     # TicketController, ProfileController
│   │   └── Middleware/      # AdminMiddleware (role guard)
│   ├── Livewire/
│   │   ├── Diabolo/         # Admin dashboard components
│   │   └── Tickets/         # Create, Show, Details, History, ToolsTicket
│   ├── Models/              # Ticket, User, Group, TicketStatus, TicketPriority...
│   ├── Observers/           # TicketObserver (audit trail)
│   └── Policies/            # TicketPolicy, GroupPolicy
├── database/
│   ├── migrations/          # Full DB schema
│   └── seeders/             # Status, Priority, Category, Admin, Users...
├── resources/views/         # Blade templates
├── routes/web.php           # All application routes
└── docker-compose.yml       # Laravel Sail (PHP 8.4 + PostgreSQL 17)
```

---

## 🧪 Tests

```bash
docker compose exec laravel.test php artisan test
```

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).
