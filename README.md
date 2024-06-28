# How to get the project running

### Requirements
- PHP 8.*
- Composer
- Docker
- NPM

### Fetch required dependencies
1. Open Terminal inside the project-folder
2. Install Composer-Packages
```bash
composer install
```
3. Install Node-Packages
```bash
npm install
```


## Dev Environment
### Setup a Database-Server

1. Open Terminal inside the project-folder
2. Run following command
```bash
docker compose up -d
````
3. Rename the `.env.example` to `.env`

> This compose file has phpmyadmin included if you don't need it remove the whole block

### Start Dev-Server
1. Open Terminal inside the project-folder
2. Make sure Docker is running 
3. To start project run this:
```bash
php artisan serve
````

```bash
npm run dev
```

## Production Deployment

The Dockerfile is incomplete and might change in the future. Right now you'll need to configure the Database yourself.

It is recommended to look at the config-docs of Laravel to understand how it works.

### Docker Deployment

Run this
```bash
docker compose up -d
```