# Инструкция по запуску

```bash
  git clone -b realization https://github.com/MHoxanyan/AlyticsTest.git &&
  cd AlyticsTest &&
  mv .env.example .env &&
  docker compose up -d &&
  docker exec -it alyticstest-laravel.test-1 bash 
```

## создать очередь в rabbitmq с названием default

[Rabbitmq](localhost:15672)
```
    login: guest
    password: guset
```

### Внутри контейнера 

```bash
    composer install && 
    php artisan key:generate &&
    php artisan migrate --force &&
    npm i &&
    npm run build
```

#### В некоторых случаях приходится перезапускать контейнер после установки зависимостей

```bash
    docker compose restart
```
 
##### Интерфейс достаточно простой чтобы описать в документации

[начать](http://0.0.0.0:80)

###### Прошу понять и простить использование livewire я сам недолюбливаю его но для быстрого создания простого и удобного интерфейса самое то

