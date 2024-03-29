<?php
<<<<<<< HEAD

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
/**
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

namespace CodeIgniter\View;

use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\View\Exceptions\ViewException;
use Config\Services;
<<<<<<< HEAD
use ReflectionException;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use ReflectionMethod;

/**
 * Class Cell
 *
 * A simple class that can call any other class that can be loaded,
 * and echo out it's result. Intended for displaying small blocks of
 * content within views that can be managed by other libraries and
 * not require they are loaded within controller.
 *
 * Used with the helper function, it's use will look like:
 *
 *         viewCell('\Some\Class::method', 'limit=5 sort=asc', 60, 'cache-name');
 *
 * Parameters are matched up with the callback method's arguments of the same name:
 *
 *         class Class {
 *             function method($limit, $sort)
 *         }
 *
 * Alternatively, the params will be passed into the callback method as a simple array
 * if matching params are not found.
 *
 *         class Class {
 *             function method(array $params=null)
 *         }
<<<<<<< HEAD
 */
class Cell
{
=======
 *
 * @package CodeIgniter\View
 */
class Cell
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Instance of the current Cache Instance
	 *
	 * @var CacheInterface
	 */
	protected $cache;

	//--------------------------------------------------------------------

	/**
	 * Cell constructor.
	 *
<<<<<<< HEAD
	 * @param CacheInterface $cache
=======
	 * @param \CodeIgniter\Cache\CacheInterface $cache
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __construct(CacheInterface $cache)
	{
		$this->cache = $cache;
	}

	//--------------------------------------------------------------------

	/**
	 * Render a cell, returning its body as a string.
	 *
	 * @param string      $library
	 * @param null        $params
	 * @param integer     $ttl
	 * @param string|null $cacheName
	 *
	 * @return string
<<<<<<< HEAD
	 * @throws ReflectionException
=======
	 * @throws \ReflectionException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function render(string $library, $params = null, int $ttl = 0, string $cacheName = null): string
	{
		list($class, $method) = $this->determineClass($library);

		// Is it cached?
		$cacheName = ! empty($cacheName)
			? $cacheName
			: str_replace(['\\', '/'], '', $class) . $method . md5(serialize($params));

		if (! empty($this->cache) && $output = $this->cache->get($cacheName))
		{
			return $output;
		}

		// Not cached - so grab it...
		$instance = new $class();

		if (method_exists($instance, 'initController'))
		{
			$instance->initController(Services::request(), Services::response(), Services::logger());
		}

		if (! method_exists($instance, $method))
		{
			throw ViewException::forInvalidCellMethod($class, $method);
		}

		// Try to match up the parameter list we were provided
		// with the parameter name in the callback method.
		$paramArray = $this->prepareParams($params);
		$refMethod  = new ReflectionMethod($instance, $method);
		$paramCount = $refMethod->getNumberOfParameters();
		$refParams  = $refMethod->getParameters();

		if ($paramCount === 0)
		{
			if (! empty($paramArray))
			{
				throw ViewException::forMissingCellParameters($class, $method);
			}

			$output = $instance->{$method}();
		}
<<<<<<< HEAD
		elseif (($paramCount === 1)
			&& ((! array_key_exists($refParams[0]->name, $paramArray))
			|| (array_key_exists($refParams[0]->name, $paramArray)
			&& count($paramArray) !== 1))
=======
		elseif (($paramCount === 1) && (
				( ! array_key_exists($refParams[0]->name, $paramArray)) ||
				(array_key_exists($refParams[0]->name, $paramArray) && count($paramArray) !== 1) )
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		)
		{
			$output = $instance->{$method}($paramArray);
		}
		else
		{
<<<<<<< HEAD
			$fireArgs     = [];
			$methodParams = [];

			foreach ($refParams as $arg)
			{
				$methodParams[$arg->name] = true;
=======
			$fireArgs      = [];
			$method_params = [];

			foreach ($refParams as $arg)
			{
				$method_params[$arg->name] = true;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				if (array_key_exists($arg->name, $paramArray))
				{
					$fireArgs[$arg->name] = $paramArray[$arg->name];
				}
			}

			foreach ($paramArray as $key => $val)
			{
<<<<<<< HEAD
				if (! isset($methodParams[$key]))
=======
				if (! isset($method_params[$key]))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				{
					throw ViewException::forInvalidCellParameter($key);
				}
			}

			$output = $instance->$method(...array_values($fireArgs));
		}
		// Can we cache it?
		if (! empty($this->cache) && $ttl !== 0)
		{
			$this->cache->save($cacheName, $output, $ttl);
		}
		return $output;
	}

	//--------------------------------------------------------------------

	/**
	 * Parses the params attribute. If an array, returns untouched.
	 * If a string, it should be in the format "key1=value key2=value".
	 * It will be split and returned as an array.
	 *
<<<<<<< HEAD
	 * @param mixed $params
=======
	 * @param $params
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return array|null
	 */
	public function prepareParams($params)
	{
<<<<<<< HEAD
		if (empty($params) || (! is_string($params) && ! is_array($params)))
=======
		if (empty($params) || ( ! is_string($params) && ! is_array($params)))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return [];
		}

		if (is_string($params))
		{
<<<<<<< HEAD
			$newParams = [];
			$separator = ' ';
=======
			$new_params = [];
			$separator  = ' ';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			if (strpos($params, ',') !== false)
			{
				$separator = ',';
			}

			$params = explode($separator, $params);
			unset($separator);

			foreach ($params as $p)
			{
				if (! empty($p))
				{
<<<<<<< HEAD
					list($key, $val)       = explode('=', $p);
					$newParams[trim($key)] = trim($val, ', ');
				}
			}

			$params = $newParams;

			unset($newParams);
=======
					list($key, $val)        = explode('=', $p);
					$new_params[trim($key)] = trim($val, ', ');
				}
			}

			$params = $new_params;

			unset($new_params);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		if (is_array($params) && empty($params))
		{
			return [];
		}

		return $params;
	}

	//--------------------------------------------------------------------

	/**
	 * Given the library string, attempts to determine the class and method
	 * to call.
	 *
	 * @param string $library
	 *
	 * @return array
	 */
	protected function determineClass(string $library): array
	{
		// We don't want to actually call static methods
		// by default, so convert any double colons.
		$library = str_replace('::', ':', $library);

		list($class, $method) = explode(':', $library);

		if (empty($class))
		{
			throw ViewException::forNoCellClass();
		}

		if (! class_exists($class, true))
		{
			throw ViewException::forInvalidCellClass($class);
		}

		if (empty($method))
		{
			$method = 'index';
		}

		return [
			$class,
			$method,
		];
	}

	//--------------------------------------------------------------------
}
