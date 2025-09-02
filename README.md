# installation

1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. create database named student_crud and change in .env file 

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=student_crud
    DB_USERNAME=root
    DB_PASSWORD=
5. php artisan migrate --seed

