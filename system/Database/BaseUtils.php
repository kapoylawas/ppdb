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

use CodeIgniter\Database\Exceptions\DatabaseException;

/**
 * Class BaseUtils
 */
abstract class BaseUtils
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Database object
	 *
	 * @var object
	 */
	protected $db;

	//--------------------------------------------------------------------

	/**
	 * List databases statement
	 *
<<<<<<< HEAD
	 * @var string|boolean
=======
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $listDatabases = false;

	/**
	 * OPTIMIZE TABLE statement
	 *
<<<<<<< HEAD
	 * @var string|boolean
=======
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $optimizeTable = false;

	/**
	 * REPAIR TABLE statement
	 *
<<<<<<< HEAD
	 * @var string|boolean
=======
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $repairTable = false;

	//--------------------------------------------------------------------

	/**
	 * Class constructor
	 *
<<<<<<< HEAD
	 * @param ConnectionInterface $db
=======
	 * @param ConnectionInterface|object $db
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __construct(ConnectionInterface &$db)
	{
		$this->db = & $db;
	}

	//--------------------------------------------------------------------

	/**
	 * List databases
	 *
	 * @return array|boolean
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function listDatabases()
	{
		// Is there a cached result?
		if (isset($this->db->dataCache['db_names']))
		{
			return $this->db->dataCache['db_names'];
		}
<<<<<<< HEAD

		if ($this->listDatabases === false)
=======
		elseif ($this->listDatabases === false)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('Unsupported feature of the database platform you are using.');
			}
			return false;
		}

		$this->db->dataCache['db_names'] = [];

		$query = $this->db->query($this->listDatabases);
		if ($query === false)
		{
			return $this->db->dataCache['db_names'];
		}

		for ($i = 0, $query = $query->getResultArray(), $c = count($query); $i < $c; $i ++)
		{
			$this->db->dataCache['db_names'][] = current($query[$i]);
		}

		return $this->db->dataCache['db_names'];
	}

	//--------------------------------------------------------------------

	/**
	 * Determine if a particular database exists
	 *
<<<<<<< HEAD
	 * @param  string $databaseName
	 * @return boolean
	 */
	public function databaseExists(string $databaseName): bool
	{
		return in_array($databaseName, $this->listDatabases(), true);
=======
	 * @param  string $database_name
	 * @return boolean
	 */
	public function databaseExists(string $database_name): bool
	{
		return in_array($database_name, $this->listDatabases());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Optimize Table
	 *
<<<<<<< HEAD
	 * @param  string $tableName
	 * @return mixed
	 * @throws DatabaseException
	 */
	public function optimizeTable(string $tableName)
=======
	 * @param  string $table_name
	 * @return mixed
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
	 */
	public function optimizeTable(string $table_name)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($this->optimizeTable === false)
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('Unsupported feature of the database platform you are using.');
			}
			return false;
		}

<<<<<<< HEAD
		$query = $this->db->query(sprintf($this->optimizeTable, $this->db->escapeIdentifiers($tableName)));
=======
		$query = $this->db->query(sprintf($this->optimizeTable, $this->db->escapeIdentifiers($table_name)));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if ($query !== false)
		{
			$query = $query->getResultArray();
			return current($query);
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Optimize Database
	 *
	 * @return mixed
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function optimizeDatabase()
	{
		if ($this->optimizeTable === false)
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('Unsupported feature of the database platform you are using.');
			}
			return false;
		}

		$result = [];
<<<<<<< HEAD
		foreach ($this->db->listTables() as $tableName)
		{
			$res = $this->db->query(sprintf($this->optimizeTable, $this->db->escapeIdentifiers($tableName)));
=======
		foreach ($this->db->listTables() as $table_name)
		{
			$res = $this->db->query(sprintf($this->optimizeTable, $this->db->escapeIdentifiers($table_name)));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			if (is_bool($res))
			{
				return $res;
			}

			// Build the result array...

			$res = $res->getResultArray();

			// Postgre & SQLite3 returns empty array
			if (empty($res))
			{
<<<<<<< HEAD
				$key = $tableName;
=======
				$key = $table_name;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}
			else
			{
				$res  = current($res);
				$key  = str_replace($this->db->database . '.', '', current($res));
				$keys = array_keys($res);
				unset($res[$keys[0]]);
			}

			$result[$key] = $res;
		}

		return $result;
	}

	//--------------------------------------------------------------------

	/**
	 * Repair Table
	 *
<<<<<<< HEAD
	 * @param  string $tableName
	 * @return mixed
	 * @throws DatabaseException
	 */
	public function repairTable(string $tableName)
=======
	 * @param  string $table_name
	 * @return mixed
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
	 */
	public function repairTable(string $table_name)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($this->repairTable === false)
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('Unsupported feature of the database platform you are using.');
			}
			return false;
		}

<<<<<<< HEAD
		$query = $this->db->query(sprintf($this->repairTable, $this->db->escapeIdentifiers($tableName)));
=======
		$query = $this->db->query(sprintf($this->repairTable, $this->db->escapeIdentifiers($table_name)));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (is_bool($query))
		{
			return $query;
		}

		$query = $query->getResultArray();
		return current($query);
	}

	//--------------------------------------------------------------------

	/**
	 * Generate CSV from a query result object
	 *
	 * @param ResultInterface $query     Query result object
	 * @param string          $delim     Delimiter (default: ,)
	 * @param string          $newline   Newline character (default: \n)
	 * @param string          $enclosure Enclosure (default: ")
	 *
	 * @return string
	 */
	public function getCSVFromResult(ResultInterface $query, string $delim = ',', string $newline = "\n", string $enclosure = '"')
	{
		$out = '';
		// First generate the headings from the table column names
		foreach ($query->getFieldNames() as $name)
		{
			$out .= $enclosure . str_replace($enclosure, $enclosure . $enclosure, $name) . $enclosure . $delim;
		}

		$out = substr($out, 0, -strlen($delim)) . $newline;

		// Next blast through the result array and build out the rows
		while ($row = $query->getUnbufferedRow('array'))
		{
			$line = [];
			foreach ($row as $item)
			{
				$line[] = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $item) . $enclosure;
			}
			$out .= implode($delim, $line) . $newline;
		}

		return $out;
	}

	//--------------------------------------------------------------------

	/**
	 * Generate XML data from a query result object
	 *
	 * @param ResultInterface $query  Query result object
	 * @param array           $params Any preferences
	 *
	 * @return string
	 */
	public function getXMLFromResult(ResultInterface $query, array $params = []): string
	{
		// Set our default values
		foreach (['root' => 'root', 'element' => 'element', 'newline' => "\n", 'tab' => "\t"] as $key => $val)
		{
			if (! isset($params[$key]))
			{
				$params[$key] = $val;
			}
		}

		// Create variables for convenience
<<<<<<< HEAD
		$root    = $params['root'];
		$newline = $params['newline'];
		$tab     = $params['tab'];
		$element = $params['element'];
=======
		extract($params);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Load the xml helper
		helper('xml');
		// Generate the result
		$xml = '<' . $root . '>' . $newline;
		while ($row = $query->getUnbufferedRow())
		{
			$xml .= $tab . '<' . $element . '>' . $newline;
<<<<<<< HEAD

			foreach ($row as $key => $val)
			{
				$val = (! empty($val)) ? xml_convert($val) : '';

				$xml .= $tab . $tab . '<' . $key . '>' . $val . '</' . $key . '>' . $newline;
			}

=======
			foreach ($row as $key => $val)
			{
				$val  = (! empty($val)) ? xml_convert($val) : '';
				$xml .= $tab . $tab . '<' . $key . '>' . $val . '</' . $key . '>' . $newline;
			}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$xml .= $tab . '</' . $element . '>' . $newline;
		}

		return $xml . '</' . $root . '>' . $newline;
	}

	//--------------------------------------------------------------------

	/**
	 * Database Backup
	 *
	 * @param  array|string $params
	 * @return mixed
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function backup($params = [])
	{
		// If the parameters have not been submitted as an
		// array then we know that it is simply the table
		// name, which is a valid short cut.
		if (is_string($params))
		{
			$params = ['tables' => $params];
		}

		// Set up our default preferences
		$prefs = [
			'tables'             => [],
			'ignore'             => [],
			'filename'           => '',
			'format'             => 'gzip', // gzip, txt
			'add_drop'           => true,
			'add_insert'         => true,
			'newline'            => "\n",
			'foreign_key_checks' => true,
		];

		// Did the user submit any preferences? If so set them....
		if (! empty($params))
		{
			foreach ($prefs as $key => $val)
			{
				if (isset($params[$key]))
				{
					$prefs[$key] = $params[$key];
				}
			}
		}

		// Are we backing up a complete database or individual tables?
		// If no table names were submitted we'll fetch the entire table list
		if (empty($prefs['tables']))
		{
			$prefs['tables'] = $this->db->listTables();
		}

		// Validate the format
		if (! in_array($prefs['format'], ['gzip', 'txt'], true))
		{
			$prefs['format'] = 'txt';
		}

		// Is the encoder supported? If not, we'll either issue an
		// error or use plain text depending on the debug settings
		if ($prefs['format'] === 'gzip' && ! function_exists('gzencode'))
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('The file compression format you chose is not supported by your server.');
			}

			$prefs['format'] = 'txt';
		}

		if ($prefs['format'] === 'txt') // Was a text file requested?
		{
			return $this->_backup($prefs);
		}

		return gzencode($this->_backup($prefs));
	}

	//--------------------------------------------------------------------

	/**
	 * Platform dependent version of the backup function.
	 *
	 * @param array|null $prefs
	 *
	 * @return mixed
	 */
	abstract public function _backup(array $prefs = null);

	//--------------------------------------------------------------------
}
