# Lara Cron Excel

> Build Laravel 8 app for parse excel file to db (laravel 8, cron, redis, mariadb, rabbitmq)

### Get started:
```sh
git clone
```

```sh
Rename or copy .env.example file to .env
```
```sh
php artisan key:generate
```
```sh
make init
```

or

```sh
docker-compose up --build -d
```
```sh
Visit http://localhost:8000 in your browser
```

Run migrate
```sh
make db-migrate
```

Run queue
```sh
make queue-work
```

Restart parse file
```sh
make restart-parse
```
===================================
## Routes

Endpoint для получения rows
#### GET /api/all

<b>HEADERS</b>
```
Content-Type: application/json
Accept: application/json
User-Agent: *
```
====================================

Endpoint для загрузки файла 
#### POST /api/upload
<b>HEADERS</b>
```
Accept: application/json
User-Agent: *
```
<b>BODY</b>
 ```
{
    "file": File(xlsx)
}
