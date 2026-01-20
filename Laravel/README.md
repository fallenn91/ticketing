# Ticket System

### 1. Run docker-compose and install dependencies

```bash
docker run --rm -v "$(pwd):/app" -w /app composer install
```

### 2. Conf .env

```bash
cp .env.example .env
chmod -R 775 storage/* bootstrap/cache
```

### 3. Build docker

```bash
docker compose up -d
```

### 4. Generate key application

```bash
docker compose exec laravel.test php artisan key:generate
```

### 5. Run migrations and seeders

```bash
docker compose exec laravel.test php artisan migrate --seed
```

## User Login Test

| Role  | Email            | Password  |
|-------|------------------|-----------|
| Admin | admin@admin.com  | password  |
| User  | user@user.com    | password  |

## Authorizations

| Role  | Actions
|-------|--------------------------------|
| Admin | Can create tickets, view all tickets, Assign to other users, change Status and Priority, comment any ticket. |
| User  | Can create tickets, view just their tickets, comment their tickets. |

## Features

-**Status:** Open, In Process, Resolved, Closed
-**Priority:** Low, Medium, High, Critical
-**Category:** RRHH, It, Web


