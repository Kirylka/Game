<?php

namespace Game;


class Config {

	private static $config;

	public static $defaults = array(
		"absolute_url" => false,
		"relative_url" => false,
		"mysql_db_host" => 'localhost',
		"mysql_db_port" => '3306',
		"mysql_db_user" => 'root',
		"mysql_db_pass" => 'root',
		"mysql_db_name" => 'game'
	);
	/**
	 * Returns config option, if found.
	 * If the value is not set on startup, default value from {@link $_defaults}
	 * is used. If neither value is found, false is returned.
	 * @param string $setting Name of the option.
	 * @return string Found option or false if not found.
	 */
	public static function get($setting){
		if(isset(self::$config[$setting])){
			return self::$config[$setting];
		}
		if(isset(self::$defaults[$setting])){
			return self::$defaults[$setting];
		}
		return false;
	}

	/**
	 * Sets all config variables, overwriting any settings that were set before.
	 * This should be called at very beginning of the app init to set main config options.
	 * @param array $values
	 */
	public static function set($values){
		self::$config = $values;
	}

	/**
	 * Sets (or overwrides) given config option.
	 * @param string $key Name of the option.
	 * @param string $val Value of the option.
	 */
	public static function setKey($key, $val){
		self::$config[$key] = $val;
	}
}