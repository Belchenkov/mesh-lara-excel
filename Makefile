init: docker-down docker-build docker-up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

test:
	docker-compose exec api-php-cli vendor/bin/phpunit

queue:
	docker-compose exec api-php-cli php artisan queue:work

db-migrate:
	docker-compose exec api-php-cli php artisan migrate

db-migrate-seed:
	docker-compose exec api-php-cli php artisan migrate --seed

db-refresh:
	docker-compose exec api-php-cli php artisan migrate:refresh --seed

queue-work:
	docker-compose exec api-php-cli php artisan queue:work

parse-excel:
	docker-compose exec api-php-cli php artisan parse:excel

clear-count-rows:
	docker-compose exec api-php-cli php artisan clear:count-rows

restart-parse: db-refresh clear-count-rows
