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

namespace CodeIgniter\Config;

use CodeIgniter\Autoloader\Autoloader;
use CodeIgniter\Autoloader\FileLocator;
use Config\Autoload;
use Config\Modules;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This is used in place of a Dependency Injection container primarily
 * due to its simplicity, which allows a better long-term maintenance
 * of the applications built on top of CodeIgniter. A bonus side-effect
 * is that IDEs are able to determine what class you are calling
 * whereas with DI Containers there usually isn't a way for them to do this.
 *
 * @see http://blog.ircmaxell.com/2015/11/simple-easy-risk-and-change.html
 * @see http://www.infoq.com/presentations/Simple-Made-Easy
 */
class BaseService
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Cache for instance of any services that
	 * have been requested as a "shared" instance.
	 * Keys should be lowercase service names.
	 *
	 * @var array
	 */
<<<<<<< HEAD
	protected static $instances = [];
=======
	static protected $instances = [];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Mock objects for testing which are returned if exist.
	 *
	 * @var array
	 */
<<<<<<< HEAD
	protected static $mocks = [];
=======
	static protected $mocks = [];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Have we already discovered other Services?
	 *
	 * @var boolean
	 */
<<<<<<< HEAD
	protected static $discovered = false;
=======
	static protected $discovered = false;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * A cache of other service classes we've found.
	 *
	 * @var array
	 */
<<<<<<< HEAD
	protected static $services = [];

	/**
	 * A cache of the names of services classes found.
	 *
	 * @var array<string>
	 */
	private static $serviceNames = [];
=======
	static protected $services = [];

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Returns a shared instance of any of the class' services.
	 *
	 * $key must be a name matching a service.
	 *
	 * @param string $key
	 * @param array  ...$params
	 *
	 * @return mixed
	 */
	protected static function getSharedInstance(string $key, ...$params)
	{
		$key = strtolower($key);

		// Returns mock if exists
		if (isset(static::$mocks[$key]))
		{
			return static::$mocks[$key];
		}

		if (! isset(static::$instances[$key]))
		{
			// Make sure $getShared is false
			array_push($params, false);

			static::$instances[$key] = static::$key(...$params);
		}

		return static::$instances[$key];
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The Autoloader class is the central class that handles our
	 * spl_autoload_register method, and helper methods.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Autoloader
=======
	 * @return \CodeIgniter\Autoloader\Autoloader
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function autoloader(bool $getShared = true)
	{
		if ($getShared)
		{
			if (empty(static::$instances['autoloader']))
			{
				static::$instances['autoloader'] = new Autoloader();
			}

			return static::$instances['autoloader'];
		}

		return new Autoloader();
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The file locator provides utility methods for looking for non-classes
	 * within namespaced folders, as well as convenience methods for
	 * loading 'helpers', and 'libraries'.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return FileLocator
=======
	 * @return \CodeIgniter\Autoloader\FileLocator
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function locator(bool $getShared = true)
	{
		if ($getShared)
		{
			if (empty(static::$instances['locator']))
			{
<<<<<<< HEAD
				static::$instances['locator'] = new FileLocator(static::autoloader());
			}

			return static::$mocks['locator'] ?? static::$instances['locator'];
=======
				static::$instances['locator'] = new FileLocator(
					static::autoloader()
				);
			}

			return static::$instances['locator'];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return new FileLocator(static::autoloader());
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Provides the ability to perform case-insensitive calling of service
	 * names.
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return mixed
	 */
	public static function __callStatic(string $name, array $arguments)
	{
<<<<<<< HEAD
		$service = static::serviceExists($name);

		if ($service === null)
		{
			return null;
		}

		return $service::$name(...$arguments);
	}

	/**
	 * Check if the requested service is defined and return the declaring
	 * class. Return null if not found.
	 *
	 * @param string $name
	 *
	 * @return string|null
	 */
	public static function serviceExists(string $name): ?string
	{
		static::buildServicesCache();
		$services = array_merge(self::$serviceNames, [Services::class]);
		$name     = strtolower($name);

		foreach ($services as $service)
		{
			if (method_exists($service, $name))
			{
				return $service;
			}
		}

		return null;
	}
=======
		$name = strtolower($name);

		if (method_exists(Services::class, $name))
		{
			return Services::$name(...$arguments);
		}

		return static::discoverServices($name, $arguments);
	}

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Reset shared instances and mocks for testing.
	 *
<<<<<<< HEAD
	 * @param boolean $initAutoloader Initializes autoloader instance
	 */
	public static function reset(bool $initAutoloader = false)
	{
		static::$mocks     = [];
		static::$instances = [];

		if ($initAutoloader)
=======
	 * @param boolean $init_autoloader Initializes autoloader instance
	 */
	public static function reset(bool $init_autoloader = false)
	{
		static::$mocks = [];

		static::$instances = [];

		if ($init_autoloader)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			static::autoloader()->initialize(new Autoload(), new Modules());
		}
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Inject mock object for testing.
	 *
	 * @param string $name
<<<<<<< HEAD
	 * @param mixed  $mock
	 */
	public static function injectMock(string $name, $mock)
	{
		static::$mocks[strtolower($name)] = $mock;
	}

=======
	 * @param $mock
	 */
	public static function injectMock(string $name, $mock)
	{
		$name                 = strtolower($name);
		static::$mocks[$name] = $mock;
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Will scan all psr4 namespaces registered with system to look
	 * for new Config\Services files. Caches a copy of each one, then
	 * looks for the service method in each, returning an instance of
	 * the service, if available.
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return mixed
<<<<<<< HEAD
	 *
	 * @deprecated
	 *
	 * @codeCoverageIgnore
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected static function discoverServices(string $name, array $arguments)
	{
		if (! static::$discovered)
		{
			$config = config('Modules');

			if ($config->shouldDiscover('services'))
			{
				$locator = static::locator();
				$files   = $locator->search('Config/Services');

				if (empty($files))
				{
					// no files at all found - this would be really, really bad
					return null;
				}

				// Get instances of all service classes and cache them locally.
				foreach ($files as $file)
				{
					$classname = $locator->getClassname($file);

<<<<<<< HEAD
					if (! in_array($classname, ['CodeIgniter\\Config\\Services'], true))
=======
					if (! in_array($classname, ['CodeIgniter\\Config\\Services']))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					{
						static::$services[] = new $classname();
					}
				}
			}

			static::$discovered = true;
		}

		if (! static::$services)
		{
			// we found stuff, but no services - this would be really bad
			return null;
		}

		// Try to find the desired service method
		foreach (static::$services as $class)
		{
<<<<<<< HEAD
			if (method_exists($class, $name))
=======
			if (method_exists(get_class($class), $name))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				return $class::$name(...$arguments);
			}
		}

		return null;
	}
<<<<<<< HEAD

	protected static function buildServicesCache(): void
	{
		if (! static::$discovered)
		{
			$config = config('Modules');

			if ($config->shouldDiscover('services'))
			{
				$locator = static::locator();
				$files   = $locator->search('Config/Services');

				// Get instances of all service classes and cache them locally.
				foreach ($files as $file)
				{
					$classname = $locator->getClassname($file);

					if ($classname !== 'CodeIgniter\\Config\\Services')
					{
						self::$serviceNames[] = $classname;
						static::$services[]   = new $classname();
					}
				}
			}

			static::$discovered = true;
		}
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
