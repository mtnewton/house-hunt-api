# House Hunt API

## Getting Started
```
touch database/database.sqlite
php artisan migrate
php -S localhost:8080 -t public
```

## First User
```
php artisan create:user {name} {email} {password}
```

## Get Your api_token
```
POST localhost:8080/auth
{
    "email" => {email},
    "password" => {password}
}

Response
{
    "api_token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```

## Call The API
```
Authoization: Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

GET /me
```