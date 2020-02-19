Para o desenvolvimento do teste foi usado framework cakephp, bootstrap, jquery e banco de dados relacional MySql. Para rodar a aplicação se faz necessário criar um banco em localhost chamado de "feegow" e uma tabela "agendas", segue abaixo a query usada:

CREATE DATABASE feegow /*!40100 DEFAULT CHARACTER SET latin1 */; CREATE TABLE agendas ( id int(11) NOT NULL AUTO_INCREMENT, specialty_id int(11) DEFAULT NULL, professional_id int(11) DEFAULT NULL, name varchar(100) DEFAULT NULL, cpf varchar(14) DEFAULT NULL, source_id int(11) DEFAULT NULL, date_time datetime DEFAULT NULL, PRIMARY KEY (id) ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

O framework cakephp possui um arquivo de configuração chamado de "database.php" para acesso ao banco de dados e este arquivo fica na pasta \app\Config\database.php

A configuração usada foi:

public $default = array( 'datasource' => 'Database/Mysql', 'persistent' => false, 'host' => 'localhost', 'login' => 'root', 'password' => '', 'database' => 'feegow', 'prefix' => '', //'encoding' => 'utf8', );

Logo de faz necessário ajustar os parâmetros host, login, password e database de acordo com o seu banco local. 

Feito isso, basta acessar aplicação pela url.

Para ver os agendamentos gravados no banco, acrescentar "/listar" no fim da url

Qualquer dúvida estou a disposição!