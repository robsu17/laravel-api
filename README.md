# API Criptografia

Esse projeto é uma API feita usando **Laravel e Mysql**

Essa API foi desenvolvida durante desafio de php

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Database](#database)
- [Contributing](#contributing)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/robsu17/laravel-api
```

2. Instale as dependências do projeto:
```bash
composer install
npm install
```

4. Rode o container docker (desktop docker required [DOCKER DESKTOP](https://www.docker.com/products/docker-desktop/))
```bash
docker compose up -d --build
```

## Usage

1. Inicie a aplicação usando

```bash
php artisan serve
```
2. A API ficará acessível na url http://127.0.0.1:8000

## API Endpoints
API endpoints:

```markdown
GET /userData/list - Lista todos os dados dos usuários 
```
```json
{
    "count": 1,
    "usersData": [
        {
            "id": 1,
            "userDocument": "3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2",
            "creditCardToken": "fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe",
            "value": 1000
        },
}
```
```markdown
GET /userData/find/id - Busca um dado de um usuário pelo id
```
```json
{
    "id": 1,
    "userData": {
        "id": 1,
        "userDocument": "3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2",
        "creditCardToken": "fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe",
        "value": 1000
    }
}
```
```markdown
POST /userData/store - Insere um novo dado de usuário
```
```json
{
    "userDataStored": {
        "userDocument": "3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2",
        "creditCardToken": "fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe",
        "value": 1000,
        "id": 1
    }
}
```

```markdown
POST /userData/update/id - Atualiza dados de um usuário pelo id
```
```json
{
    "userUpdated": false // true or false
}
```

```markdown
DELETE /userData/delete - Deleta os dados de um usuário
```
```json
{
    "message": "UserData apagado"
}
```

## TECHs
- Laravel
- Mysql
