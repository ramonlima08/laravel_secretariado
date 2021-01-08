# Sistema Secretariado

O Sistema de secretariado foi desenvolvido para atender as demandas da secretária que recebe ligações e registra a agenda dos responsáveis do escritório.

O Sistema também conta com uma base de dados de Empresas Terceiras e Contatos, com essas informações no sistemas cria-se uma base centralizada de informações sobre contatos telefonicos importantes.

Os acessos ao sistema podem ser configurados e habilitados para os membros do escritório.

Se você tem uma equipe que precisa entrar em contato com os clientes e usuários, o sistema também atende, pois as Empresas Terceiras pode ser utilizada como Clientes e os contatos como Usuarios.

## Requerimentos

- O Sistema utiliza o framework Laravel na versão 7.3
- PHP 7
- Mysql
- Composer
- Npm

## Instalação
<!-- Use the package manager [pip](https://pip.pypa.io/en/stable/) to install foobar. -->
Clona o projeto

```bash
$ git clone https://github.com/ramonlima08/laravel_secretariado.git
```


## Instala o composer

```bash
$ composer install
```


## Instala o npm

```bash
$ npm install
```


## Copia arquivo .env.example para arquivo .env

```bash
$ cp .env.example .env
```


## Gera chave

```bash
$ php artisan key:generate
```

## Cria banco de dados vazio

```bash
$ mysql -uroot -proot
$ create database secretaria;
$ quit;
```

## Configurar banco de dados no arquivo .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secretaria
DB_USERNAME=root
DB_PASSWORD=
```

## Migra tabelas para o banco de dados

```bash
$ php artisan migrate
```

## Envia as seeds para o banco de dados

```bash
$ php artisan db:seed
```

## License
[MIT](https://choosealicense.com/licenses/mit/)