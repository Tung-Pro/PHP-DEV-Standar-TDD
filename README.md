Nguyễn Văn Tùng

PHP-DEV-Standar-TDD

## Getting Started
    `git clone https://github.com/Tung-Pro/PHP-DEV-Standar-TDD.git` 
    
    php artisan serv
    
    npm run dev

## Tools/commands used

### Create Migration:

    php artisan make:migration create_tasks_table
    php artisan make:migrate

### Tạo Model và Controller:

    php artisan make:model Task
    php artisan make:controller Task

### Create Form Request Validation

    php artisan make:request CreateTaskRequest
    php artisan make:request UpdateTaskRequest

### Create Factory and Seed dữ liệu mẫu

    php artisan make:factory TaskFactory
    php artisan tinker
    App\Models\Task::factory(100)->create()

### Creating feature Test

    php artisan make:test CreateNewTaskTest
    php artisan make:test DeleteTaskTest
    php artisan make:test EditTaskTest
    php artisan make:test GetListTaskTest
    php artisan make:test ViewTaskTest

### Create tasks

    cd resources/views/tasks
    mkdir create.blade.php
    mkdir edit.blade.php
    mkdir index.blade.php
    mkdir show.blade.php

### Install Laravel UI and Auth

    composer require laravel/ui
    php artisan ui vue --auth
    npm install; npm run dev

## Run TEST

    php artisan test --filter test

## Run
List Task

![image](https://github.com/user-attachments/assets/650f8714-0b98-4a3f-bfcb-65a967bc1b4d)

View Task

![image](https://github.com/user-attachments/assets/87a2122c-b893-41f6-bdf2-bb0291a4343e)

Edit Task

![image](https://github.com/user-attachments/assets/e4ac2d67-5a5e-4594-a114-16328d896c84)



    
