<?php
namespace DB;
final class MySQLi {
	private $connection;
	private $queries = array();

	public function __construct($hostname, $username, $password, $database, $port = '3306') {
		$this->connection = new \mysqli($hostname, $username, $password, $database, $port);

		if ($this->connection->connect_error) {
			throw new \Exception('Error: ' . $this->connection->error . '<br />Error No: ' . $this->connection->errno);
		}
		$this->connection->set_charset("utf8");
		$this->connection->query("SET SQL_MODE = ''");

		if (property_exists($this, 'link')) {
			$this->link->query("SET SESSION group_concat_max_len = 65535");
		} else {
			$this->connection->query("SET SESSION group_concat_max_len = 65535");
		}
			
	}

	public function query($sql) {
	    if(DEBUG){
            $this->queries[] = array(microtime(true),$sql);
        }
		$query = $this->connection->query($sql);

		if (!$this->connection->errno) {
			if ($query instanceof \mysqli_result) {
				$data = array();

				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}

				$result = new \stdClass();
				$result->num_rows = $query->num_rows;
				$result->row = isset($data[0]) ? $data[0] : array();
				$result->rows = $data;

				$query->close();

				return $result;
			} else {
				return true;
			}
		} else {
			throw new \Exception('Error: ' . $this->connection->error  . '<br />Error No: ' . $this->connection->errno . '<br />' . $sql);
		}
	}

	public function escape($value) {
		return $this->connection->real_escape_string($value);
	}

	public function getLoggedQueries(){
	    return DEBUG && $this->queries ? $this->queries : false;
    }

	public function countAffected() {
		return $this->connection->affected_rows;
	}

	public function getLastId() {
		return $this->connection->insert_id;
	}
	
	public function connected() {
		return $this->connection->ping();
	}
	
	public function __destruct() {
		$this->connection->close();
	}
}