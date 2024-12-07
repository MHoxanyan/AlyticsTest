# Инструкция по запуску

```bash
  git clone -b realization https://github.com/MHoxanyan/AlyticsTest.git &&
  cd AlyticsTest &&
  mv .env.example .env &&
  docker compose up -d &&
  docker exec -it alyticstest-laravel.test-1 bash 
```

## Внутри контейнера 

```bash
    composer install && 
    php aritsan key:generate &&
    php artisan migrate --force &&
    npm i &&
    npm run build
```


### Интерфейс достаточно простой чтобы описать в документации

###### Прошу понять и простить использование livewire я сам недолюбливаю его но для быстрого создания простого и удобного интерфейса самое то

