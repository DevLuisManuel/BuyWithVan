#!make
initial:
	#Subiendo App y Nginx
	@docker-compose --env-file ../../enviroment/.env up -d --build

down-all:
	#Parar App y Nginx
	@docker-compose down --env-file ../../enviroment/.env --remove-orphans