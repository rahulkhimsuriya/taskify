# taskify

This is task management app.

## Installation

### Prerequisites

-   To run this project, you must have PHP 7.4 installed.
-   You should setup a host on your web server for your local domain. For this you could also configure Laravel Homestead or Valet.

### Step 1

Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

```bash
git clone https://github.com/rahulkhimsuriya/taskify.git
cd taskify
composer install
npm install && npm run dev
```

### Step 2

Copy .env.example to .env
Setup Database. <a href="https://laravel.com/docs/7.x/database">Read more</a>

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE='taskify'
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3

Run Database Migration

```
php artisan migrate
```

### Step 4

Next, boot up a server and visit your site.

```
php artisan serve
```

### Thank you !
