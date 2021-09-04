# Laravel-Project-From-Scratch
A Laravel 8 project that has all essential and basics tools which can help you to make your future projects easily. 

# Full Laravel 8 documentation
[Laravel 8](https://laravel.com/docs/8.x/)

# All commands used in this project
### Installation:
> composer global require "laravel/installer"

### Creating project:
> laravel new project

### Running the application:
> php artisan serve

### Authentication Setup:
> composer require laravel/ui

### npm install (Node Package Manager):
> npm install
> npm run dev

### Routes list:
> php artisan route:list

### Creating controllers:
> php artisan make:controller MyController
> php artisan make:controller AdminController --resource

### Creating models:
> php artisan make:model MyModel
> 
> php artisan make:model User --migration
> 
> php artisan make:model User -m
> 
> php artisan make:model User --controller
> 
> php artisan make:model User -c
> 
> php artisan make:model User --seed
> 
> php artisan make:model User -s
> 
> php artisan make:model User -mcs
> 
> php artisan make:model User --all

### Creating seeders:
> php artisan make:seeder AdminUserSeeder

### Run seeder:
> php artisan db:seed --class=AdminUserSeeder

### Creating migrations:
> php artisan make:migration MyMigration

### Running migrations:
> php artisan migrate
> php artisan migrate:rollback
> php artisan migrate:refresh
> php artisan migrate:reset
> php artisan migrate:fresh

### Creating middlewares:
> php artisan make:middleware MyMiddleware

### Creating link between the public and storate folders:
> php artisan storage:link

### PDF package:
> composer require barryvdh/laravel-dompdf
