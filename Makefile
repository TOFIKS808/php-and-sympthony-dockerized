enter::
	docker-compose exec php /bin/bash

enter-postgres::
	docker-compose exec postgres /bin/bash

phpunit::
	docker-compose exec php ./vendor/bin/phpunit

up::
	mkdir -p volumes/log/nginx
	chmod -R 777 volumes/log
	docker-compose up -d

down::
	docker-compose down

build::
	$(MAKE) down || true
	docker-compose rm -f || true
	docker-compose up --build -d

logs::
	docker-compose logs -f

chown::
	sudo chown -R $(USER):$(USER) src/ tests/ bin/ composer.* vendor/

test-db::
	docker-compose exec php /bin/bash -c "APP_ENV=test ./bin/console d:d:d --force  --if-exists"
	docker-compose exec php /bin/bash -c "APP_ENV=test ./bin/console d:d:c"
	docker-compose exec php /bin/bash -c "APP_ENV=test ./bin/console d:s:c"

cs::
	docker-compose exec php ./vendor/bin/ecs

csf::
	docker-compose exec php ./vendor/bin/ecs --fix
