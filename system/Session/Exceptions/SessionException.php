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

namespace CodeIgniter\Session\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class SessionException extends FrameworkException
=======
<?php namespace CodeIgniter\Session\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class SessionException extends FrameworkException implements ExceptionInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	public static function forMissingDatabaseTable()
	{
		return new static(lang('Session.missingDatabaseTable'));
	}

	public static function forInvalidSavePath(string $path = null)
	{
		return new static(lang('Session.invalidSavePath', [$path]));
	}

	public static function forWriteProtectedSavePath(string $path = null)
	{
		return new static(lang('Session.writeProtectedSavePath', [$path]));
	}

	public static function forEmptySavepath()
	{
		return new static(lang('Session.emptySavePath'));
	}

	public static function forInvalidSavePathFormat(string $path)
	{
		return new static(lang('Session.invalidSavePathFormat', [$path]));
	}
<<<<<<< HEAD

	public static function forInvalidSameSiteSetting(string $samesite)
	{
		return new static(lang('Session.invalidSameSiteSetting', [$samesite]));
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
