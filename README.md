<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Laravel-8-Project-From-Scratch
A Laravel 8 project that has all essential and basics tools which can help you to make your future projects easily. 

# Project Description
In this project, we will build a university platform which has two diffrent users: the Admin user and the Students user, and which of those has his own interfaces. The Admin can add, update, delete students, while students can check out their informations as well as download them as a PDF file and add their own images.

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

