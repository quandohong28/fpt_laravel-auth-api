### Basic Laravel 10.x Auth API

This is basic laravel 10.x authentication api

### I. How to run

```
1. Clone Repository

    $ git clone https://github.com/quandohong28/fpt_laravel-auth-api


2. Create App key

    $ cd fpt_laravel-auth-api
    $ cp .env.example .env
    $ php artisan key:generate


3. Install libraries and nessesary files

    $ composer i && npm i


4. Run

    $ php artisan serve
    $ npm run dev

```

### II. Test API - Postman

1. Register

- method: POST
- api: http://localhost:8000/api/register
- header

```
    "Content-Type: application/json"
```

- body

```
    "user": {
        "name": "Test User",
        "email": "testuser@gmail.com",
        "password": "123456789",
        "password_confirmation": "123456789",
    }
```

2. Login

- method: POST
- api: http://localhost:8000/api/login
- header: 

```
    "Content-Type: application/json"
```

- body:

```
    "user": {
        "email": "testuser@gmail.com",
        "password": "123456789",
    }
```

3. Logout

- method: POST
- api: http://localhost:8000/api/login
- authorization: Bearer Token: your_token
- header:

```
    "Content-Type: application/json"
```
