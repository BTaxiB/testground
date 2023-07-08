SHELL := /bin/bash
SELENIUM_PORT := 3456
TAG := v1.0

start: # start infrastructure
	docker compose up -d
stop:
	docker compose down
nginx:
	docker exec -it auto-web-srv-${TAG} bin/bash
selenium:
	docker exec -it auto-selenium-srv-${TAG} bin/bash
mysql:
	docker exec -it auto-mysql-db-${TAG} bin/bash
install:
	composer i


#https://tech.osteel.me/posts/how-to-build-and-distribute-beautiful-command-line-applications-with-php-and-composer
