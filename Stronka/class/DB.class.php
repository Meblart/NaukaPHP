<?php
/**
 * To jest klasa odpowiedzialna za wykonywanie zapytań do bazy danych
 */
class DB {

	private $pdo;
	public $result = Array();

	/* nawiązanie połączenia PDO z bazą danych w konstruktorze */
	public function __construct($dbtype, $dbhost, $dbname, $dbuser, $dbpass) {

		$dsn = "$dbtype:host=$dbhost;dbname=$dbname";
		$this->pdo = new PDO($dsn, $dbuser, $dbpass);
		$this->pdo->exec("SET NAMES 'utf8';");
	}

	/* wykonanie zapytania PDO */
	public function query($query, $parameters = array()) {


		$statement = $this->pdo->prepare($query);

		foreach($parameters as $key => &$value) {
            $statement->bindParam($key, $value);
        }

        if (false !== $statement->execute()) {
			return $statement;
        } else {
        	throw new ErrorException(print_r($statement->errorInfo(), true));
        }
	}

	public function count($query)
	{

		$stm = $this->pdo->prepare($query);
		$stm->execute();
		$count = $stm->rowCount();

		return $count;
	}

	public function lastInsertId($name) {
		return $this->pdo->lastInsertId($name);
	}
}
