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

namespace CodeIgniter\Exceptions;
=======
<?php namespace CodeIgniter\Exceptions;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Exception for automatic logging.
 */
<<<<<<< HEAD
class ConfigException extends CriticalError
{
	use DebugTraceableTrait;
=======

class ConfigException extends CriticalError
{
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Error code
	 *
	 * @var integer
	 */
	protected $code = 3;

	public static function forDisabledMigrations()
	{
		return new static(lang('Migrations.disabled'));
	}
}
