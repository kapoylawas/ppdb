<<<<<<< HEAD
<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\Test\Mock;
=======
<?php namespace CodeIgniter\Test\Mock;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Database\BaseResult;

class MockResult extends BaseResult
{
	/**
	 * Gets the number of fields in the result set.
	 *
	 * @return integer
	 */
	public function getFieldCount(): int
	{
<<<<<<< HEAD
		return 0;
=======
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
<<<<<<< HEAD
		return [];
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
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
		return [];
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Frees the current result.
	 *
	 * @return mixed
	 */
	public function freeResult()
	{
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
	 */
	public function dataSeek($n = 0)
	{
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
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the result set as an object.
	 *
	 * Overridden by child classes.
	 *
	 * @param string $className
	 *
	 * @return object
	 */
	protected function fetchObject($className = 'stdClass')
	{
<<<<<<< HEAD
		return new $className;
	}

	//--------------------------------------------------------------------

	/**
	 * Gets the number of fields in the result set.
	 *
	 * @return integer
	 */
	public function getNumRows(): int
	{
		return 0;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------
}
