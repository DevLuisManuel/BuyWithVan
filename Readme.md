# Prueba Técnica

## Desarrollador Luis Manuel Zuñiga Moreno

La siguiente parte del proceso consiste en un ejercicio práctico para poder evaluar tu coding:

| #   | Sección                                                                                         |
|-----|-------------------------------------------------------------------------------------------------|
| 1   | Crea un proyecto laravel                                                                        |
| 2   | Usa este API para cargar datos: [https://jsonplaceholder.typicode.com/][PlGh]                   |
| 3   | Crea un comando que inserte todos los usuarios en una base de datos                             |
| 4   | Crea un comando que inserte todos los posts                                                     |
| 5   | Programa un task que corra cada hora que seleccione un post aleatoriamente y cree un comentario |
| 6   | Crea una vista que enseñe a todos los usuarios                                                  |
| 7   | BONUS: Crea un vista de usuario que enseñe todos sus posts                                      |
| 8   | BONUS: Usa TDD para desarrollar el proyecto                                                     |

## Consideraciones.

- El proyecto esta desarrollado para usarse en Docker.
- Si no se desea usar docker para poder correrlo, se debe de ir a la carpeta ./App/ y
  ejecutar [php artisan serve && php artisan migrate].
- Para poder ver la vista de listado de usuarios con sus posts, seria acceder a: http://{{HOST_OWN}}
- El proyecto creado tiene unos test de ejecucion de comandos, las cuales se encuentran en la carpeta tests, y se pueden ejecutar, haciendo php artisan test.

## Comandos

| Comando         | Descripción                                                                                                                                    |
|-----------------|------------------------------------------------------------------------------------------------------------------------------------------------|
| user:command    | Comando que sirve para agregar usuarios activos de la plataforma: [https://jsonplaceholder.typicode.com/][PlGh]                                |
| post:command    | Comando que sirve para agregar Posts activos de la plataforma: [https://jsonplaceholder.typicode.com/][PlGh]                                   |
| post:command -C | Comando que sirve para seleccionar un post aleatorio y agregarle un comentario en la plataforma: [https://jsonplaceholder.typicode.com/][PlGh] |

## Stack Tech

Para desarrollar esta prueba, se uso:

- [PHP 8.1]
- [Laravel 9]
- [Docker]
- [Docker-compose]
- [PhpStorm]

**Muchas gracias**
