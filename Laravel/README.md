# Ticket System

### 1. Run docker-compose

```bash
docker compose up -d
```

### 2. Copy .env

```bash
cp .env.example .env
chmod -R 775 storage/* bootstrap/cache
```

### 3. Generate key application

```bash
php artisan key:generate
```

### 4. Run migrations and seeders

```bash
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test php artisan migrate --seed
```