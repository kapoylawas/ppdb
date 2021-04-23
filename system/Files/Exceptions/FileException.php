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

namespace CodeIgniter\Files\Exceptions;

use CodeIgniter\Exceptions\DebugTraceableTrait;
use CodeIgniter\Exceptions\ExceptionInterface;
use RuntimeException;

class FileException extends RuntimeException implements ExceptionInterface
{
	use DebugTraceableTrait;
=======
<?php namespace CodeIgniter\Files\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;

class FileException extends \RuntimeException implements ExceptionInterface
{
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	public static function forUnableToMove(string $from = null, string $to = null, string $error = null)
	{
		return new static(lang('Files.cannotMove', [$from, $to, $error]));
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
