# Rebuilds containers prepares the database
init: rebuild composer-install fresh-migrate app-key-generate db-seed passport-install passport-passport-keys

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
db-seed:
	docker exec -t  server-php  php artisan db:seed
passport-install:
	docker exec -t  server-php  php artisan passport:install
passport-passport-keys:
	docker exec -t  server-php  php artisan passport:keys --force

