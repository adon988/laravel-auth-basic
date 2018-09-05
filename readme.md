## About this project

Quick and easy to generate a laravel 5.6 framework with auth api

## Init Project

```
composer update
```

Maybe you should copy .env.example to .env, and setup database connection or relative local evn parameters.

## Migration

```
php artisan migrate
```

## Create auth secret key

```
php artisan jwt:secret
```

Just that.