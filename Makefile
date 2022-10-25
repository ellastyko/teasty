OS := $(shell uname)
DC := docker-compose exec
ARTISAN := php artisan
NODE := npm # or yarn
APP := $(DC) app
SSH := $(APP) bash
SAIL := ./vendor/bin/sail

setup: env keygen deps start migrate seeds chmod
good: deps clear refresh seeds node-dev
build: env deps start migrate node-build

restart: stop start

start:
	@$(SAIL) up -d --build

stop:
	@$(SAIL) down

node-dev:
	@$(NODE) run dev

node-build:
	@$(NODE) run build

ssh:
	@$(APP) bash

# DB commands
migrate:
	@$(APP) $(ARTISAN) migrate

refresh:
	@$(APP) $(ARTISAN) migrate:refresh

fresh:
	@$(APP) $(ARTISAN) migrate:fresh

seeds:
	@$(APP) $(ARTISAN) db:seed

truncate:
	@$(APP) $(ARTISAN) db:wipe

# Dev
env:
	@cp .env.example .env

keygen:
	$(ARTISAN) key:generate

deps:
	@composer install
	@$(NODE) install

clear:
	@$(ARTISAN) optimize:clear

chmod:
	@sudo chmod -R 777 storage

frontend:
	@$(ARTISAN) frontend:translations && $(ARTISAN) frontend:validation


schedule:
	$(ARTISAN) schedule:run

queue:
	@$(ARTISAN) queue:work

routes:
	$(ARTISAN) route:list

# Tests
test:
	$(ARTISAN) test

# Code style
phpcs:
	@./vendor/bin/phpcs --standard=./phpcs.xml

phpcbf:
	@./vendor/bin/phpcbf --standard=./phpcs.xml

phpmd:
	sudo ./vendor/bin/phpmd app xml phpmd.xml  --reportfile reports/phpmd-report.xml
