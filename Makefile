up: docker-up

init: docker-down docker-pull docker-build docker-up

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