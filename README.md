# Current State

The current changes of the developers have to be documented in the ["docs"](./docs/)

Schema for the Nameing is "MM-TT-User" for example "05-23-TeekunDev"


# How to get the project running

## Requirements
- PHP 8.*
- Composer
- Docker

## Fetch required dependencies
1. Open Terminal inside the project-folder
2. Install Composer-Packages
```bash
composer require vendor/package
```
3. Install Node-Packages
```bash
npm install
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
3. To start project run this:
```bash
php artisan serve
````

```bash
npm run dev
```

