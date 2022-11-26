
<?php
//  $connect = mysqli_connect("localhost","root","","crudajax");
 
//  if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   }
// Pdo est une interface d'abstraction
// mysqli_conect() avec mysql
// mssql_conect() avec sql server => apprés la version 7 du php odbc_connect()
// oci_conect() avec oracl
//les instruction ci desscu conncu pour fonctioner avec un SGBD(mysql,oracl,sql server)
// si un jour vous dicider de changer le sgbd il doit etre des modification majeur tu dois etre changer tous les exemle_concet c'est une chose n'est pas pratique
// mes pour le pdo il est facile d'integre n'importe quel sgbd sans des modification majeur juste des modifiaction mineur c'est ca l'abstraction
// contre les attack avec sql injection pdo a une securiser native contre c'est attack c'est on utiliser corectement
// pdo est valable de la version php5.1





// $connection = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8','root','root');
// pdo can use to connect to multiple database 
// Objet PDO (PHP Data Objects)*
// Il s'agit d'une interface qui permet au scripts PHP d’interroger une base de données via des requêtes SQL.
// si l'application Web repose sur le SGBD MySQL, on peut migrer vers le SGBD PostgreSQL sans modifier le code
//  source (quelques modifications mineurs sont requises).

// Il est possible d'ajouter d'autres mots clés comme port pour désigner un numéro de port particulier
// (sur lequel le SBGD écoute les requêtes) ou charset pour spécifier l'encodage (ou jeux de caractères)

// PDOException il s'ajit d'une class qui accompagne la class pdo et permmet de gerer les erreur 
// $e c'est un instance de class ou bien un objet 
try{
    $connect = new PDO ("mysql:host=localhost;dbname=pdotest;port=3306",'root','');

}catch(Exception $e){
  echo "Erreur de connexion".$e->getMessage();
}
?>