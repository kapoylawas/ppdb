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

namespace CodeIgniter\HTTP;

/**
 * Class Header
 *
 * Represents a single HTTP header.
<<<<<<< HEAD
 */
class Header
{
=======
 *
 * @package CodeIgniter\HTTP
 */
class Header
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The name of the header.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The value of the header. May have more than one
	 * value. If so, will be an array of strings.
	 *
	 * @var string|array
	 */
	protected $value;

	//--------------------------------------------------------------------

	/**
	 * Header constructor. name is mandatory, if a value is provided, it will be set.
	 *
	 * @param string            $name
	 * @param string|array|null $value
	 */
	public function __construct(string $name, $value = null)
	{
<<<<<<< HEAD
		$this->name = $name;
		$this->setValue($value);
=======
		$this->name  = $name;
		$this->value = $value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the name of the header, in the same case it was set.
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	//--------------------------------------------------------------------

	/**
	 * Gets the raw value of the header. This may return either a string
	 * of an array, depending on whether the header has multiple values or not.
	 *
<<<<<<< HEAD
	 * @return array|string
=======
	 * @return array|null|string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function getValue()
	{
		return $this->value;
	}

	//--------------------------------------------------------------------

	/**
	 * Sets the name of the header, overwriting any previous value.
	 *
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName(string $name)
	{
		$this->name = $name;

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Sets the value of the header, overwriting any previous value(s).
	 *
<<<<<<< HEAD
	 * @param string|array|null $value
=======
	 * @param null $value
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return $this
	 */
	public function setValue($value = null)
	{
<<<<<<< HEAD
		$this->value = $value ?? '';
=======
		$this->value = $value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Appends a value to the list of values for this header. If the
	 * header is a single value string, it will be converted to an array.
	 *
<<<<<<< HEAD
	 * @param string|array|null $value
=======
	 * @param null $value
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return $this
	 */
	public function appendValue($value = null)
	{
<<<<<<< HEAD
		if ($value === null)
		{
			return $this;
		}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (! is_array($this->value))
		{
			$this->value = [$this->value];
		}

<<<<<<< HEAD
		if (! in_array($value, $this->value, true))
		{
			$this->value[] = $value;
		}
=======
		$this->value[] = $value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Prepends a value to the list of values for this header. If the
	 * header is a single value string, it will be converted to an array.
	 *
<<<<<<< HEAD
	 * @param string|array|null $value
=======
	 * @param null $value
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return $this
	 */
	public function prependValue($value = null)
	{
<<<<<<< HEAD
		if ($value === null)
		{
			return $this;
		}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (! is_array($this->value))
		{
			$this->value = [$this->value];
		}

		array_unshift($this->value, $value);

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Retrieves a comma-separated string of the values for a single header.
	 *
	 * NOTE: Not all header values may be appropriately represented using
	 * comma concatenation. For such headers, use getHeader() instead
	 * and supply your own delimiter when concatenating.
	 *
	 * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec4.html#sec4.2
	 */
	public function getValueLine(): string
	{
		if (is_string($this->value))
		{
			return $this->value;
		}
<<<<<<< HEAD
		if (! is_array($this->value))
=======
		else if (! is_array($this->value))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return '';
		}

		$options = [];

		foreach ($this->value as $key => $value)
		{
			if (is_string($key) && ! is_array($value))
			{
				$options[] = $key . '=' . $value;
			}
<<<<<<< HEAD
			elseif (is_array($value))
=======
			else if (is_array($value))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$key       = key($value);
				$options[] = $key . '=' . $value[$key];
			}
<<<<<<< HEAD
			elseif (is_numeric($key))
=======
			else if (is_numeric($key))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$options[] = $value;
			}
		}

		return implode(', ', $options);
	}

	//--------------------------------------------------------------------

	/**
	 * Returns a representation of the entire header string, including
	 * the header name and all values converted to the proper format.
	 *
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->name . ': ' . $this->getValueLine();
	}

	//--------------------------------------------------------------------
}
