<?php

namespace Game\Repositories;

use Game\Config;

class Repository
{

	protected $db;


	/**
	 * Create our PDO connection, then call parent
	 *
	 * @param array $config Configuration options
	 */

	public function __construct(array $config = null, \PDO $pdo = null)
	{

		if (!$config) {
			$config['host'] = Config::get("mysql_db_host");
			$config['port'] = Config::get("mysql_db_port");
			$config['user'] = Config::get("mysql_db_user");
			$config['pass'] = Config::get("mysql_db_pass");
			$config['name'] = Config::get("mysql_db_name");
		}


		$pdo = ($pdo === null) ? $this->buildPdo($config) : $pdo;
		$this->setDb($pdo);
	}

	/**
	 * Build the PDO instance
	 *
	 * @param array $config Configuration options
	 * @return \PDO instance
	 */
	public function buildPdo(array $config)
	{
		try {
			$pdo =  new \PDO("mysql:host={$config['host']};dbname={$config['name']}", $config['user'], $config['pass'], array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
		} catch(\PDOException $ex){
			die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
		}

		return $pdo;

	}

	/**
	 * Get the set PDO instance
	 *
	 * @return PDO instance
	 */
	public function getDb()
	{
		return $this->db;
	}

	/**
	 * Set the PDO instance
	 *
	 * @param object $db PDO instance
	 */
	public function setDb($db)
	{
		$this->db = $db;
	}
	
}