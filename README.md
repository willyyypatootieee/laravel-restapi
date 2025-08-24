
# Laravel REST API (Dockerized)

This project is a Laravel 12 REST API running in Docker with MySQL and phpMyAdmin. You can also use SQLite for local development.

---

## 🆕 Fresh Install (SQLite Example)

If you want to use SQLite for local development, follow these steps to avoid common errors:

### On your host (for quick testing, not recommended for Docker):

```sh
php artisan key:generate
touch database/database.sqlite
php artisan migrate
# If you see an error about missing database file, create it as above and rerun migrate.
```

### Inside Docker (recommended):

```sh
docker compose exec web php artisan key:generate
docker compose exec web touch /var/www/html/database/database.sqlite
docker compose exec web php artisan migrate
```

**If you get an error like:**
> Database file at path [/var/www/html/database/database.sqlite] does not exist.

Make sure you create the file inside the container, not just on your host:
```sh
docker compose exec web touch /var/www/html/database/database.sqlite
```

---

## 🚀 Quick Start

### Prerequisites
- Docker & Docker Compose

### Setup Steps
1. **Clone the repository:**
	```sh
	git clone <your-repo-url>
	cd laravel-restapi
	```
2. **Copy the example environment file:**
	```sh
	cp .env.example .env
	```
3. **Start the containers:**
	```sh
	docker compose up -d
	```
4. **Install Composer dependencies:**
	```sh
	docker compose exec web composer install
	```
5. **Generate the Laravel app key:**
	```sh
	docker compose exec web php artisan key:generate
	```
6. **Create the database:**
	- For MySQL (default): No action needed, database is created by Docker.
	- For SQLite (optional):
		```sh
		docker compose exec web touch /var/www/html/database/database.sqlite
		```
		Make sure your `.env` has:
		```
		DB_CONNECTION=sqlite
		DB_DATABASE=/var/www/html/database/database.sqlite
		```
7. **Run migrations:**
	```sh
	docker compose exec web php artisan migrate
	```
8. **Start the Laravel development server:**
	```sh
	docker compose exec web php artisan serve --host=0.0.0.0 --port=8000
	```
9. **Visit your app:** [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🐳 Useful Docker & Laravel Commands

- Start containers: `docker compose up -d`
- Stop containers: `docker compose down`
- View logs: `docker compose logs -f`
- Run artisan: `docker compose exec web php artisan <command>`
- Install Composer deps: `docker compose exec web composer install`
- Shell in container: `docker compose exec web bash`
- Access phpMyAdmin: [http://127.0.0.1:8081](http://127.0.0.1:8081)
	- Server: `db` | Username: `user` | Password: `pass`

---

## 🛠️ Troubleshooting

**Missing app key:**
> Illuminate\Encryption\MissingAppKeyException: No application encryption key has been specified.

Run:
```sh
docker compose exec web php artisan key:generate
```

**SQLite: Database file does not exist**
> Database file at path [/var/www/html/database/database.sqlite] does not exist.

Run:
```sh
docker compose exec web touch /var/www/html/database/database.sqlite
```

**No such table: sessions (or other table errors)**
> SQLSTATE[HY000]: General error: 1 no such table: ...

Run migrations:
```sh
docker compose exec web php artisan migrate
```

**File permissions (if you get permission errors):**
```sh
docker compose exec web chmod 664 /var/www/html/database/database.sqlite
```

---

## Database Notes

- **MySQL (default):**
	- Used in Docker by default. No manual setup needed.
- **SQLite (optional):**
	- Good for quick local development. Make sure to create the file inside the container and set the correct path in `.env`.
	- Example `.env` for SQLite in Docker:
		```
		DB_CONNECTION=sqlite
		DB_DATABASE=/var/www/html/database/database.sqlite
		```

---

For any issues, please open an issue in this repository.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
