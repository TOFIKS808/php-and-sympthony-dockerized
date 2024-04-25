enter::
	docker-compose exec php /bin/bash

enter-postgres::
	docker-compose exec postgres /bin/bash

phpunit::
	docker-compose exec php ./vendor/bin/phpunit

up::
	docker-compose up -d

down::
	docker-compose down

build::
	$(MAKE) down || true
	docker-compose rm -f || true
	docker-compose up --build -d


chown::
	sudo chown -R $(USER):$(USER) src/ tests/ bin/ composer.* vendor/