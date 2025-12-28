# Dev Note
## CLI
Laravel 프로젝트 생성

```bash
laravel new <project-name>
```

아파치에게 `storage`와 `bootstrap/cache` 디렉토리에 권한 부여
```bash
sudo chown -R $USER:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

Breeze 설치
```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

## DB
DB 마이그레이션

```bash
php artisan migrate
```

## Blade

## Logics
