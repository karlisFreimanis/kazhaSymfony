# Template setup

### env
```
vim .docker/.env
```

### Installation
```
cd .docker/

docker compose up --build -d

docker exec -it {PROJECT_NAME}_php /bin/sh

composer install
```

### Api docs
```
http://127.0.0.1/api/doc
```

### Tests
phpunit.xml.dist
```
php vendor/bin/phpunit
```


