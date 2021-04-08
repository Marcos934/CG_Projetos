Sistema desenvolvido em arquitetura de monólito com UX de SPA, utilizado as seguintes tecnologias:

**Linguagens:** PHP 8 (Back-end) e JavaScript (Front-End)

**Frameworks:** Laravel 8, Bootstrap e Vue.js

Além de outras tecnologias que auxiliam no desenvolvimento, como:

**Datatables**, **Moment** e **Jetstream**.

O sistema usa como tecnologia de roteamento fornecido pelo Laravel através do Inertia.js, sendo assim capaz de ser um sistema sem necessidade de API, pois o back-end da aplicação está ligado diretamente ao sistema de front-end, fazendo assim com que a experiência de UX e desempenho seja otimizada para o usuário. 

## Instruções de testes

**Requisitos:** PHP > 7.4 e Node instalado na máquina.

Após fazer o clone, o avaliador têm 2 opções de banco de dados para testes, pois o sistema possui Eloquent ORM sendo compatível com os principais bancos de dados.

**Opção MYSQL:**

- Basta criar um banco de dados:

    ```sql
    CREATE SCHEMA `cg_projetos` DEFAULT CHARACTER SET utf8 ;
    ```

- Criado o banco de dados faça conexão no arquivo .env e modifique a sessão abaixo:

    ```php
    DB_CONNECTION=mysql
    DB_HOST= seu_host
    DB_PORT=3306
    DB_DATABASE=db_cgprojetos
    DB_USERNAME=root
    DB_PASSWORD=
    ```

- Após modificação no arquivo basta escrever no terminal dentro da pasta do projeto:

    ```php
    php artisan migration
    ```

- Pronto, a conexão e o banco de dados estão OK, agora para acessar a aplicação basta rodar o código abaixo no terminal:

    ```php
    php artisan serve
    ```

- Aplicação pronta para uso.

**Opção SQLITE:**

- O arquivo **database.sqlite** já está pronto, você só precisa configurar o **.env** da seguinte forma:

    ```php
    DB_CONNECTION=sqlite
    #DB_HOST= seu_host
    #DB_PORT=3306
    #DB_DATABASE=db_cgprojetos
    #DB_USERNAME=root
    #DB_PASSWORD=
    ```

- Após modificação no arquivo basta escrever no terminal dentro da pasta do projeto:

    ```php
    php artisan migration
    ```

- Pronto, a conexão e o banco de dados estão OK, agora para acessar a aplicação basta rodar o código abaixo no terminal:

    ```php
    php artisan serve
    ```

- Aplicação pronta para uso.

**OBS.:** Caso o sistema não funcione após esses procedimentos, considere o seguinte código em seu terminal: 

```php
npm run dev
//ou
npm run prod
//ou
npm run watch
```

O sistema segue padrão MVC - Model View Controller, com designer pattern de factory em estrutura nativa para banco de dados.
