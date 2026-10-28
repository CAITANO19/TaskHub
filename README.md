# TaskHub

Aplicação web para organizar tarefas por categoria, desenvolvida com **Laravel 12**. Permite criar categorias (ex.: Trabalho, Estudo, Pessoal) e gerenciar as tarefas de cada uma, marcando-as como concluídas.

## Funcionalidades

- CRUD completo de **categorias** e de **tarefas**
- Cada tarefa pertence a uma categoria (relação 1:N, com exclusão em cascata)
- Tarefas com título, descrição opcional e status de conclusão
- Filtro de tarefas por categoria
- Listagem paginada (10 por página)
- Validação de formulários no servidor
- Interface em Blade com Bootstrap 5

## Tecnologias

| Camada | Tecnologia |
| --- | --- |
| Backend | PHP 8.2+ e Laravel 12 |
| Banco de dados | SQLite |
| Front-end | Blade + Bootstrap 5.3 (via CDN) |

## Modelo de dados

- `categories`: `id`, `name`, timestamps
- `tasks`: `id`, `category_id` (FK), `title`, `description` (opcional), `completed` (boolean), timestamps

## Como executar

Pré-requisitos: PHP 8.2+ e Composer.

```bash
git clone https://github.com/CAITANO19/TaskHub.git
cd TaskHub

composer install
cp .env.example .env
php artisan key:generate

touch database/database.sqlite
php artisan migrate

php artisan serve
```

A aplicação fica disponível em `http://localhost:8000` e redireciona para a lista de tarefas.

## Estrutura

```
app/Http/Controllers/   CategoryController, TaskController
app/Models/             Category, Task, User
database/migrations/    tabelas de categorias e tarefas
resources/views/        layouts, categories e tasks (Blade)
routes/web.php          rotas resource para categories e tasks
```

## Autor

Victor Caitano — [@CAITANO19](https://github.com/CAITANO19)
