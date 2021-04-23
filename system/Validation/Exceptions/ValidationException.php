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

namespace CodeIgniter\Validation\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class ValidationException extends FrameworkException
=======
<?php namespace CodeIgniter\Validation\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class ValidationException extends FrameworkException implements ExceptionInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	public static function forRuleNotFound(string $rule = null)
	{
		return new static(lang('Validation.ruleNotFound', [$rule]));
	}

	public static function forGroupNotFound(string $group = null)
	{
		return new static(lang('Validation.groupNotFound', [$group]));
	}

	public static function forGroupNotArray(string $group = null)
	{
		return new static(lang('Validation.groupNotArray', [$group]));
	}

	public static function forInvalidTemplate(string $template = null)
	{
		return new static(lang('Validation.invalidTemplate', [$template]));
	}

	public static function forNoRuleSets()
	{
		return new static(lang('Validation.noRuleSets'));
	}
}
