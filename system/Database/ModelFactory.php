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

namespace CodeIgniter\Database;

use CodeIgniter\Config\Factories;

/**
 * Returns new or shared Model instances
 *
 * @deprecated Use CodeIgniter\Config\Factories::models()
 */
class ModelFactory
{
	/**
	 * Creates new Model instances or returns a shared instance
	 *
	 * @param string              $name       Model name, namespace optional
=======
<?php namespace CodeIgniter\Database;

use Config\Services;

class ModelFactory
{
	/**
	 * Cache for instance of any models that
	 * have been requested as "shared" instance.
	 *
	 * @var array
	 */
	static private $instances = [];

	/**
	 * Create new configuration instances or return
	 * a shared instance
	 *
	 * @param string              $name       Configuration name
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @param boolean             $getShared  Use shared instance
	 * @param ConnectionInterface $connection
	 *
	 * @return mixed|null
	 */
	public static function get(string $name, bool $getShared = true, ConnectionInterface $connection = null)
	{
<<<<<<< HEAD
		return Factories::models($name, ['getShared' => $getShared], $connection);
=======
		$class = $name;
		if (($pos = strrpos($name, '\\')) !== false)
		{
			$class = substr($name, $pos + 1);
		}

		if (! $getShared)
		{
			return self::createClass($name, $connection);
		}

		if (! isset( self::$instances[$class] ))
		{
			self::$instances[$class] = self::createClass($name, $connection);
		}
		return self::$instances[$class];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Helper method for injecting mock instances while testing.
	 *
<<<<<<< HEAD
	 * @param string $name
	 * @param object $instance
	 */
	public static function injectMock(string $name, $instance)
	{
		Factories::injectMock('models', $name, $instance);
	}

	/**
	 * Resets the static arrays
	 */
	public static function reset()
	{
		Factories::reset('models');
=======
	 * @param string   $class
	 * @param $instance
	 */
	public static function injectMock(string $class, $instance)
	{
		self::$instances[$class] = $instance;
	}

	/**
	 * Resets the instances array
	 */
	public static function reset()
	{
		static::$instances = [];
	}

	/**
	 * Find configuration class and create instance
	 *
	 * @param string                   $name       Classname
	 * @param ConnectionInterface|null $connection
	 *
	 * @return mixed|null
	 */
	private static function createClass(string $name, ConnectionInterface &$connection = null)
	{
		if (class_exists($name))
		{
			return new $name();
		}

		$locator = Services::locator();
		$file    = $locator->locateFile($name, 'Models');

		if (empty($file))
		{
			// No file found - check if the class was namespaced
			if (strpos($name, '\\') !== false)
			{
				// Class was namespaced and locateFile couldn't find it
				return null;
			}

			// Check all namespaces
			$files = $locator->search('Models/' . $name);
			if (empty($files))
			{
				return null;
			}

			// Get the first match (prioritizes user and framework)
			$file = reset($files);
		}

		$name = $locator->getClassname($file);

		if (empty($name))
		{
			return null;
		}

		return new $name($connection);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}
