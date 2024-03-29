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

namespace CodeIgniter\Database\Postgre;

<<<<<<< HEAD
use BadMethodCallException;
use CodeIgniter\Database\BasePreparedQuery;
use Exception;
=======
use CodeIgniter\Database\BasePreparedQuery;
use CodeIgniter\Database\PreparedQueryInterface;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Prepared query for Postgre
 */
<<<<<<< HEAD
class PreparedQuery extends BasePreparedQuery
{
=======
class PreparedQuery extends BasePreparedQuery implements PreparedQueryInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Stores the name this query can be
	 * used under by postgres. Only used internally.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The result resource from a successful
	 * pg_exec. Or false.
	 *
<<<<<<< HEAD
	 * @var Result|boolean
	 */
	protected $result;

=======
	 * @var
	 */
	protected $result;

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Prepares the query against the database, and saves the connection
	 * info necessary to execute the query later.
	 *
	 * NOTE: This version is based on SQL code. Child classes should
	 * override this method.
	 *
	 * @param string $sql
	 * @param array  $options Passed to the connection's prepare statement.
	 *                        Unused in the MySQLi driver.
	 *
	 * @return mixed
<<<<<<< HEAD
	 * @throws Exception
	 */
	public function _prepare(string $sql, array $options = [])
	{
		$this->name = (string) random_int(1, 10000000000000000);
=======
	 * @throws \Exception
	 */
	public function _prepare(string $sql, array $options = [])
	{
		$this->name = random_int(1, 10000000000000000);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		$sql = $this->parameterize($sql);

		// Update the query object since the parameters are slightly different
		// than what was put in.
		$this->query->setQuery($sql);

		if (! $this->statement = pg_prepare($this->db->connID, $this->name, $sql))
		{
			$this->errorCode   = 0;
			$this->errorString = pg_last_error($this->db->connID);
		}

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Takes a new set of data and runs it against the currently
	 * prepared query. Upon success, will return a Results object.
	 *
	 * @param array $data
	 *
	 * @return boolean
	 */
	public function _execute(array $data): bool
	{
<<<<<<< HEAD
		if (! isset($this->statement))
		{
			throw new BadMethodCallException('You must call prepare before trying to execute a prepared statement.');
=======
		if (is_null($this->statement))
		{
			throw new \BadMethodCallException('You must call prepare before trying to execute a prepared statement.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		$this->result = pg_execute($this->db->connID, $this->name, $data);

		return (bool) $this->result;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Returns the result object for the prepared query.
	 *
	 * @return mixed
	 */
	public function _getResult()
	{
		return $this->result;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Replaces the ? placeholders with $1, $2, etc parameters for use
	 * within the prepared query.
	 *
	 * @param string $sql
	 *
	 * @return string
	 */
	public function parameterize(string $sql): string
	{
		// Track our current value
		$count = 0;

		return preg_replace_callback('/\?/', function ($matches) use (&$count) {
			$count ++;
			return "\${$count}";
		}, $sql);
	}
<<<<<<< HEAD
=======

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
