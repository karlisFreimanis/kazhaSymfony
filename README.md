# Template setup

### env
```
cp -a .docker/.env.dist .docker/.env
```
```
vim .docker/.env
```

### Installation
```
cd .docker/
```
```
docker compose up --build -d
```
```
docker exec -it {PROJECT_NAME}_php /bin/sh
```
```
composer install
```
```
symfony-console doctrine:migrations:migrate
```

### Api docs
```
http://127.0.0.1:{NGINX_PORT}/api/doc
```

### Tests
phpunit.xml.dist
```
php vendor/bin/phpunit --coverage-html coverage
```

### Logs
```
tail -f -n 100 var/log/payment.log
```

### Console
```
symfony-console
```

### Queue
```
symfony-console messenger:consume -vv
```


