🐳 Docker: PHP 7.4/ MySQL/ Nginx/ Symfony 5


This is a complete stack for running Symfony 5 into Docker containers.

4 containers:
- nginx
- php 7.4
- MySQL
- PhpMyAdmin

Installation
  Clone this rep.

Run docker-compose build
Run docker-compose up -d

Run docker exec -it {{FOLDER_NAME}}_php_1 bash
Run composer install into container

Use this value for the DATABASE_URL environment variable of Symfony:
DATABASE_URL=mysql://root:root@mysql:3306/{{NAME_DB}}

You could change the name, user and password of the database in the env file at the root of the project.
