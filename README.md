# How to get the project running

## Requirements
- PHP 8.*
- Composer
- Docker

## Fetch required dependencies
1. Open Terminal inside the project-folder
2. Run following command
```bash
composer require vendor/package
```

## Run Docker
1. Open Terminal inside the project-folder
2. Run following command
```bash
docker compose up -d
````

> Note: You are responsible for your own database permissions. I recommend not using the database root

## Start Dev
1. Open Terminal inside the project-folder
2. Make sure Docker is running 
3. To start run this command
```bash
php artisan serve
````

