OS := $(shell uname)
ARTISAN := php artisan
NODE := npm # or yarn
DC := docker-compose exec
MYSQL := $(DC) app
SAIL := ./vendor/bin/sail

setup: env keygen deps up migrate seeds chmod
start: up node-dev
build: env deps up node-build

restart: down up

up:
	$(SAIL) up -d --build

down:
	$(SAIL) down

node-dev:
	$(NODE) run dev

node-build:
	$(NODE) run build

serve:
	$(ARTISAN) serve

# DB commands
migrate:
	$(SAIL) artisan migrate

refresh:
	$(SAIL) migrate:refresh

fresh:
	$(SAIL) migrate:fresh

seeds:
	$(SAIL) db:seed

# Dev
env:
	cp .env.example .env

keygen:
	$(ARTISAN) key:generate

deps:
	composer install
	$(NODE) install

optimize:
	$(ARTISAN) optimize:clear

chmod:
	sudo chmod -R 777 storage


schedule:
	$(ARTISAN) schedule:run

routes:
	$(ARTISAN) route:list

# Tests
test:
	$(ARTISAN) test

# Code style
phpcs:
	./vendor/bin/phpcs --standard=./phpcs.xml

phpcbf:
	./vendor/bin/phpcbf --standard=./phpcs.xml
