<?php

<<<<<<< HEAD
/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\Database\Exceptions;

use CodeIgniter\Exceptions\DebugTraceableTrait;
use RuntimeException;

class DataException extends RuntimeException implements ExceptionInterface
{
	use DebugTraceableTrait;

=======
namespace CodeIgniter\Database\Exceptions;

class DataException extends \RuntimeException implements ExceptionInterface
{
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Used by the Model's trigger() method when the callback cannot be found.
	 *
	 * @param string $method
	 *
<<<<<<< HEAD
	 * @return DataException
=======
	 * @return \CodeIgniter\Database\Exceptions\DataException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidMethodTriggered(string $method)
	{
		return new static(lang('Database.invalidEvent', [$method]));
	}

	/**
	 * Used by Model's insert/update methods when there isn't
	 * any data to actually work with.
	 *
	 * @param string $mode
	 *
<<<<<<< HEAD
	 * @return DataException
=======
	 * @return \CodeIgniter\Database\Exceptions\DataException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forEmptyDataset(string $mode)
	{
		return new static(lang('Database.emptyDataset', [$mode]));
	}

	/**
<<<<<<< HEAD
	 * Used by Model's insert/update methods when there is no
	 * primary key defined and Model has option `useAutoIncrement`
	 * set to false.
	 *
	 * @param string $mode
	 *
	 * @return DataException
	 */
	public static function forEmptyPrimaryKey(string $mode)
	{
		return new static(lang('Database.emptyPrimaryKey', [$mode]));
	}

	/**
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Thrown when an argument for one of the Model's methods
	 * were empty or otherwise invalid, and they could not be
	 * to work correctly for that method.
	 *
	 * @param string $argument
	 *
<<<<<<< HEAD
	 * @return DataException
=======
	 * @return \CodeIgniter\Database\Exceptions\DataException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidArgument(string $argument)
	{
		return new static(lang('Database.invalidArgument', [$argument]));
	}

	public static function forInvalidAllowedFields(string $model)
	{
		return new static(lang('Database.invalidAllowedFields', [$model]));
	}

	public static function forTableNotFound(string $table)
	{
		return new static(lang('Database.tableNotFound', [$table]));
	}

	public static function forEmptyInputGiven(string $argument)
	{
		return new static(lang('Database.forEmptyInputGiven', [$argument]));
	}

	public static function forFindColumnHaveMultipleColumns()
	{
		return new static(lang('Database.forFindColumnHaveMultipleColumns'));
	}
}
