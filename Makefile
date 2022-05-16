up: docker-up

init: docker-down docker-pull docker-build docker-up composer-install migrate

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

cli:
	docker-compose run --rm grader-php-cli php bin/app.php

composer-install:
	docker-compose run --rm grader-php-cli composer install

controller:
	docker-compose run --rm grader-php-cli symfony console make:controller $(name)

entity:
	docker-compose run --rm grader-php-cli symfony console make:entity $(name)

migration:
	docker-compose run --rm grader-php-cli symfony console make:migration

migrate:
	docker-compose run --rm grader-php-cli symfony console doctrine:migrations:migrate -n

database:
	docker exec -it grader-database psql -U main
	main

crud:
	docker-compose run --rm grader-php-cli symfony console make:admin:crud