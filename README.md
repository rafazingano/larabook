# Guia de Instalação do Projeto LaraBook

Este é um guia passo a passo para baixar, configurar e executar o projeto LaraBook. Siga estas instruções para obter a aplicação em funcionamento em sua máquina local.

## Pré-requisitos

Antes de começar, certifique-se de ter os seguintes requisitos instalados em sua máquina:

-   PHP (versão 8.1 ou superior)
-   Composer
-   Node.js (opcional)
-   MySQL ou outro banco de dados (opcional)
-   Git
Ou
-   Docker

## Passos de Instalação

1.  Clone o repositório do GitHub:
    
```bash
git clone https://github.com/rafazingano/larabook.git
```
    
2.  Acesse a pasta do projeto:
    
```bash
cd larabook
```
    
3.  Caso queria rodar com docker utilize o comando abaixo:
```bash
docker compose up -d
```

4. Acesse seu contêiner caso esteja utilizando docker e prossiga com o passo a passo abaixo.

5. Instale as dependências usando o Composer:
    
```bash
composer install
```

6.  Copie o arquivo de configuração `.env.example` e renomeie-o para `.env`. Configure as variáveis de ambiente, como as credenciais do banco de dados, no arquivo `.env`. 
    
7.  Gere a chave de aplicação:
    
```bash
php artisan key:generate
```
    
8.  Execute as migrações do banco de dados para criar as tabelas e execute as seeders:
    
```bash
php artisan migrate
php artisan db:seed
```
    
9.  Inicie o servidor de desenvolvimento caso não esteja utilizando o docker:
    
```bash
php artisan serve
```
    
8.  Acesse a aplicação em seu navegador em `http://localhost:8000` ou `http://localhost`no caso do docker .

#### Dados de acesso:
Email: rafael@zingano.com
Senha: 123456789

## Compilar ativos (CSS e JavaScript)

9.  Instale as dependências Node.js:
    
```bash
npm install
```

10.  Compile os ativos:
    
```bash
npm run dev || npm run build
```
    

## Contribuindo

Se você deseja contribuir para o projeto, siga estas etapas:

1.  Faça um fork do repositório no GitHub.
    
2.  Clone o fork para sua máquina local.
    
3.  Crie uma branch para suas alterações:
    
```bash
git checkout -b minha-feature
```
 
4.  Faça suas alterações e envie um pull request.

## License

The Laravel larabook is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).