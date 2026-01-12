# 📝 Gerenciador de Tarefas (Desafio Laravel)

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

Este projeto é uma aplicação de **Gerenciamento de Tarefas** desenvolvida como parte de um desafio prático de desenvolvimento web. O objetivo foi criar uma solução robusta focada na organização do código, uso correto do padrão MVC e Migrations.

---

### 🌐 Demonstração Online

A aplicação está rodando em produção na infraestrutura do **Laravel Cloud**.
Você pode testar todas as funcionalidades (Criar, Editar, Arquivar e Restaurar tarefas) no link abaixo:

👉 **[Acessar Projeto (Live Demo)](https://desafio-laravel-787648912462.southamerica-east1.run.app/tasks)**

---

### 🖼️ Screenshots

<div align="center">
  <img src="https://i.imgur.com/WPPwyzJ.png" alt="Tela Inicial" width="700">
  <br><br>
  <img src="https://i.imgur.com/63Nv9j0.png" alt="Criar Tarefa" width="700">
</div>

---


### ✨ Funcionalidades

O projeto atende aos requisitos do desafio e implementa funcionalidades extras de segurança de dados (Soft Deletes):

* **✅ Criar Tarefas:** Adição de novas tarefas com título e descrição.
* **✅ Listar Tarefas:** Visualização clara das tarefas pendentes.
* **✅ Editar Tarefas:** Atualização de conteúdo e status (completado/pendente).
* **♻️ Sistema de Lixeira (Arquivar):** Em vez de deletar imediatamente, as tarefas são enviadas para um arquivo (Soft Delete).
* **🔄 Restaurar Tarefas:** Capacidade de recuperar tarefas arquivadas por engano.
* **❌ Exclusão Permanente:** Limpeza definitiva de itens da lixeira.

---

### 🛠️ Tecnologias e Ferramentas

* **Framework:** Laravel 12 (Bleeding Edge)
* **Linguagem:** PHP 8.2+
* **Banco de Dados:** MySQL
* **Frontend:** Blade Templates + TailwindCSS
* **Infraestrutura:** Laravel Cloud (PaaS)

---

### 🚀 Como Rodar Localmente

Siga os passos abaixo para executar o projeto na sua máquina:

1.  **Clone o repositório**
    ```bash
    git clone [https://github.com/imlokdev/desafio-laravel.git](https://github.com/imlokdev/desafio-laravel.git)
    cd desafio-laravel
    ```

2.  **Instale as dependências**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Configure o ambiente**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Banco de Dados**
    Crie um banco de dados no seu MySQL local e configure as credenciais no arquivo `.env`. Em seguida, execute as migrações:
    ```bash
    php artisan migrate
    ```

5.  **Inicie o servidor**
    ```bash
    php artisan serve
    ```
    Acesse em: `http://localhost:8000`

---

### 📋 Sobre o Desafio

Este projeto foi desenvolvido atendendo aos critérios de:
* Uso de **Migrations** para estrutura do banco.
* Implementação correta de **Routes**, **Controllers** e **Models**.
* Código limpo e organizado.
* Prazo de entrega: Janeiro/2026.

---

Desenvolvido com 💜 e Laravel.
<br>
<em>by imlokdev</em>
