# API-SITE-FILMES

## Link para obter a chave da API do TMDB

Acesse https://www.themoviedb.org

Crie uma conta ou faça login

Solicite uma chave de API em https://www.themoviedb.org/settings/api 

Copie a chave gerada e cole no seu .env como TMDB_API_TOKEN

## Como rodar o projeto localmente com Docker

```
git clone https://github.com/JuanFariasGit/api-sistema-biblioteca.git

cd api-sistema-biblioteca

cp .example.env .env 

# configure o TMDB no .env passando seu token adquirido para TMDB_API_TOKEN=

# configure o DB no .env

# DB_CONNECTION=mysql
# DB_HOST=mariadb
# DB_PORT=3306
# DB_DATABASE=api_filmes
# DB_USERNAME=root
# DB_PASSWORD=root

docker compose up -d

docker compose exec app php artisan key:generate

docker compose exec mariadb mysql -u root -p"root" -e "CREATE DATABASE IF NOT EXISTS api_filmes"

docker compose exec app php artisan migrate
```

### API disponível em http://localhost:8080

## Indicação de onde está implementado o CRUD

Rotas: routes/api.php

Controller: app/Http/Controllers/FavoriteController.php, app/Http/Controllers/TmdbController.php 

Model: app/Models/Favorite.php

Migration: database/migrations/2025_08_03_133618_create_favorites_table.php

Testes: tests/Feature/FavoriteControllerTest.php
