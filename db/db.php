<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=test", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>
