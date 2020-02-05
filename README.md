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

##### Instale o composer via curl:
```
$ sudo apt install -y curl
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
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
```
APP_NAME=Invillia
APP_ENV=local
APP_KEY=base64:A/DUkY65rJ6qkaTY0RQeOoP8CpRszLrS/1KEW33tJwU=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_invillia
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
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

Acessar o endereço abaixo para fazer upload dos arquivos XML.
Primeiro inserir o arquivo people.xml e depois shiporders.xml que estão na pasta public/testes
Obs.: Tem um teste de feature fazendo o processo de importação na aplicação:
```
http://localhost:8000/xml/create
```
As consultas para api são feitas pelo endereço ex.: localhost:8000/api/login
```
localhost:8000/api/login
```
Toda a documentação da API está disponível em https://documenter.getpostman.com/view/1669745/SWTEdwvh?version=latest
