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

namespace CodeIgniter\Database\SQLite3;

<<<<<<< HEAD
use Closure;
use CodeIgniter\Database\BaseResult;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Entity;
use stdClass;
=======
use CodeIgniter\Database\BaseResult;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\ResultInterface;
use CodeIgniter\Entity;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Result for SQLite3
 */
<<<<<<< HEAD
class Result extends BaseResult
{
=======
class Result extends BaseResult implements ResultInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Gets the number of fields in the result set.
	 *
	 * @return integer
	 */
	public function getFieldCount(): int
	{
<<<<<<< HEAD
		return $this->resultID->numColumns(); // @phpstan-ignore-line
=======
		return $this->resultID->numColumns();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Generates an array of column names in the result set.
	 *
	 * @return array
	 */
	public function getFieldNames(): array
	{
		$fieldNames = [];
		for ($i = 0, $c = $this->getFieldCount(); $i < $c; $i ++)
		{
<<<<<<< HEAD
			$fieldNames[] = $this->resultID->columnName($i); // @phpstan-ignore-line
=======
			$fieldNames[] = $this->resultID->columnName($i);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return $fieldNames;
	}

	//--------------------------------------------------------------------

	/**
	 * Generates an array of objects representing field meta-data.
	 *
	 * @return array
	 */
	public function getFieldData(): array
	{
<<<<<<< HEAD
		static $dataTypes = [
=======
		static $data_types = [
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			SQLITE3_INTEGER => 'integer',
			SQLITE3_FLOAT   => 'float',
			SQLITE3_TEXT    => 'text',
			SQLITE3_BLOB    => 'blob',
			SQLITE3_NULL    => 'null',
		];

		$retVal = [];
<<<<<<< HEAD
		$this->resultID->fetchArray(SQLITE3_NUM); // @phpstan-ignore-line

		for ($i = 0, $c = $this->getFieldCount(); $i < $c; $i ++)
		{
			$retVal[$i]             = new stdClass();
			$retVal[$i]->name       = $this->resultID->columnName($i); // @phpstan-ignore-line
			$type                   = $this->resultID->columnType($i); // @phpstan-ignore-line
			$retVal[$i]->type       = $type;
			$retVal[$i]->type_name  = isset($dataTypes[$type]) ? $dataTypes[$type] : null;
			$retVal[$i]->max_length = null;
			$retVal[$i]->length     = null;
		}
		$this->resultID->reset(); // @phpstan-ignore-line
=======

		for ($i = 0, $c = $this->getFieldCount(); $i < $c; $i ++)
		{
			$retVal[$i]             = new \stdClass();
			$retVal[$i]->name       = $this->resultID->columnName($i);
			$type                   = $this->resultID->columnType($i);
			$retVal[$i]->type       = $type;
			$retVal[$i]->type_name  = isset($data_types[$type]) ? $data_types[$type] : null;
			$retVal[$i]->max_length = null;
			$retVal[$i]->length     = null;
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $retVal;
	}

	//--------------------------------------------------------------------

	/**
	 * Frees the current result.
	 *
	 * @return void
	 */
	public function freeResult()
	{
		if (is_object($this->resultID))
		{
			$this->resultID->finalize();
			$this->resultID = false;
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Moves the internal pointer to the desired offset. This is called
	 * internally before fetching results to make sure the result set
	 * starts at zero.
	 *
	 * @param integer $n
	 *
	 * @return mixed
<<<<<<< HEAD
	 * @throws DatabaseException
=======
	 * @throws \CodeIgniter\Database\Exceptions\DatabaseException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function dataSeek(int $n = 0)
	{
		if ($n !== 0)
		{
			throw new DatabaseException('SQLite3 doesn\'t support seeking to other offset.');
		}

<<<<<<< HEAD
		return $this->resultID->reset(); // @phpstan-ignore-line
=======
		return $this->resultID->reset();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the result set as an array.
	 *
	 * Overridden by driver classes.
	 *
	 * @return mixed
	 */
	protected function fetchAssoc()
	{
<<<<<<< HEAD
		return $this->resultID->fetchArray(SQLITE3_ASSOC); // @phpstan-ignore-line
=======
		return $this->resultID->fetchArray(SQLITE3_ASSOC);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the result set as an object.
	 *
	 * Overridden by child classes.
	 *
	 * @param string $className
	 *
	 * @return object|boolean
	 */
	protected function fetchObject(string $className = 'stdClass')
	{
		// No native support for fetching rows as objects
		if (($row = $this->fetchAssoc()) === false)
		{
			return false;
		}
<<<<<<< HEAD

		if ($className === 'stdClass')
=======
		elseif ($className === 'stdClass')
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return (object) $row;
		}

		$classObj = new $className();

		if (is_subclass_of($className, Entity::class))
		{
			return $classObj->setAttributes($row);
		}

<<<<<<< HEAD
		$classSet = Closure::bind(function ($key, $value) {
=======
		$classSet = \Closure::bind(function ($key, $value) {
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$this->$key = $value;
		}, $classObj, $className
		);
		foreach (array_keys($row) as $key)
		{
			$classSet($key, $row[$key]);
		}
		return $classObj;
	}

	//--------------------------------------------------------------------
}
