LIBRARY DEV

Este projeto é um CRUD (Create, Read, Update, Delete) básico desenvolvido com o framework Laravel. O sistema permite criar, visualizar, atualizar e deletar registros no banco de dados.

TECNOLOGIAS UTILIZADAS
- PHP (8.2.22)
- Composer (2.7.8)
- Laravel (11.x)
- MySQL
- XAMPP

PARA INSTALAR E RODAR O PROJETO

1º Baixe o projeto do github
git clone git@github.com:gabrielccsantos/library-dev.git

2º Acesse a pasta onde baixou o projeto
cd seu-repositório

Abra o projeto na sua IDE de preferência (A utilizada para programar foi o VS Code)

Agora um pouco mais de atenção para rodar o projeto na sua máquina.

abra o terminal e execute os seguintes comando

3º Instalar as dependências do Composer
composer install

4º Copie o arquivo .env.example

Depois de copiar ele ficará assim: .env.example.copy

Apague o '.example.copy' e apenas deixe .env

5º Gere uma nova chave de aplicação
Execute esse comando no terminal no source da pasta
php artisan key:generate

6º Configurar as variáveis de ambiente do banco de dados

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_dev_db
DB_USERNAME=root
DB_PASSWORD=

7º Rode as migrações para criar as tabelas no banco de dados
php artisan migrate

8º Para iniciar o projeto:
php artisan serve

No terminal irá aparecer um link com o localhost

Endpoints:

+ index -> /book-index (GET) - Listagem de todos os livros
+ create -> /book-create (GET) - formulário de cadastro de um novo livro
+ store -> /book-store (POST) - Rota para onde o cadastro é enviado
+ show -> /book-show/{id} (GET) - Visualização do livro segundo ID
+ edit -> /book-edit/{id} (GET) - Formulário de edição de um livro
+ update -> /book-update/{id} (PUT) - Rota para onde a edição é enviado
+ destroy -> /book-destroy/{id} (DELETE) - Rota para a exclusão de algum registro
