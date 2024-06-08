# Laravel API Demo

Create a Laravel API that demonstrates your proficiency with Laravel's job queues, database operations, migrations, and event handling.

# Installation

## Requirements
- docker
or
- PHP 8.2
- Composer
- MySQL latest
- Nginx latest (optional, you can use Laravel's built-in server)

## Steps
1. Copy the `.env.example` file to `.env` and update the port for Nginx
2. Run `docker compose up -d`
3. Run `docker compose exec app composer install`
4. Run `docker compose exec app php artisan key:generate`
5. Run `docker compose exec app php artisan migrate`

## Run tests
```bash
docker compose exec app php artisan test
```

## Test the API
```bash
curl -X POST http://localhost:8110/api/submission -d \
'{"name": "John Doe", "email": "john@example.com", "message": "Hello, World!"}' \
-H 'Content-Type: application/json'
```
or if you have jq intalled
```bash
curl -X POST http://localhost:8110/api/submission -d \
'{"name": "John Doe", "email": "john@example.com", "message": "Hello, World!"}' \
-H 'Content-Type: application/json' | jq
```

## non docker installation
1. Copy the `.env.example` file to `.env` and update the database credentials
2. Run `composer install`
3. Run `php artisan key:generate`
4. Run `php artisan migrate`
5. Run `php artisan serve`



