# API-SITE-FILMES

## Link para obter a chave da API do TMDB

Acesse https://www.themoviedb.org/settings/api

Crie uma conta ou faça login

Solicite uma chave de API (tipo "Developer")

Copie a chave gerada e cole no seu .env como TMDB_API_TOKEN

## Como rodar o projeto localmente com Docker

```
git clone https://github.com/JuanFariasGit/api-sistema-biblioteca.git

cd api-sistema-biblioteca

cp .example.env .env 

# no arquivo .env adicione o seu token da API do TMDB em TMDB_API_TOKEN=

docker compose up -d

docker compose exec app php artisan key:generate

docker compose exec mariadb mysql -u root -p"root" -e "CREATE DATABASE IF NOT EXISTS api_filmes"

docker compose exec app php artisan migrate
```

## Indicação de onde está implementado o CRUD

Rotas: routes/api.php

Controller: app/Http/Controllers/FavoriteController.php, app/Http/Controllers/TmdbController.php 

Model: app/Models/Favorite.php

Migration: database/migrations/2023_01_01_create_favorites_table.php

Testes: tests/Feature/FavoriteTest.php
