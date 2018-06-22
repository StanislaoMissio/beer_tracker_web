<?php
  
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'cervejaria');
  
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
date_default_timezone_set('America/Sao_Paulo');
  
// inclui o arquivo de funçõees
require_once 'connect.php';