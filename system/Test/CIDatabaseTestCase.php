<?php
<<<<<<< HEAD

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014-2019 British Columbia Institute of Technology
 * Copyright (c) 2019-2020 CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

namespace CodeIgniter\Test;

use CodeIgniter\Database\BaseConnection;
<<<<<<< HEAD
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\MigrationRunner;
use CodeIgniter\Database\Seeder;
=======
use CodeIgniter\Database\MigrationRunner;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\Exceptions\ConfigException;
use Config\Database;
use Config\Migrations;
use Config\Services;

/**
 * CIDatabaseTestCase
 */
<<<<<<< HEAD
abstract class CIDatabaseTestCase extends CIUnitTestCase
{
	/**
	 * Should run db migration?
	 *
	 * @var boolean
	 */
	protected $migrate = true;

	/**
	 * Should run db migration only once?
	 *
	 * @var boolean
	 */
	protected $migrateOnce = false;

	/**
	 * Is db migration done once or more than once?
	 *
	 * @var boolean
	 */
	private static $doneMigration = false;

	/**
	 * Should run seeding only once?
	 *
	 * @var boolean
	 */
	protected $seedOnce = false;

	/**
	 * Is seeding done once or more than once?
	 *
	 * @var boolean
	 */
	private static $doneSeed = false;

	/**
	 * Should the db be refreshed before test?
=======
class CIDatabaseTestCase extends CIUnitTestCase
{
	/**
	 * Should the db be refreshed before
	 * each test?
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @var boolean
	 */
	protected $refresh = true;

	/**
	 * The seed file(s) used for all tests within this test case.
	 * Should be fully-namespaced or relative to $basePath
	 *
	 * @var string|array
	 */
	protected $seed = '';

	/**
	 * The path to the seeds directory.
	 * Allows overriding the default application directories.
	 *
	 * @var string
	 */
	protected $basePath = SUPPORTPATH . 'Database';

	/**
	 * The namespace(s) to help us find the migration classes.
	 * Empty is equivalent to running `spark migrate -all`.
	 * Note that running "all" runs migrations in date order,
	 * but specifying namespaces runs them in namespace order (then date)
	 *
	 * @var string|array|null
	 */
	protected $namespace = 'Tests\Support';

	/**
	 * The name of the database group to connect to.
	 * If not present, will use the defaultGroup.
	 *
	 * @var string
	 */
	protected $DBGroup = 'tests';

	/**
	 * Our database connection.
	 *
	 * @var BaseConnection
	 */
	protected $db;

	/**
	 * Migration Runner instance.
	 *
	 * @var MigrationRunner|mixed
	 */
	protected $migrations;

	/**
	 * Seeder instance
	 *
<<<<<<< HEAD
	 * @var Seeder
=======
	 * @var \CodeIgniter\Database\Seeder
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $seeder;

	/**
	 * Stores information needed to remove any
	 * rows inserted via $this->hasInDatabase();
	 *
	 * @var array
	 */
	protected $insertCache = [];

	//--------------------------------------------------------------------

	/**
	 * Load any database test dependencies.
	 */
	public function loadDependencies()
	{
		if ($this->db === null)
		{
			$this->db = Database::connect($this->DBGroup);
			$this->db->initialize();
		}

		if ($this->migrations === null)
		{
			// Ensure that we can run migrations
			$config          = new Migrations();
			$config->enabled = true;

			$this->migrations = Services::migrations($config, $this->db);
			$this->migrations->setSilent(false);
		}

		if ($this->seeder === null)
		{
			$this->seeder = Database::seeder($this->DBGroup);
			$this->seeder->setSilent(true);
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Ensures that the database is cleaned up to a known state
	 * before each test runs.
	 *
	 * @throws ConfigException
	 */
	protected function setUp(): void
	{
		parent::setUp();

		$this->loadDependencies();

<<<<<<< HEAD
		$this->setUpMigrate();
		$this->setUpSeed();
	}

	//--------------------------------------------------------------------

	/**
	 * Migrate on setUp
	 */
	protected function setUpMigrate()
	{
		if ($this->migrateOnce === false || self::$doneMigration === false)
		{
			if ($this->refresh === true)
			{
				$this->regressDatabase();

				// Reset counts on faked items
				Fabricator::resetCounts();
			}

			$this->migrateDatabase();
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Seed on setUp
	 */
	protected function setUpSeed()
	{
		if ($this->seedOnce === false || self::$doneSeed === false)
		{
			$this->runSeeds();
=======
		if ($this->refresh === true)
		{
			$this->regressDatabase();

			// Reset counts on faked items
			Fabricator::resetCounts();
		}

		$this->migrateDatabase();

		if (! empty($this->seed))
		{
			if (! empty($this->basePath))
			{
				$this->seeder->setPath(rtrim($this->basePath, '/') . '/Seeds');
			}

			$seeds = is_array($this->seed) ? $this->seed : [$this->seed];
			foreach ($seeds as $seed)
			{
				$this->seed($seed);
			}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Takes care of any required cleanup after the test, like
	 * removing any rows inserted via $this->hasInDatabase()
	 */
	protected function tearDown(): void
	{
		parent::tearDown();

		if (! empty($this->insertCache))
		{
			foreach ($this->insertCache as $row)
			{
				$this->db->table($row[0])
						->where($row[1])
						->delete();
			}
		}
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Run seeds as defined by the class
	 */
	protected function runSeeds()
	{
		if (! empty($this->seed))
		{
			if (! empty($this->basePath))
			{
				$this->seeder->setPath(rtrim($this->basePath, '/') . '/Seeds');
			}

			$seeds = is_array($this->seed) ? $this->seed : [$this->seed];
			foreach ($seeds as $seed)
			{
				$this->seed($seed);
			}
		}

		self::$doneSeed = true;
	}

	//--------------------------------------------------------------------

	/**
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Regress migrations as defined by the class
	 */
	protected function regressDatabase()
	{
<<<<<<< HEAD
		if ($this->migrate === false)
		{
			return;
		}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		// If no namespace was specified then rollback all
		if (empty($this->namespace))
		{
			$this->migrations->setNamespace(null);
			$this->migrations->regress(0, 'tests');
		}

		// Regress each specified namespace
		else
		{
			$namespaces = is_array($this->namespace) ? $this->namespace : [$this->namespace];

			foreach ($namespaces as $namespace)
			{
				$this->migrations->setNamespace($namespace);
				$this->migrations->regress(0, 'tests');
			}
		}
	}

	/**
	 * Run migrations as defined by the class
	 */
	protected function migrateDatabase()
	{
<<<<<<< HEAD
		if ($this->migrate === false)
		{
			return;
		}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		// If no namespace was specified then migrate all
		if (empty($this->namespace))
		{
			$this->migrations->setNamespace(null);
			$this->migrations->latest('tests');
<<<<<<< HEAD
			self::$doneMigration = true;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
		// Run migrations for each specified namespace
		else
		{
			$namespaces = is_array($this->namespace) ? $this->namespace : [$this->namespace];

			foreach ($namespaces as $namespace)
			{
				$this->migrations->setNamespace($namespace);
				$this->migrations->latest('tests');
<<<<<<< HEAD
				self::$doneMigration = true;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}
		}
	}

	/**
	 * Seeds that database with a specific seeder.
	 *
	 * @param string $name
<<<<<<< HEAD
	 *
	 * @return void
	 */
	public function seed(string $name)
	{
		$this->seeder->call($name);
=======
	 */
	public function seed(string $name)
	{
		return $this->seeder->call($name);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------
	// Database Test Helpers
	//--------------------------------------------------------------------

	/**
	 * Asserts that records that match the conditions in $where do
	 * not exist in the database.
	 *
	 * @param string $table
	 * @param array  $where
	 *
<<<<<<< HEAD
	 * @return void
=======
	 * @return boolean
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function dontSeeInDatabase(string $table, array $where)
	{
		$count = $this->db->table($table)
				->where($where)
				->countAllResults();

		$this->assertTrue($count === 0, 'Row was found in database');
	}

	//--------------------------------------------------------------------

	/**
	 * Asserts that records that match the conditions in $where DO
	 * exist in the database.
	 *
	 * @param string $table
	 * @param array  $where
	 *
<<<<<<< HEAD
	 * @return void
	 * @throws DatabaseException
=======
	 * @return boolean
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function seeInDatabase(string $table, array $where)
	{
		$count = $this->db->table($table)
				->where($where)
				->countAllResults();

		$this->assertTrue($count > 0, 'Row not found in database: ' . $this->db->showLastQuery());
	}

	//--------------------------------------------------------------------

	/**
	 * Fetches a single column from a database row with criteria
	 * matching $where.
	 *
	 * @param string $table
	 * @param string $column
	 * @param array  $where
	 *
	 * @return boolean
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function grabFromDatabase(string $table, string $column, array $where)
	{
		$query = $this->db->table($table)
				->select($column)
				->where($where)
				->get();

		$query = $query->getRow();

		return $query->$column ?? false;
	}

	//--------------------------------------------------------------------

	/**
	 * Inserts a row into to the database. This row will be removed
	 * after the test has run.
	 *
	 * @param string $table
	 * @param array  $data
	 *
	 * @return boolean
	 */
	public function hasInDatabase(string $table, array $data)
	{
		$this->insertCache[] = [
			$table,
			$data,
		];

		return $this->db->table($table)
					->insert($data);
	}

	//--------------------------------------------------------------------

	/**
	 * Asserts that the number of rows in the database that match $where
	 * is equal to $expected.
	 *
	 * @param integer $expected
	 * @param string  $table
	 * @param array   $where
	 *
<<<<<<< HEAD
	 * @return void
	 * @throws DatabaseException
=======
	 * @return boolean
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function seeNumRecords(int $expected, string $table, array $where)
	{
		$count = $this->db->table($table)
				->where($where)
				->countAllResults();

		$this->assertEquals($expected, $count, 'Wrong number of matching rows in database.');
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD

	/**
	 * Reset $doneMigration and $doneSeed
	 *
	 * @afterClass
	 */
	public static function resetMigrationSeedCount()
	{
		self::$doneMigration = false;
		self::$doneSeed      = false;
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
