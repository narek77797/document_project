# Rebuilds containers prepares the database
init: rebuild composer-install fresh-migrate app-key-generate

up:
	docker-compose -f docker-compose.yml up -d
down:
	docker-compose -f docker-compose.yml down --remove-orphans
rebuild:
	docker-compose -f docker-compose.yml up -d --build

composer-install:
	docker exec -t  server-php composer install
fresh-migrate:
	docker exec -t  server-php php artisan migrate:fresh
app-key-generate:
	docker exec -t  server-php php artisan key:generate

