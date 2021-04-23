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

namespace CodeIgniter\Pager\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class PagerException extends FrameworkException
=======
<?php namespace CodeIgniter\Pager\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class PagerException extends FrameworkException implements ExceptionInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	public static function forInvalidTemplate(string $template = null)
	{
		return new static(lang('Pager.invalidTemplate', [$template]));
	}

	public static function forInvalidPaginationGroup(string $group = null)
	{
		return new static(lang('Pager.invalidPaginationGroup', [$group]));
	}
}
