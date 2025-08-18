## Database Migrations: Docker vs Host

**If using Docker (recommended):**

Run migrations inside the container to ensure the correct environment and file paths:

```sh
docker compose exec web php artisan migrate
```

**If running artisan on your host:**

Update your `.env`:

```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

This matches the file path as seen from your host, not from inside the container.

**Tip:** For MySQL, always use Docker and the provided `.env` settings.
## Useful Docker Commands & Examples

Here are some real-world Docker and Laravel commands used in this project:

- **Start all containers:**
	```sh
	docker compose up -d
	```
- **Stop all containers:**
	```sh
	docker compose down
	```
- **Rebuild the web container (after Dockerfile changes):**
	```sh
	docker compose build web
	```
- **Restart a single container (e.g., phpmyadmin):**
	```sh
	docker compose restart phpmyadmin
	```
- **View container logs:**
	```sh
	docker compose logs -f
	```
- **Run Laravel artisan commands:**
	```sh
	docker compose exec web php artisan <command>
	# Example: docker compose exec web php artisan migrate
	# Example: docker compose exec web php artisan config:clear
	# Example: docker compose exec web php artisan cache:clear
	# Example: docker compose exec web php artisan serve --host=0.0.0.0 --port=8000
	```
- **Install Composer dependencies:**
	```sh
	docker compose exec web composer install
	```
- **Access a shell in the web container:**
	```sh
	docker compose exec web bash
	```
- **Check PHP extensions in the container:**
	```sh
	docker compose exec web php -m | grep pdo
	docker compose exec web php -i | grep -i sqlite
	```
- **Check file permissions inside the container:**
	```sh
	docker compose exec web ls -l /var/www/html/database/
	docker compose exec web chmod 664 /var/www/html/database/database.sqlite
	```
- **Access phpMyAdmin:**
	Open [http://127.0.0.1:8081](http://127.0.0.1:8081) in your browser.
	- Username: root or user
	- Password: root or pass

These commands cover most development and debugging scenarios for a Laravel project running in Docker.
## Useful Docker Commands

All commands should be run from the project root.

- **Start all containers:**
	```sh
	docker compose up -d
	```
- **Stop all containers:**
	```sh
	docker compose down
	```
- **View container logs:**
	```sh
	docker compose logs -f
	```
- **Run Laravel artisan commands:**
	```sh
	docker compose exec web php artisan <command>
	# Example: docker compose exec web php artisan migrate
	```
- **Install Composer dependencies:**
	```sh
	docker compose exec web composer install
	```
- **Access a shell in the web container:**
	```sh
	docker compose exec web bash
	```
- **Access phpMyAdmin:**
	Open [http://127.0.0.1:8081](http://127.0.0.1:8081) in your browser.

# Laravel REST API Docker Setup

This project is a Laravel 12 REST API running in Docker with MySQL and phpMyAdmin.

## Getting Started

### Prerequisites
- Docker
- Docker Compose

### Setup
1. Clone the repository:
	```sh
	git clone <your-repo-url>
	cd laravel-restapi
	```
2. Copy the example environment file:
	```sh
	cp .env.example .env
	```
3. Start the containers:
	```sh
	docker compose up -d
	```
4. Start the Laravel development server:
	```sh
	docker compose exec web php artisan serve --host=0.0.0.0 --port=8000
	```
5. Visit your app at [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Database
- MySQL is available at `db:3306` inside Docker.
- phpMyAdmin is available at [http://127.0.0.1:8081](http://127.0.0.1:8081)
  - Server: `db`
  - Username: `user`
  - Password: `pass`

### Running Migrations
```sh
docker compose exec web php artisan migrate
```

### Useful Commands
- Clear config cache: `docker compose exec web php artisan config:clear`
- Clear app cache: `docker compose exec web php artisan cache:clear`

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
