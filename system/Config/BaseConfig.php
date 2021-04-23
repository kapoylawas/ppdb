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

<<<<<<< HEAD
use Config\Encryption;
use Config\Modules;
use Config\Services;
use ReflectionClass;
use ReflectionException;
use RuntimeException;

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
/**
 * Class BaseConfig
 *
 * Not intended to be used on its own, this class will attempt to
 * automatically populate the child class' properties with values
 * from the environment.
 *
 * These can be set within the .env file.
 */
class BaseConfig
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * An optional array of classes that will act as Registrars
	 * for rapidly setting config class properties.
	 *
	 * @var array
	 */
	public static $registrars = [];

	/**
	 * Has module discovery happened yet?
	 *
	 * @var boolean
	 */
	protected static $didDiscovery = false;

	/**
	 * The modules configuration.
	 *
<<<<<<< HEAD
	 * @var Modules
=======
	 * @var type
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected static $moduleConfig;

	/**
	 * Will attempt to get environment variables with names
	 * that match the properties of the child class.
	 *
	 * The "shortPrefix" is the lowercase-only config class name.
	 */
	public function __construct()
	{
		static::$moduleConfig = config('Modules');

		$properties  = array_keys(get_object_vars($this));
<<<<<<< HEAD
		$prefix      = static::class;
=======
		$prefix      = get_class($this);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$slashAt     = strrpos($prefix, '\\');
		$shortPrefix = strtolower(substr($prefix, $slashAt === false ? 0 : $slashAt + 1));

		foreach ($properties as $property)
		{
			$this->initEnvValue($this->$property, $property, $prefix, $shortPrefix);

<<<<<<< HEAD
			if ($this instanceof Encryption && $property === 'key')
			{
				// Handle hex2bin prefix
				if (strpos($this->$property, 'hex2bin:') === 0)
				{
					$this->$property = hex2bin(substr($this->$property, 8));
				}
				// Handle base64 prefix
				elseif (strpos($this->$property, 'base64:') === 0)
				{
					$this->$property = base64_decode(substr($this->$property, 7), true);
				}
			}
		}

		$this->registerProperties();
	}

	/**
	 * Initialization an environment-specific configuration setting
	 *
	 * @param mixed  $property
=======
			// Handle hex2bin prefix
                      if ($shortPrefix === 'encryption' && $property === 'key' && strpos($this->$property, 'hex2bin:') === 0)
			{
				$this->$property = hex2bin(substr($this->$property, 8));
			}
		}

		if (defined('ENVIRONMENT') && ENVIRONMENT !== 'testing')
		{
			// well, this won't happen during unit testing
			// @codeCoverageIgnoreStart
			$this->registerProperties();
			// @codeCoverageIgnoreEnd
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Initialization an environment-specific configuration setting
	 *
	 * @param mixed  &$property
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @param string $name
	 * @param string $prefix
	 * @param string $shortPrefix
	 *
	 * @return mixed
	 */
	protected function initEnvValue(&$property, string $name, string $prefix, string $shortPrefix)
	{
		if (is_array($property))
		{
			foreach ($property as $key => $val)
			{
				$this->initEnvValue($property[$key], "{$name}.{$key}", $prefix, $shortPrefix);
			}
		}
		else
		{
			if (($value = $this->getEnvValue($name, $prefix, $shortPrefix)) !== false)
			{
				if (! is_null($value))
				{
					if ($value === 'false')
					{
						$value = false;
					}
					elseif ($value === 'true')
					{
						$value = true;
					}

					$property = is_bool($value) ? $value : trim($value, '\'"');
				}
			}
		}
		return $property;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Retrieve an environment-specific configuration setting
	 *
	 * @param string $property
	 * @param string $prefix
	 * @param string $shortPrefix
	 *
	 * @return mixed
	 */
	protected function getEnvValue(string $property, string $prefix, string $shortPrefix)
	{
		$shortPrefix = ltrim($shortPrefix, '\\');
		switch (true)
		{
			case array_key_exists("{$shortPrefix}.{$property}", $_ENV):
				return $_ENV["{$shortPrefix}.{$property}"];
			case array_key_exists("{$shortPrefix}.{$property}", $_SERVER):
				return $_SERVER["{$shortPrefix}.{$property}"];
			case array_key_exists("{$prefix}.{$property}", $_ENV):
				return $_ENV["{$prefix}.{$property}"];
			case array_key_exists("{$prefix}.{$property}", $_SERVER):
				return $_SERVER["{$prefix}.{$property}"];
			default:
				$value = getenv($property);
				return $value === false ? null : $value;
		}
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Provides external libraries a simple way to register one or more
	 * options into a config file.
	 *
<<<<<<< HEAD
	 * @throws ReflectionException
=======
	 * @throws \ReflectionException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function registerProperties()
	{
		if (! static::$moduleConfig->shouldDiscover('registrars'))
		{
			return;
		}

		if (! static::$didDiscovery)
		{
<<<<<<< HEAD
			$locator         = Services::locator();
=======
			$locator         = \Config\Services::locator();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$registrarsFiles = $locator->search('Config/Registrar.php');

			foreach ($registrarsFiles as $file)
			{
				$className            = $locator->getClassname($file);
				static::$registrars[] = new $className();
			}

			static::$didDiscovery = true;
		}

<<<<<<< HEAD
		$shortName = (new ReflectionClass($this))->getShortName();
=======
		$shortName = (new \ReflectionClass($this))->getShortName();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Check the registrar class for a method named after this class' shortName
		foreach (static::$registrars as $callable)
		{
			// ignore non-applicable registrars
			if (! method_exists($callable, $shortName))
			{
<<<<<<< HEAD
				// @codeCoverageIgnoreStart
				continue;
				// @codeCoverageIgnoreEnd
=======
				continue;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}

			$properties = $callable::$shortName();

			if (! is_array($properties))
			{
<<<<<<< HEAD
				throw new RuntimeException('Registrars must return an array of properties and their values.');
=======
				throw new \RuntimeException('Registrars must return an array of properties and their values.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}

			foreach ($properties as $property => $value)
			{
				if (isset($this->$property) && is_array($this->$property) && is_array($value))
				{
					$this->$property = array_merge($this->$property, $value);
				}
				else
				{
					$this->$property = $value;
				}
			}
		}
	}
<<<<<<< HEAD
=======

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
