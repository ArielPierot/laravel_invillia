#### Requisitos:
Ubuntu 19.04 ou superior (O usado nesse tutorial foi o 19.10)

##### Instale o apache2:
```
$ sudo add-apt-repository ppa:ondrej/apache2
$ sudo apt update
$ sudo apt install apache2
```

##### Instale o mariadb (pode ser mariadb)
```
$ sudo apt install mysql-server
```

##### Com o comando abaixo você vai configurar o mysql instalado 
```
$ sudo mysql_secure_installation
```

##### Instale o DBEaver pelo link https://dbeaver.io/
Cria a conexão para o servidor de mysql com os dados que você passou durante a configuração.
Crie um banco de dados com o nome: laravel_invillia

##### Instale o PHP 7.4 com todas as dependências necessárias:
```
$ sudo apt install software-properties-common
$ sudo add-apt-repository ppa:ondrej/php
$ sudo apt update
$ sudo apt install -y php7.4 php7.4-mbstring php7.4-pgsql php7.4-curl php7.4-gd php7.4-gmp php7.4-xml php7.4-zip
```

Agora você vai ir pra o diretório raiz do projeto e executar os seguintes comandos:
```
$ composer install
```

Copiar o .env.example para .env
```
$ cp .env.example .env
```
Acesse o arquivo .env e verifique se as configurações que você passou no banco de dados são iguais.

Agora vai precisar rodar algumas com o Artisan:
```
$ php artisan key:generate
$ php artisan migrate
$ php artisan passport:install
```

Agora você vai deixar sua aplicação online:
```
$ php artisan serve
```

Acessar o localhost:8000/xml/create para fazer upload dos arquivos:
```
http://localhost:4000/xml/create
```
As consultas para api são feitas pelo endereço ex.: localhost:8000/api/login
Toda a documentação da API está disponível em https://documenter.getpostman.com/view/1669745/SWTEdwvh?version=latest
