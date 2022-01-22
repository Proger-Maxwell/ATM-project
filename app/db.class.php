<?php 

	class DB
	{

		private $db;
		public function __construct()
		{
			$dbinfo = require 'dbconfig.php';
			$this->db = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['login'], $dbinfo['password']);
		}

		public function query($sql, $params = [])
		{
			
			$stmt = $this->db->prepare($sql);
			
			$stmt->execute($params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAll($table, $sql = '', $params = [])
		{
			return $this->query("SELECT * FROM $table" . $sql, $params);
		}

		public function getRow($table, $sql = '', $params = [])
		{
            $result = $this->query("SELECT * FROM $table" . $sql, $params);
			return $result[0]; 
		}
        

	}

?>