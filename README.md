# Тестовое задание по laravel

## Для локального запуска нужно:
- В корне проекта создать файл .env идентичный файлу .env.example
- в папке `app/` создать файл .env идентичный файлу .env.example
- в корне проекта выполнить команду `docker-compose up -d --build`
- в контейнере `app` выполнить команду `composer install --dev`
- выполнить команды:
    - `php artisan orchid:install`
    - `php artisan migrate`
    - `php artisan orchid:admin admin admin@admin.com password`


Создать заказ можно по адресу `http://localhost:8888/`

Открыть панель администратора можно по адресу `http://localhost:8888/admin`, логин `admin@admin.com`, пароль `password`, оттуда можно просматривать и редактировать категории, товары и заказы
