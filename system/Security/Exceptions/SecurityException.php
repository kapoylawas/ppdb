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

namespace CodeIgniter\Security\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class SecurityException extends FrameworkException
{
	public static function forDisallowedAction()
	{
		return new static(lang('Security.disallowedAction'), 403);
	}
	
	public static function forInvalidSameSite(string $samesite)
	{
		return new static(lang('Security.invalidSameSite', [$samesite]));
=======
<?php namespace CodeIgniter\Security\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class SecurityException extends FrameworkException implements ExceptionInterface
{
	public static function forDisallowedAction()
	{
		return new static(lang('HTTP.disallowedAction'), 403);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}
