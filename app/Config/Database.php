<<<<<<< HEAD
<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
=======
<?php namespace Config;

/**
 * Database Configuration
 *
 * @package Config
 */

class Database extends \CodeIgniter\Database\Config
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
<<<<<<< HEAD
	public $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
=======
	public $filesPath = APPPATH . 'Database/';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */
	public $defaultGroup = 'default';

	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default = [
		'DSN'      => '',
		'hostname' => 'localhost',
<<<<<<< HEAD
		'username' => '',
		'password' => '',
		'database' => '',
=======
		'username' => 'root',
		'password' => 'mysql',
		'database' => 'siakad',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		'DBDriver' => 'MySQLi',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
<<<<<<< HEAD
=======
		'cacheOn'  => false,
		'cacheDir' => '',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];

	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
	public $tests = [
		'DSN'      => '',
		'hostname' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => ':memory:',
		'DBDriver' => 'SQLite3',
		'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
<<<<<<< HEAD
=======
		'cacheOn'  => false,
		'cacheDir' => '',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
		if (ENVIRONMENT === 'testing')
		{
			$this->defaultGroup = 'tests';
<<<<<<< HEAD
=======

			// Under Travis-CI, we can set an ENV var named 'DB_GROUP'
			// so that we can test against multiple databases.
			if ($group = getenv('DB'))
			{
				if (is_file(TESTPATH . 'travis/Database.php'))
				{
					require TESTPATH . 'travis/Database.php';

					if (! empty($dbconfig) && array_key_exists($group, $dbconfig))
					{
						$this->tests = $dbconfig[$group];
					}
				}
			}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
	}

	//--------------------------------------------------------------------

}
