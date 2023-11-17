# Test

## Content

[Installation](#Installation)

## Installation
```bash
$ git clone git@github.com:narek77797/document_project.git
$ cp .env.example .env
$ chmod o+w .env
$ make init
```

## Starting from scratch with a prepared database
```bash
make init
```

## Stopping the application
``` bash
make down
```

## Database access
**DB:** `test`

**User:** `test`

**Password:** `mysecretpassword`

**Port:** `3306`

## Existing User

**email:** `adminuser@gmail.com`

**password:** `123456`

## Versions

**PHP-FPM:** 8.1.9 under Alpine 3.16

**MysqlDB:** 10.5

**Nginx:** 1.23.1 under Alpine 3.16
