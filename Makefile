#!make
build:
	@cd ./App && cp .env.example .env
	@make initial

initial:
	#Subiendo App y Nginx
	@docker-compose --env-file ../enviroment/.env up -d --build

down-all:
	#Parar App y Nginx
	@docker-compose --env-file ../enviroment/.env down --remove-orphans