<?php

/**
<<<<<<< HEAD
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
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

namespace CodeIgniter\Database;

<<<<<<< HEAD
use InvalidArgumentException;

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
/**
 * Database Connection Factory
 *
 * Creates and returns an instance of the appropriate DatabaseConnection
<<<<<<< HEAD
 */
class Database
{
	/**
	 * Maintains an array of the instances of all connections that have
	 * been created.
	 * 
	 * Helps to keep track of all open connections for performance
	 * monitoring, logging, etc.
=======
 *
 * @package CodeIgniter\Database
 */
class Database
{

	/**
	 * Maintains an array of the instances of all connections
	 * that have been created. Helps to keep track of all open
	 * connections for performance monitoring, logging, etc.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @var array
	 */
	protected $connections = [];

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Parses the connection binds and returns an instance of the driver
	 * ready to go.
=======
	 * Parses the connection binds and returns an instance of
	 * the driver ready to go.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @param array  $params
	 * @param string $alias
	 *
<<<<<<< HEAD
	 * @return mixed
	 * 
	 * @throws InvalidArgumentException
	 * 
	 * @internal param bool $useBuilder
	 */
	public function load(array $params = [], string $alias = '')
	{
		if ($alias === '')
		{
			throw new InvalidArgumentException('You must supply the parameter: alias.');
		}

		// Handle universal DSN connection string
		if (! empty($params['DSN']) && strpos($params['DSN'], '://') !== false)
		{
			$params = $this->parseDSN($params);
		}

		// No DB specified? Beat them senseless...
		if (empty($params['DBDriver']))
		{
			throw new InvalidArgumentException('You have not selected a database type to connect to.');
		}

		// Store the connection
		$this->connections[$alias] = $this->initDriver($params['DBDriver'], 'Connection', $params);
=======
	 * @return   mixed
	 * @internal param bool $useBuilder
	 */
	public function load(array $params = [], string $alias)
	{
		// No DB specified? Beat them senseless...
		if (empty($params['DBDriver']))
		{
			throw new \InvalidArgumentException('You have not selected a database type to connect to.');
		}

		$className = strpos($params['DBDriver'], '\\') === false
			? '\CodeIgniter\Database\\' . $params['DBDriver'] . '\\Connection'
			: $params['DBDriver'] . '\\Connection';

		$class = new $className($params);

		// Store the connection
		$this->connections[$alias] = $class;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $this->connections[$alias];
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Creates a Forge instance for the current database type.
	 *
	 * @param ConnectionInterface $db
	 *
	 * @return object
	 */
	public function loadForge(ConnectionInterface $db): object
	{
		// Initialize database connection if not exists.
		if (! $db->connID)
		{
			$db->initialize();
		}

		return $this->initDriver($db->DBDriver, 'Forge', $db);
	}

	//--------------------------------------------------------------------

	/**
	 * Creates a Utils instance for the current database type.
	 *
	 * @param ConnectionInterface $db
	 *
	 * @return object
	 */
	public function loadUtils(ConnectionInterface $db): object
	{
		// Initialize database connection if not exists.
=======
	 * Creates a new Forge instance for the current database type.
	 *
	 * @param ConnectionInterface|BaseConnection $db
	 *
	 * @return mixed
	 */
	public function loadForge(ConnectionInterface $db)
	{
		$className = strpos($db->DBDriver, '\\') === false ? '\CodeIgniter\Database\\' . $db->DBDriver . '\\Forge' : $db->DBDriver . '\\Forge';

		// Make sure a connection exists
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (! $db->connID)
		{
			$db->initialize();
		}

<<<<<<< HEAD
		return $this->initDriver($db->DBDriver, 'Utils', $db);
=======
		return new $className($db);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Parse universal DSN string
	 *
	 * @param array $params
	 *
	 * @return array
	 * 
	 * @throws InvalidArgumentException
	 */
	protected function parseDSN(array $params): array
	{
		$dsn = parse_url($params['DSN']);

		if (! $dsn)
		{
			throw new InvalidArgumentException('Your DSN connection string is invalid.');
		}

		$dsnParams = [
			'DSN'      => '',
			'DBDriver' => $dsn['scheme'],
			'hostname' => isset($dsn['host']) ? rawurldecode($dsn['host']) : '',
			'port'     => isset($dsn['port']) ? rawurldecode((string) $dsn['port']) : '',
			'username' => isset($dsn['user']) ? rawurldecode($dsn['user']) : '',
			'password' => isset($dsn['pass']) ? rawurldecode($dsn['pass']) : '',
			'database' => isset($dsn['path']) ? rawurldecode(substr($dsn['path'], 1)) : '',
		];

		// Do we have additional config items set?
		if (! empty($dsn['query']))
		{
			parse_str($dsn['query'], $extra);

			foreach ($extra as $key => $val)
			{
				if (is_string($val) && in_array(strtolower($val), ['true', 'false', 'null'], true))
				{
					$val = $val === 'null' ? null : filter_var($val, FILTER_VALIDATE_BOOLEAN);
				}

				$dsnParams[$key] = $val;
			}
		}

		return array_merge($params, $dsnParams);
	}

	//--------------------------------------------------------------------

	/**
	 * Initialize database driver.
	 *
	 * @param string       $driver   Database driver name (e.g. 'MySQLi')
	 * @param string       $class    Database class name (e.g. 'Forge')
	 * @param array|object $argument
	 *
	 * @return object
	 */
	protected function initDriver(string $driver, string $class, $argument): object
	{
		$class = $driver . '\\' . $class;

		if (strpos($driver, '\\') === false)
		{
			$class = "CodeIgniter\Database\\{$class}";
		}

		return new $class($argument);
	}
=======
	 * Loads the Database Utilities class.
	 *
	 * @param ConnectionInterface|BaseConnection $db
	 *
	 * @return mixed
	 */
	public function loadUtils(ConnectionInterface $db)
	{
		$className = strpos($db->DBDriver, '\\') === false ? '\CodeIgniter\Database\\' . $db->DBDriver . '\\Utils' : $db->DBDriver . '\\Utils';

		// Make sure a connection exists
		if (! $db->connID)
		{
			$db->initialize();
		}

		return new $className($db);
	}

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
