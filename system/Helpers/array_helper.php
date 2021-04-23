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

/**
 * CodeIgniter Array Helpers
<<<<<<< HEAD
=======
 *
 * @package CodeIgniter
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

if (! function_exists('dot_array_search'))
{
	/**
	 * Searches an array through dot syntax. Supports
	 * wildcard searches, like foo.*.bar
	 *
	 * @param string $index
	 * @param array  $array
	 *
	 * @return mixed|null
	 */
	function dot_array_search(string $index, array $array)
	{
		$segments = explode('.', rtrim(rtrim($index, '* '), '.'));

		return _array_search_dot($segments, $array);
	}
}

if (! function_exists('_array_search_dot'))
{
	/**
	 * Used by dot_array_search to recursively search the
	 * array with wildcards.
	 *
	 * @param array $indexes
	 * @param array $array
	 *
	 * @return mixed|null
	 */
	function _array_search_dot(array $indexes, array $array)
	{
		// Grab the current index
		$currentIndex = $indexes
			? array_shift($indexes)
			: null;

<<<<<<< HEAD
		if ((empty($currentIndex) && (int) $currentIndex !== 0) || (! isset($array[$currentIndex]) && $currentIndex !== '*'))
=======
		if ((empty($currentIndex)  && intval($currentIndex) !== 0) || (! isset($array[$currentIndex]) && $currentIndex !== '*'))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return null;
		}

		// Handle Wildcard (*)
		if ($currentIndex === '*')
		{
			// If $array has more than 1 item, we have to loop over each.
<<<<<<< HEAD
			foreach ($array as $value)
			{
				$answer = _array_search_dot($indexes, $value);

				if ($answer !== null)
				{
					return $answer;
				}
			}

			// Still here after searching all child nodes?
			return null;
=======
			if (is_array($array))
			{
				foreach ($array as $value)
				{
					$answer = _array_search_dot($indexes, $value);

					if ($answer !== null)
					{
						return $answer;
					}
				}

				// Still here after searching all child nodes?
				return null;
			}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		// If this is the last index, make sure to return it now,
		// and not try to recurse through things.
		if (empty($indexes))
		{
			return $array[$currentIndex];
		}

		// Do we need to recursively search this value?
		if (is_array($array[$currentIndex]) && $array[$currentIndex])
		{
			return _array_search_dot($indexes, $array[$currentIndex]);
		}

		// Otherwise we've found our match!
		return $array[$currentIndex];
	}
}
<<<<<<< HEAD

if (! function_exists('array_deep_search'))
{
	/**
	 * Returns the value of an element at a key in an array of uncertain depth.
	 *
	 * @param mixed $key
	 * @param array $array
	 *
	 * @return mixed|null
	 */
	function array_deep_search($key, array $array)
	{
		if (isset($array[$key]))
		{
			return $array[$key];
		}

		foreach ($array as $value)
		{
			if (is_array($value))
			{
				if ($result = array_deep_search($key, $value))
				{
					return $result;
				}
			}
		}

		return null;
	}
}

if (! function_exists('array_sort_by_multiple_keys'))
{
	/**
	 * Sorts a multidimensional array by its elements values. The array
	 * columns to be used for sorting are passed as an associative
	 * array of key names and sorting flags.
	 *
	 * Both arrays of objects and arrays of array can be sorted.
	 *
	 * Example:
	 *     array_sort_by_multiple_keys($players, [
	 *         'team.hierarchy' => SORT_ASC,
	 *         'position'       => SORT_ASC,
	 *         'name'           => SORT_STRING,
	 *     ]);
	 *
	 * The '.' dot operator in the column name indicates a deeper array or
	 * object level. In principle, any number of sublevels could be used,
	 * as long as the level and column exist in every array element.
	 *
	 * For information on multi-level array sorting, refer to Example #3 here:
	 * https://www.php.net/manual/de/function.array-multisort.php
	 *
	 * @param array $array       the reference of the array to be sorted
	 * @param array $sortColumns an associative array of columns to sort
	 *                           after and their sorting flags
	 *
	 * @return boolean
	 */
	function array_sort_by_multiple_keys(array &$array, array $sortColumns): bool
	{
		// Check if there really are columns to sort after
		if (empty($sortColumns) || empty($array))
		{
			return false;
		}

		// Group sorting indexes and data
		$tempArray = [];
		foreach ($sortColumns as $key => $sortFlag)
		{
			// Get sorting values
			$carry = $array;

			// The '.' operator separates nested elements
			foreach (explode('.', $key) as $keySegment)
			{
				// Loop elements if they are objects
				if (is_object(reset($carry)))
				{
					// Extract the object attribute
					foreach ($carry as $index => $object)
					{
						$carry[$index] = $object->$keySegment;
					}

					continue;
				}

				// Extract the target column if elements are arrays
				$carry = array_column($carry, $keySegment);
			}

			// Store the collected sorting parameters
			$tempArray[] = $carry;
			$tempArray[] = $sortFlag;
		}

		// Append the array as reference
		$tempArray[] = &$array;

		// Pass sorting arrays and flags as an argument list.
		return array_multisort(...$tempArray);
	}
}

if (! function_exists('array_flatten_with_dots'))
{
	/**
	 * Flatten a multidimensional array using dots as separators.
	 *
	 * @param iterable $array The multi-dimensional array
	 * @param string   $id    Something to initially prepend to the flattened keys
	 *
	 * @return array The flattened array
	 */
	function array_flatten_with_dots(iterable $array, string $id = ''): array
	{
		$flattened = [];

		foreach ($array as $key => $value)
		{
			$newKey = $id . $key;

			if (is_array($value))
			{
				$flattened = array_merge($flattened, array_flatten_with_dots($value, $newKey . '.'));
			}
			else
			{
				$flattened[$newKey] = $value;
			}
		}

		return $flattened;
	}
}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
