# Sistema de Gestión de Tickets

Sistema de gestión de tickets (helpdesk) desarrollado con Laravel 12, Jetstream (Livewire) y Tailwind CSS 4.

**Stack:** PHP 8.4 · Laravel 12 · Livewire 3 · Tailwind CSS 4 · PostgreSQL 17


## Configuración

Variables de entorno en `.env`:

| Variable | Descripción | Default |
|----------|-------------|---------|
| APP_PORT | Puerto de la aplicación | 8180 |
| VITE_HOST | IP/host para acceso remoto | localhost |
| VITE_PORT | Puerto de Vite | 5172 |
| DB_DATABASE | Nombre de la base de datos | *requerido* |
| DB_USERNAME | Usuario de la base de datos | *requerido* |
| DB_PASSWORD | Password de la base de datos | secret |
| FORWARD_DB_PORT | Puerto externo de PostgreSQL | 54320 |
| REGISTRATION_ENABLED | Habilitar registro de usuarios | true |


### 1. Instalar dependencias de Composer

```bash
docker run --rm -v "$(pwd):/app" -w /app composer install
```

### 2. Configurar entorno

```bash
cp .env.example .env
chmod -R 775 storage/* bootstrap/cache
```

### 3. Construir y levantar contenedores

```bash
docker compose up -d --build
```

### 4. Configurar aplicación

```bash
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test php artisan migrate --seed
```

### 5. Instalar frontend y compilar

```bash
docker compose exec laravel.test npm install
docker compose exec laravel.test npm run build
```
