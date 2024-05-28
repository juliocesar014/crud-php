## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/juliocesar014/crud-php.git
```

Entre no diretório do projeto

```bash
  cd crud-php
```

Crie o banco de dados no Phpmyadmin

```bash
CREATE DATABASE crud;
USE crud;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

```

Acesse o index

```bash
 http://localhost/crud-php/index.php
```

