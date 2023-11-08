# Test

## Содержание

[Установка](#установка)

## Установка
```bash
$ git clone git@github.com:Narek02161/trading_analytics_test.git
$ cp .env.example .env
$ chmod o+w .env
$ make init
```

## Запуск с нуля с подготовленной базой
```bash
make init
```

## Остановка приложения
``` bash
make down
```

## Доступы к бд
**БД:** `test`

**Юзер:** `test`

**Пароль:** `mysecretpassword`

**Порт:** `5432`

## Версии
**PHP-FPM:** 8.1.9 под Alpine 3.16

**PgsqlDB:** 14.4 под Alpine 3.16

**Nginx:** 1.23.1 под Alpine 3.16
