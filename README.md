<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## CareMaster Laravel Test

Basic Laravel Vue App with Company and Employee CRUD

## Setup
- Create a database locally named `company_management`
- Pull Laravel/php project from `git clone https://github.com/kapilsapkota/CompanyManagement`.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- ( Optional ) Update the content of `.env` file with your local settings
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `npm install`
- Run `npm run dev`
- Run `php artisan key:generate`
- Run `php artisan migrate` -> check if the ENV variables are up-to-date
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan storage:link`
- Run `php artisan serve`

**You can now access your project at localhost:8000**

## If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate:fresh --seed`


## After new git pull/db reset:
- `php artisan migrate`
- `php artisan db:seed`

- `php artisan storage:link`
- (Optional) to link storage

Utils:

`php artisan route:list`

`php artisan storage:link`
