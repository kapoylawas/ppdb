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

use OutOfBoundsException;

class PageNotFoundException extends OutOfBoundsException implements ExceptionInterface
{
	use DebugTraceableTrait;

=======
<?php namespace CodeIgniter\Exceptions;

class PageNotFoundException extends \OutOfBoundsException implements ExceptionInterface
{
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Error code
	 *
	 * @var integer
	 */
	protected $code = 404;

	public static function forPageNotFound(string $message = null)
	{
		return new static($message ?? lang('HTTP.pageNotFound'));
	}

	public static function forEmptyController()
	{
		return new static(lang('HTTP.emptyController'));
	}

	public static function forControllerNotFound(string $controller, string $method)
	{
		return new static(lang('HTTP.controllerNotFound', [$controller, $method]));
	}

	public static function forMethodNotFound(string $method)
	{
		return new static(lang('HTTP.methodNotFound', [$method]));
	}
}
