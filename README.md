
# Setup Docker do Projeto SGCO com Laravel 9 com PHP 8

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/rsvieira70/sgco.git sgco
```

```sh
cd sgco/
```


Remova o versionamento
```sh
rm -rf .git/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=sgco
APP_URL=http://localhost:8989

DB_CONNECTION=pgsql
DB_HOST=post
DB_PORT=3306
DB_DATABASE=sgco
DB_USERNAME=actualy
DB_PASSWORD=******

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)
