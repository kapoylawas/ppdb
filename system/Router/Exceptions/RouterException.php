<?php

/**
<<<<<<< HEAD
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014-2019 British Columbia Institute of Technology
 * Copyright (c) 2019-2020 CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

namespace CodeIgniter\Router\Exceptions;

<<<<<<< HEAD
=======
use CodeIgniter\Exceptions\ExceptionInterface;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\Exceptions\FrameworkException;

/**
 * RouterException
 */
<<<<<<< HEAD
class RouterException extends FrameworkException
=======
class RouterException extends FrameworkException implements ExceptionInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	/**
	 * Thrown when the actual parameter type does not match
	 * the expected types.
	 *
<<<<<<< HEAD
	 * @return RouterException
=======
	 * @return \CodeIgniter\Router\Exceptions\RouterException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidParameterType()
	{
		return new static(lang('Router.invalidParameterType'));
	}

	/**
	 * Thrown when a default route is not set.
	 *
<<<<<<< HEAD
	 * @return RouterException
=======
	 * @return \CodeIgniter\Router\Exceptions\RouterException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forMissingDefaultRoute()
	{
		return new static(lang('Router.missingDefaultRoute'));
	}
<<<<<<< HEAD

	/**
	 * Throw when controller or its method is not found.
	 *
	 * @param string $controller
	 * @param string $method
	 *
	 * @return RouterException
	 */
	public static function forControllerNotFound(string $controller, string $method)
	{
		return new static(lang('HTTP.controllerNotFound', [$controller, $method]));
	}

	/**
	 * Throw when route is not valid.
	 *
	 * @param string $route
	 *
	 * @return RouterException
	 */
	public static function forInvalidRoute(string $route)
	{
		return new static(lang('HTTP.invalidRoute', [$route]));
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
