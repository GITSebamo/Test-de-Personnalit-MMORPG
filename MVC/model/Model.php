<?php
	require_once (File::build_path(array('config','Conf.php')));
class Model {
	public static $pdo;

	public static function Init(){
		$hostname=Conf::getHostname();
		$database_name=Conf::getDatabase();
		$login=Conf::getLogin();
		$password=Conf::getPassword();
		// Connection to the database
		// The last argument defines UTF-8 as the encoding of MySQL input and output
		self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		// Activate the error display option of PDO, 
		// and now PDO will raise an exception in case of problems
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		

	}
}
try {
 		 Model::Init();
		} catch (PDOException $e) {
  		if (Conf::getDebug()) {
    		echo $e->getMessage(); // affiche un message d'erreur
  		} else {
   		 echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
  		}
		  die();
		}

	

?>