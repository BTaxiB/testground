SHELL := /bin/bash
SELENIUM_SERVER_LIB := selenium-server-4.10.0.jar
SELENIUM_PORT := 3456
TAG := v1.0

start:
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
