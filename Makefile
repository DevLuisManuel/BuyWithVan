#!make
build:
	@cd ./App && cp .env.example .env
	@make initial
	@make migrate

initial:
	#Subiendo App y Nginx
	@docker-compose --env-file ../enviroment/.env up -d --build

down-all:
	#Parar App y Nginx
	@docker-compose --env-file ../enviroment/.env down --remove-orphans

migrate:
	@docker-compose --env-file ../enviroment/.env exec app php artisan createDatabase
	@docker-compose --env-file ../enviroment/.env exec app php artisan migrate