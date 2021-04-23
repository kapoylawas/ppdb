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

namespace CodeIgniter\Log\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class LogException extends FrameworkException
=======
<?php namespace CodeIgniter\Log\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class LogException extends FrameworkException implements ExceptionInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	public static function forInvalidLogLevel(string $level)
	{
		return new static(lang('Log.invalidLogLevel', [$level]));
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
