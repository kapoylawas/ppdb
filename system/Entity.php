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

namespace CodeIgniter;

use CodeIgniter\Exceptions\CastException;
use CodeIgniter\I18n\Time;
<<<<<<< HEAD
use DateTime;
use Exception;
use JsonSerializable;
use ReflectionException;
use stdClass;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Entity encapsulation, for use with CodeIgniter\Model
 */
<<<<<<< HEAD
class Entity implements JsonSerializable
=======
class Entity implements \JsonSerializable
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	/**
	 * Maps names used in sets and gets against unique
	 * names within the class, allowing independence from
	 * database column names.
	 *
	 * Example:
	 *  $datamap = [
	 *      'db_name' => 'class_name'
	 *  ];
	 */
	protected $datamap = [];

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * Array of field names and the type of value to cast them as
	 * when they are accessed.
	 */
	protected $casts = [];

	/**
	 * Holds the current values of all class vars.
	 *
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * Holds original copies of all class vars so
	 * we can determine what's actually been changed
	 * and not accidentally write nulls where we shouldn't.
	 *
	 * @var array
	 */
	protected $original = [];

	/**
	 * Holds info whenever properties have to be casted
	 *
	 * @var boolean
	 **/
	private $_cast = true;

	/**
	 * Allows filling in Entity parameters during construction.
	 *
	 * @param array|null $data
	 */
	public function __construct(array $data = null)
	{
		$this->syncOriginal();

		$this->fill($data);
	}

	/**
	 * Takes an array of key/value pairs and sets them as
	 * class properties, using any `setCamelCasedProperty()` methods
	 * that may or may not exist.
	 *
	 * @param array $data
	 *
<<<<<<< HEAD
	 * @return $this
=======
	 * @return \CodeIgniter\Entity
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function fill(array $data = null)
	{
		if (! is_array($data))
		{
			return $this;
		}

		foreach ($data as $key => $value)
		{
<<<<<<< HEAD
			$this->__set($key, $value);
=======
			$this->$key = $value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * General method that will return all public and protected
	 * values of this entity as an array. All values are accessed
	 * through the __get() magic method so will have any casts, etc
	 * applied to them.
	 *
	 * @param boolean $onlyChanged If true, only return values that have changed since object creation
	 * @param boolean $cast        If true, properties will be casted.
<<<<<<< HEAD
	 * @param boolean $recursive   If true, inner entities will be casted as array as well.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function toArray(bool $onlyChanged = false, bool $cast = true, bool $recursive = false): array
=======
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function toArray(bool $onlyChanged = false, bool $cast = true): array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$this->_cast = $cast;
		$return      = [];

<<<<<<< HEAD
		$keys = array_keys($this->attributes);
		$keys = array_filter($keys, function ($key) {
			return strpos($key, '_') !== 0;
		});

		if (is_array($this->datamap))
		{
			$keys = array_diff($keys, $this->datamap);
			$keys = array_unique(array_merge($keys, array_keys($this->datamap)));
		}

		// we need to loop over our properties so that we
		// allow our magic methods a chance to do their thing.
		foreach ($keys as $key)
		{
=======
		// we need to loop over our properties so that we
		// allow our magic methods a chance to do their thing.
		foreach ($this->attributes as $key => $value)
		{
			if (strpos($key, '_') === 0)
			{
				continue;
			}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			if ($onlyChanged && ! $this->hasChanged($key))
			{
				continue;
			}

			$return[$key] = $this->__get($key);
<<<<<<< HEAD

			if ($recursive)
			{
				if ($return[$key] instanceof Entity)
				{
					$return[$key] = $return[$key]->toArray($onlyChanged, $cast, $recursive);
				}
				elseif (is_callable([$return[$key], 'toArray']))
				{
					$return[$key] = $return[$key]->toArray();
=======
		}

		// Loop over our mapped properties and add them to the list...
		if (is_array($this->datamap))
		{
			foreach ($this->datamap as $from => $to)
			{
				if (array_key_exists($to, $return))
				{
					$return[$from] = $this->__get($to);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
			}
		}

		$this->_cast = true;
		return $return;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the raw values of the current attributes.
	 *
<<<<<<< HEAD
	 * @param boolean $onlyChanged If true, only return values that have changed since object creation
	 * @param boolean $recursive   If true, inner entities will be casted as array as well.
	 *
	 * @return array
	 */
	public function toRawArray(bool $onlyChanged = false, bool $recursive = false): array
=======
	 * @param boolean $onlyChanged
	 *
	 * @return array
	 */
	public function toRawArray(bool $onlyChanged = false): array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$return = [];

		if (! $onlyChanged)
		{
<<<<<<< HEAD
			if ($recursive)
			{
				return array_map(function ($value) use ($onlyChanged, $recursive) {
					if ($value instanceof Entity)
					{
						$value = $value->toRawArray($onlyChanged, $recursive);
					}
					elseif (is_callable([$value, 'toRawArray']))
					{
						$value = $value->toRawArray();
					}
					return $value;
				}, $this->attributes);
			}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			return $this->attributes;
		}

		foreach ($this->attributes as $key => $value)
		{
			if (! $this->hasChanged($key))
			{
				continue;
			}

<<<<<<< HEAD
			if ($recursive)
			{
				if ($value instanceof Entity)
				{
					$value = $value->toRawArray($onlyChanged, $recursive);
				}
				elseif (is_callable([$value, 'toRawArray']))
				{
					$value = $value->toRawArray();
				}
			}

			$return[$key] = $value;
=======
			$return[$key] = $this->attributes[$key];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return $return;
	}

	//--------------------------------------------------------------------

	/**
	 * Ensures our "original" values match the current values.
	 *
	 * @return $this
	 */
	public function syncOriginal()
	{
		$this->original = $this->attributes;

		return $this;
	}

	/**
	 * Checks a property to see if it has changed since the entity was created.
	 * Or, without a parameter, checks if any properties have changed.
	 *
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function hasChanged(string $key = null): bool
	{
		// If no parameter was given then check all attributes
		if ($key === null)
		{
			return     $this->original !== $this->attributes;
		}

		// Key doesn't exist in either
		if (! array_key_exists($key, $this->original) && ! array_key_exists($key, $this->attributes))
		{
			return false;
		}

		// It's a new element
		if (! array_key_exists($key, $this->original) && array_key_exists($key, $this->attributes))
		{
			return true;
		}

		return $this->original[$key] !== $this->attributes[$key];
	}

	/**
	 * Magic method to allow retrieval of protected and private
	 * class properties either by their name, or through a `getCamelCasedProperty()`
	 * method.
	 *
	 * Examples:
	 *
	 *      $p = $this->my_property
	 *      $p = $this->getMyProperty()
	 *
	 * @param string $key
	 *
	 * @return mixed
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __get(string $key)
	{
		$key    = $this->mapProperty($key);
		$result = null;

		// Convert to CamelCase for the method
		$method = 'get' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));

		// if a set* method exists for this key,
		// use that method to insert this value.
		if (method_exists($this, $method))
		{
			$result = $this->$method();
		}

		// Otherwise return the protected property
		// if it exists.
<<<<<<< HEAD
		elseif (array_key_exists($key, $this->attributes))
=======
		else if (array_key_exists($key, $this->attributes))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$result = $this->attributes[$key];
		}

		// Do we need to mutate this into a date?
<<<<<<< HEAD
		if (in_array($key, $this->dates, true))
=======
		if (in_array($key, $this->dates))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$result = $this->mutateDate($result);
		}
		// Or cast it as something?
<<<<<<< HEAD
		elseif ($this->_cast && ! empty($this->casts[$key]))
=======
		else if ($this->_cast && ! empty($this->casts[$key]))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$result = $this->castAs($result, $this->casts[$key]);
		}

		return $result;
	}

	//--------------------------------------------------------------------

	/**
	 * Magic method to all protected/private class properties to be easily set,
	 * either through a direct access or a `setCamelCasedProperty()` method.
	 *
	 * Examples:
	 *
	 *      $this->my_property = $p;
	 *      $this->setMyProperty() = $p;
	 *
<<<<<<< HEAD
	 * @param string     $key
	 * @param mixed|null $value
	 *
	 * @return $this
	 * @throws Exception
=======
	 * @param string $key
	 * @param null   $value
	 *
	 * @return $this
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __set(string $key, $value = null)
	{
		$key = $this->mapProperty($key);

		// Check if the field should be mutated into a date
<<<<<<< HEAD
		if (in_array($key, $this->dates, true))
=======
		if (in_array($key, $this->dates))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$value = $this->mutateDate($value);
		}

		$isNullable = false;
		$castTo     = false;

		if (array_key_exists($key, $this->casts))
		{
			$isNullable = strpos($this->casts[$key], '?') === 0;
			$castTo     = $isNullable ? substr($this->casts[$key], 1) : $this->casts[$key];
		}

		if (! $isNullable || ! is_null($value))
		{
<<<<<<< HEAD
			// CSV casts need to be imploded.
			if ($castTo === 'csv')
			{
				$value = implode(',', $value);
			}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			// Array casting requires that we serialize the value
			// when setting it so that it can easily be stored
			// back to the database.
			if ($castTo === 'array')
			{
				$value = serialize($value);
			}

			// JSON casting requires that we JSONize the value
			// when setting it so that it can easily be stored
			// back to the database.
			if (($castTo === 'json' || $castTo === 'json-array') && function_exists('json_encode'))
			{
				$value = json_encode($value, JSON_UNESCAPED_UNICODE);

				if (json_last_error() !== JSON_ERROR_NONE)
				{
					throw CastException::forInvalidJsonFormatException(json_last_error());
				}
			}
		}

		// if a set* method exists for this key,
		// use that method to insert this value.
		// *) should be outside $isNullable check - SO maybe wants to do sth with null value automatically
		$method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
		if (method_exists($this, $method))
		{
			$this->$method($value);

			return $this;
		}

		// Otherwise, just the value.
		// This allows for creation of new class
		// properties that are undefined, though
		// they cannot be saved. Useful for
		// grabbing values through joins,
		// assigning relationships, etc.
		$this->attributes[$key] = $value;

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Unsets an attribute property.
	 *
	 * @param string $key
	 *
<<<<<<< HEAD
	 * @throws ReflectionException
=======
	 * @throws \ReflectionException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __unset(string $key)
	{
		unset($this->attributes[$key]);
	}

	//--------------------------------------------------------------------

	/**
	 * Returns true if a property exists names $key, or a getter method
	 * exists named like for __get().
	 *
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function __isset(string $key): bool
	{
		$key = $this->mapProperty($key);

		$method = 'get' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));

		if (method_exists($this, $method))
		{
			return true;
		}

		return isset($this->attributes[$key]);
	}

	/**
	 * Set raw data array without any mutations
	 *
	 * @param  array $data
	 * @return $this
	 */
	public function setAttributes(array $data)
	{
		$this->attributes = $data;
		$this->syncOriginal();
		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Checks the datamap to see if this column name is being mapped,
	 * and returns the mapped name, if any, or the original name.
	 *
	 * @param string $key
	 *
	 * @return mixed|string
	 */
	protected function mapProperty(string $key)
	{
		if (empty($this->datamap))
		{
			return $key;
		}

		if (! empty($this->datamap[$key]))
		{
			return $this->datamap[$key];
		}

		return $key;
	}

	//--------------------------------------------------------------------

	/**
	 * Converts the given string|timestamp|DateTime|Time instance
	 * into a \CodeIgniter\I18n\Time object.
	 *
<<<<<<< HEAD
	 * @param mixed $value
	 *
	 * @return Time|mixed
	 * @throws Exception
=======
	 * @param $value
	 *
	 * @return \CodeIgniter\I18n\Time
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function mutateDate($value)
	{
		if ($value instanceof Time)
		{
			return $value;
		}

<<<<<<< HEAD
		if ($value instanceof DateTime)
=======
		if ($value instanceof \DateTime)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return Time::instance($value);
		}

		if (is_numeric($value))
		{
			return Time::createFromTimestamp($value);
		}

		if (is_string($value))
		{
			return Time::parse($value);
		}

		return $value;
	}

	//--------------------------------------------------------------------

	/**
	 * Provides the ability to cast an item as a specific data type.
	 * Add ? at the beginning of $type  (i.e. ?string) to get NULL instead of casting $value if $value === null
	 *
<<<<<<< HEAD
	 * @param mixed  $value
	 * @param string $type
	 *
	 * @return mixed
	 * @throws Exception
	 */
=======
	 * @param $value
	 * @param string $type
	 *
	 * @return mixed
	 * @throws \Exception
	 */

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	protected function castAs($value, string $type)
	{
		if (strpos($type, '?') === 0)
		{
			if ($value === null)
			{
				return null;
			}
			$type = substr($type, 1);
		}

		switch($type)
		{
			case 'int':
<<<<<<< HEAD
			case 'integer': // alias for 'integer'
				$value = (int) $value;
				break;
			case 'float':
				$value = (float) $value;
				break;
			case 'double':
				$value = (double) $value;
				break;
			case 'string':
				$value = (string) $value;
				break;
			case 'bool':
			case 'boolean': // alias for 'boolean'
				$value = (bool) $value;
				break;
			case 'csv':
				$value = explode(',', $value);
				break;
			case 'object':
				$value = (object) $value;
=======
			case 'integer': //alias for 'integer'
				$value = (int)$value;
				break;
			case 'float':
				$value = (float)$value;
				break;
			case 'double':
				$value = (double)$value;
				break;
			case 'string':
				$value = (string)$value;
				break;
			case 'bool':
			case 'boolean': //alias for 'boolean'
				$value = (bool)$value;
				break;
			case 'object':
				$value = (object)$value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				break;
			case 'array':
				if (is_string($value) && (strpos($value, 'a:') === 0 || strpos($value, 's:') === 0))
				{
					$value = unserialize($value);
				}

<<<<<<< HEAD
				$value = (array) $value;
=======
				$value = (array)$value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				break;
			case 'json':
				$value = $this->castAsJson($value);
				break;
			case 'json-array':
				$value = $this->castAsJson($value, true);
				break;
			case 'datetime':
				return $this->mutateDate($value);
			case 'timestamp':
				return strtotime($value);
		}

		return $value;
	}

	//--------------------------------------------------------------------

	/**
	 * Cast as JSON
	 *
	 * @param mixed   $value
	 * @param boolean $asArray
	 *
	 * @return mixed
<<<<<<< HEAD
	 * @throws CastException
	 */
	private function castAsJson($value, bool $asArray = false)
	{
		$tmp = ! is_null($value) ? ($asArray ? [] : new stdClass) : null;
		if (function_exists('json_decode'))
		{
			if ((is_string($value) && strlen($value) > 1 && in_array($value[0], ['[', '{', '"'], true)) || is_numeric($value))
=======
	 * @throws \CodeIgniter\Exceptions\CastException
	 */
	private function castAsJson($value, bool $asArray = false)
	{
		$tmp = ! is_null($value) ? ($asArray ? [] : new \stdClass) : null;
		if (function_exists('json_decode'))
		{
			if ((is_string($value) && strlen($value) > 1 && in_array($value[0], ['[', '{', '"'])) || is_numeric($value))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$tmp = json_decode($value, $asArray);

				if (json_last_error() !== JSON_ERROR_NONE)
				{
					throw CastException::forInvalidJsonFormatException(json_last_error());
				}
			}
		}
		return $tmp;
	}

	/**
	 * Support for json_encode()
	 *
	 * @return array|mixed
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function jsonSerialize()
	{
		return $this->toArray();
	}
<<<<<<< HEAD

	/**
	 * Change the value of the private $_cast property
	 *
	 * @param  boolean|null $cast
	 * @return boolean|Entity
	 */
	public function cast(bool $cast = null)
	{
		if (null === $cast)
		{
			return $this->_cast;
		}
		$this->_cast = $cast;
		return $this;
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
