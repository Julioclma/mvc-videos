//no arquivo criar-banco.php

rode "php criar-banco.php" para gerar as tabelas
certifique-se de criar a base de dados e com os parametros de senha e usuário

/*Autoload*/

- Rode "composer dumpautoload" para gerar o autoload atualizado

/*Abri servidor php*/

Comando para definir a pasta public como principal

php -S localhost:8080 -t public/




/* CRIAR TABELAS, EXTENSÃO MYSQL PDO */


--  TBL USERS
CREATE TABLE users(
id INTEGER AUTO_INCREMENT,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
PRIMARY KEY(id)
)