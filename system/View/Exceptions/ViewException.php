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

namespace CodeIgniter\View\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class ViewException extends FrameworkException
=======
<?php namespace CodeIgniter\View\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class ViewException extends FrameworkException implements ExceptionInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	public static function forInvalidCellMethod(string $class, string $method)
	{
		return new static(lang('View.invalidCellMethod', ['class' => $class, 'method' => $method]));
	}

	public static function forMissingCellParameters(string $class, string $method)
	{
		return new static(lang('View.missingCellParameters', ['class' => $class, 'method' => $method]));
	}

	public static function forInvalidCellParameter(string $key)
	{
		return new static(lang('View.invalidCellParameter', [$key]));
	}

	public static function forNoCellClass()
	{
		return new static(lang('View.noCellClass'));
	}

	public static function forInvalidCellClass(string $class = null)
	{
		return new static(lang('View.invalidCellClass', [$class]));
	}

	public static function forTagSyntaxError(string $output)
	{
		return new static(lang('View.tagSyntaxError', [$output]));
	}
}
