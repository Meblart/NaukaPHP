<?php
/**
 * Klasa łącząca (Model) dane z bazy danych w odpowiednie obiekty
 */
abstract class DBObject {

	protected static $table;
	protected $id;

	public static function store(DB $db, $data) {

		if (isset($data['id'])) unset($data['id']);

		foreach($data as $column => $value) {

            $columns[] = $column;
            $values[] = ":$column";
            $parameters[ $column ] = $value;
        }
        $query = "INSERT INTO ".static::$table." (".implode(',', $columns).") VALUES (".implode(',', $values).")";

        $db->query($query, $parameters);
        $id = $db->lastInsertId(static::$table."_id_seq");
        return $id;
	}

	public static function load(DB $db, $id) {

		$query = "SELECT * FROM ".static::$table." WHERE id = :id";
		$parameters = array(
			'id' => $id
		);

		$result = $db->query($query, $parameters);
		return $result->fetchObject(get_called_class());
	}

	public static function set(DB $db, $id, $data) {

		if (isset($data['id'])) unset($data['id']);

		foreach($data as $column => $value) {

			$columns[] = $column;
			$values[] = ":$column";
			$parameters[ $column ] = $value;
        }
        $parameters['id'] = $id;
        $query = "UPDATE ".static::$table." SET ".implode(',', $values)." WHERE id = :id";

		echo $query;
		echo $parameters;

        $db->query($query, $parameters);
	}

	public static function delete(DB $db, $id) {

        $query = "DELETE FROM ".static::$table.' WHERE id = :id';
		$parameters = array(
			'id' => $id
		);
        $db->query($query, $parameters);
    }
}