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

namespace CodeIgniter\Database\SQLite3;

<<<<<<< HEAD
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Forge as BaseForge;
=======
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\Exceptions\DatabaseException;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Forge for SQLite3
 */
<<<<<<< HEAD
class Forge extends BaseForge
{
=======
class Forge extends \CodeIgniter\Database\Forge
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * UNSIGNED support
	 *
	 * @var boolean|array
	 */
	protected $_unsigned = false;

	/**
	 * NULL value representation in CREATE/ALTER TABLE statements
	 *
	 * @var string
	 */
	protected $_null = 'NULL';

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param BaseConnection $db
	 */
	public function __construct(BaseConnection $db)
=======
	 * @param $db ConnectionInterface
	 */
	public function __construct(ConnectionInterface $db)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		parent::__construct($db);

		if (version_compare($this->db->getVersion(), '3.3', '<'))
		{
			$this->createTableIfStr = false;
			$this->dropTableIfStr   = false;
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Create database
	 *
	 * @param string  $dbName
	 * @param boolean $ifNotExists Whether to add IF NOT EXISTS condition
	 *
	 * @return boolean
	 */
	public function createDatabase(string $dbName, bool $ifNotExists = false): bool
	{
		// In SQLite, a database is created when you connect to the database.
		// We'll return TRUE so that an error isn't generated.
		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Drop database
	 *
	 * @param string $dbName
	 *
	 * @return boolean
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function dropDatabase(string $dbName): bool
	{
		// In SQLite, a database is dropped when we delete a file
		if (! is_file($dbName))
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('Unable to drop the specified database.');
			}

			return false;
		}

		// We need to close the pseudo-connection first
		$this->db->close();
		if (! @unlink($dbName))
		{
			if ($this->db->DBDebug)
			{
				throw new DatabaseException('Unable to drop the specified database.');
			}

			return false;
		}

		if (! empty($this->db->dataCache['db_names']))
		{
			$key = array_search(strtolower($dbName), array_map('strtolower', $this->db->dataCache['db_names']), true);
			if ($key !== false)
			{
				unset($this->db->dataCache['db_names'][$key]);
			}
		}

		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * ALTER TABLE
	 *
<<<<<<< HEAD
	 * @param string $alterType ALTER type
	 * @param string $table     Table name
	 * @param mixed  $field     Column definition
	 *
	 * @return string|array|null
	 */
	protected function _alterTable(string $alterType, string $table, $field)
	{
		switch ($alterType)
=======
	 * @param string $alter_type ALTER type
	 * @param string $table      Table name
	 * @param mixed  $field      Column definition
	 *
	 * @return string|array
	 */
	protected function _alterTable(string $alter_type, string $table, $field)
	{
		switch ($alter_type)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			case 'DROP':
				$sqlTable = new Table($this->db, $this);

				$sqlTable->fromTable($table)
					->dropColumn($field)
					->run();

				return '';
			case 'CHANGE':
				$sqlTable = new Table($this->db, $this);

				$sqlTable->fromTable($table)
						 ->modifyColumn($field)
						 ->run();

				return null;
			default:
<<<<<<< HEAD
				return parent::_alterTable($alterType, $table, $field);
=======
				return parent::_alterTable($alter_type, $table, $field);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Process column
	 *
	 * @param array $field
	 *
	 * @return string
	 */
	protected function _processColumn(array $field): string
	{
		if ($field['type'] === 'TEXT' && strpos($field['length'], "('") === 0)
		{
			$field['type'] .= ' CHECK(' . $this->db->escapeIdentifiers($field['name'])
				. ' IN ' . $field['length'] . ')';
		}

		return $this->db->escapeIdentifiers($field['name'])
			   . ' ' . $field['type']
			   . $field['auto_increment']
			   . $field['null']
			   . $field['unique']
			   . $field['default'];
	}

	//--------------------------------------------------------------------

	/**
	 * Process indexes
	 *
	 * @param string $table
	 *
	 * @return array
	 */
	protected function _processIndexes(string $table): array
	{
		$sqls = [];

		for ($i = 0, $c = count($this->keys); $i < $c; $i++)
		{
<<<<<<< HEAD
			$this->keys[$i] = (array) $this->keys[$i];
=======
			$this->keys[$i] = (array)$this->keys[$i];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			for ($i2 = 0, $c2 = count($this->keys[$i]); $i2 < $c2; $i2++)
			{
				if (! isset($this->fields[$this->keys[$i][$i2]]))
				{
					unset($this->keys[$i][$i2]);
				}
			}
			if (count($this->keys[$i]) <= 0)
			{
				continue;
			}

<<<<<<< HEAD
			if (in_array($i, $this->uniqueKeys, true))
=======
			if (in_array($i, $this->uniqueKeys))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$sqls[] = 'CREATE UNIQUE INDEX ' . $this->db->escapeIdentifiers($table . '_' . implode('_', $this->keys[$i]))
						  . ' ON ' . $this->db->escapeIdentifiers($table)
						  . ' (' . implode(', ', $this->db->escapeIdentifiers($this->keys[$i])) . ');';
				continue;
			}

			$sqls[] = 'CREATE INDEX ' . $this->db->escapeIdentifiers($table . '_' . implode('_', $this->keys[$i]))
					  . ' ON ' . $this->db->escapeIdentifiers($table)
					  . ' (' . implode(', ', $this->db->escapeIdentifiers($this->keys[$i])) . ');';
		}

		return $sqls;
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Field attribute TYPE
	 *
	 * Performs a data type mapping between different databases.
	 *
<<<<<<< HEAD
	 * @param array $attributes
=======
	 * @param array &$attributes
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return void
	 */
	protected function _attributeType(array &$attributes)
	{
		switch (strtoupper($attributes['TYPE']))
		{
			case 'ENUM':
			case 'SET':
				$attributes['TYPE'] = 'TEXT';
				break;
			default:
				break;
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Field attribute AUTO_INCREMENT
	 *
<<<<<<< HEAD
	 * @param array $attributes
	 * @param array $field
=======
	 * @param array &$attributes
	 * @param array &$field
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return void
	 */
	protected function _attributeAutoIncrement(array &$attributes, array &$field)
	{
		if (! empty($attributes['AUTO_INCREMENT']) && $attributes['AUTO_INCREMENT'] === true
			&& stripos($field['type'], 'int') !== false)
		{
			$field['type']           = 'INTEGER PRIMARY KEY';
			$field['default']        = '';
			$field['null']           = '';
			$field['unique']         = '';
			$field['auto_increment'] = ' AUTOINCREMENT';

			$this->primaryKeys = [];
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Foreign Key Drop
	 *
	 * @param string $table       Table name
	 * @param string $foreignName Foreign name
	 *
	 * @return boolean
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function dropForeignKey(string $table, string $foreignName): bool
	{
		// If this version of SQLite doesn't support it, we're done here
		if ($this->db->supportsForeignKeys() !== true)
		{
			return true;
		}

		// Otherwise we have to copy the table and recreate
		// without the foreign key being involved now
		$sqlTable = new Table($this->db, $this);

		return $sqlTable->fromTable($this->db->DBPrefix . $table)
			->dropForeignKey($foreignName)
			->run();
	}
<<<<<<< HEAD
=======

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
