# CRUD de Jogos em Laravel

Este é um projeto de CRUD (Create, Read, Update, Delete) de jogos desenvolvido em Laravel. Ele demonstra como implementar um sistema simples para gerenciar jogos, utilizando conceitos como controllers, models, factories e migrations.

## Requisitos

- PHP 7.4 ou superior
- Composer
- MySQL ou PostgreSQL
- Laravel

---

## Configuração

### Instalação de dependências

```
- composer install
```

### .env

```
- cp .env.example .env
```

### Key

```
- php artisan key:generate
```

### Migrations

```
- php artisan migrate
```

### Localhost

```
- php artisan serve
```

---

## Criação

### 1. Criar um Novo Projeto Laravel

Para criar um novo projeto Laravel, execute o seguinte comando:

```
composer create-project --prefer-dist laravel/laravel laravel-crud-games-tdd
```

### 2. Acessar o Projeto

Entre no diretório do projeto:

```
cd laravel-crud-games-tdd
```

### 3. Instalar PHPUnit

Para instalar o PHPUnit como dependência de desenvolvimento, use o comando:

```
composer require --dev phpunit/phpunit
```

### 4. Executar as migrations

Para executar as migrations, use o seguinte comando:

```
php artisan migrate
```

### 5. Executar os Testes

Para executar os testes do PHPUnit, use o seguinte comando:

```
php artisan test
```

## Estrutura do Projeto

### Controller

O `GameController` é responsável por gerenciar as operações de CRUD. Ele manipula as requisições HTTP, interage com o modelo e retorna as respostas apropriadas.

### Model

O modelo `Game` representa a tabela `games` no banco de dados. Ele define os atributos que podem ser preenchidos (`fillable`) e as relações com outros modelos, se necessário.

### Factory

As factories são usadas para gerar dados fictícios de jogos. Isso é útil para testes e para popular rapidamente o banco de dados durante o desenvolvimento. Por exemplo, a factory pode criar instâncias de jogos com dados aleatórios.

### Migrations

As migrations são responsáveis por definir a estrutura do banco de dados. No projeto, a migration para a tabela `games` especifica os campos (como `title` e `description`)

## Rodando o Servidor Local

Para rodar o servidor local do Laravel, utilize o comando:

```
php artisan serve
```

O projeto estará disponível em `http://localhost:8000`.

## Docker

```
docker-compose up -d
```
