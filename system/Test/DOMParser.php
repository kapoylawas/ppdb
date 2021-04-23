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

namespace CodeIgniter\Test;

<<<<<<< HEAD
use BadMethodCallException;
use DOMDocument;
use DOMNodeList;
use DOMXPath;
use InvalidArgumentException;

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
/**
 * Load a response into a DOMDocument for testing assertions based on that
 */
class DOMParser
{
	/**
	 * DOM for the body,
	 *
<<<<<<< HEAD
	 * @var DOMDocument
=======
	 * @var \DOMDocument
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $dom;

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @throws BadMethodCallException
=======
	 * @throws \BadMethodCallException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __construct()
	{
		if (! extension_loaded('DOM'))
		{
			// always there in travis-ci
			// @codeCoverageIgnoreStart
<<<<<<< HEAD
			throw new BadMethodCallException('DOM extension is required, but not currently loaded.');
			// @codeCoverageIgnoreEnd
		}

		$this->dom = new DOMDocument('1.0', 'utf-8');
=======
			throw new \BadMethodCallException('DOM extension is required, but not currently loaded.');
			// @codeCoverageIgnoreEnd
		}

		$this->dom = new \DOMDocument('1.0', 'utf-8');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Returns the body of the current document.
	 *
	 * @return string
	 */
	public function getBody(): string
	{
		return $this->dom->saveHTML();
	}

	/**
	 * Sets a string as the body that we want to work with.
	 *
	 * @param string $content
	 *
	 * @return $this
	 */
	public function withString(string $content)
	{
		// converts all special characters to utf-8
		$content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');

		//turning off some errors
		libxml_use_internal_errors(true);

		if (! $this->dom->loadHTML($content))
		{
			// unclear how we would get here, given that we are trapping libxml errors
			// @codeCoverageIgnoreStart
			libxml_clear_errors();
<<<<<<< HEAD
			throw new BadMethodCallException('Invalid HTML');
=======
			throw new \BadMethodCallException('Invalid HTML');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			// @codeCoverageIgnoreEnd
		}

		// ignore the whitespace.
		$this->dom->preserveWhiteSpace = false;

		return $this;
	}

	/**
	 * Loads the contents of a file as a string
	 * so that we can work with it.
	 *
	 * @param string $path
	 *
<<<<<<< HEAD
	 * @return DOMParser
=======
	 * @return \CodeIgniter\Test\DOMParser
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function withFile(string $path)
	{
		if (! is_file($path))
		{
<<<<<<< HEAD
			throw new InvalidArgumentException(basename($path) . ' is not a valid file.');
=======
			throw new \InvalidArgumentException(basename($path) . ' is not a valid file.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		$content = file_get_contents($path);

		return $this->withString($content);
	}

	/**
	 * Checks to see if the text is found within the result.
	 *
	 * @param string $search
	 * @param string $element
	 *
	 * @return boolean
	 */
	public function see(string $search = null, string $element = null): bool
	{
		// If Element is null, we're just scanning for text
		if (is_null($element))
		{
			$content = $this->dom->saveHTML($this->dom->documentElement);
			return mb_strpos($content, $search) !== false;
		}

		$result = $this->doXPath($search, $element);

<<<<<<< HEAD
		return (bool) $result->length;
=======
		return (bool)$result->length;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Checks to see if the text is NOT found within the result.
	 *
	 * @param string      $search
	 * @param string|null $element
	 *
	 * @return boolean
	 */
	public function dontSee(string $search = null, string $element = null): bool
	{
		return ! $this->see($search, $element);
	}

	/**
	 * Checks to see if an element with the matching CSS specifier
	 * is found within the current DOM.
	 *
	 * @param string $element
	 *
	 * @return boolean
	 */
	public function seeElement(string $element): bool
	{
		return $this->see(null, $element);
	}

	/**
	 * Checks to see if the element is available within the result.
	 *
	 * @param string $element
	 *
	 * @return boolean
	 */
	public function dontSeeElement(string $element): bool
	{
		return $this->dontSee(null, $element);
	}

	/**
	 * Determines if a link with the specified text is found
	 * within the results.
	 *
	 * @param string      $text
	 * @param string|null $details
	 *
	 * @return boolean
	 */
	public function seeLink(string $text, string $details = null): bool
	{
		return $this->see($text, 'a' . $details);
	}

	/**
	 * Checks for an input named $field with a value of $value.
	 *
	 * @param string $field
	 * @param string $value
	 *
	 * @return boolean
	 */
	public function seeInField(string $field, string $value): bool
	{
		$result = $this->doXPath(null, 'input', ["[@value=\"{$value}\"][@name=\"{$field}\"]"]);

<<<<<<< HEAD
		return (bool) $result->length;
=======
		return (bool)$result->length;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Checks for checkboxes that are currently checked.
	 *
	 * @param string $element
	 *
	 * @return boolean
	 */
	public function seeCheckboxIsChecked(string $element): bool
	{
		$result = $this->doXPath(null, 'input' . $element, [
			'[@type="checkbox"]',
			'[@checked="checked"]',
		]);

<<<<<<< HEAD
		return (bool) $result->length;
	}

	//--------------------------------------------------------------------

	/**
	 * Search the DOM using an XPath expression.
	 *
	 * @param  string|null $search
	 * @param  string      $element
	 * @param  array       $paths
	 *
	 * @return DOMNodeList
	 */
	protected function doXPath(?string $search, string $element, array $paths = [])
=======
		return (bool)$result->length;
	}

	//--------------------------------------------------------------------
	/**
	 * Search the DOM using an XPath expression.
	 *
	 * @param  string $search
	 * @param  string $element
	 * @param  array  $paths
	 * @return type
	 */

	protected function doXPath(string $search = null, string $element, array $paths = [])
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		// Otherwise, grab any elements that match
		// the selector
		$selector = $this->parseSelector($element);

		$path = '';

		// By ID
		if (! empty($selector['id']))
		{
			$path = empty($selector['tag'])
				? "id(\"{$selector['id']}\")"
<<<<<<< HEAD
				: "//{$selector['tag']}[@id=\"{$selector['id']}\"]";
		}
		// By Class
		elseif (! empty($selector['class']))
		{
			$path = empty($selector['tag'])
				? "//*[@class=\"{$selector['class']}\"]"
				: "//{$selector['tag']}[@class=\"{$selector['class']}\"]";
		}
		// By tag only
		elseif (! empty($selector['tag']))
		{
			$path = "//{$selector['tag']}";
=======
				: "//body//{$selector['tag']}[@id=\"{$selector['id']}\"]";
		}
		// By Class
		else if (! empty($selector['class']))
		{
			$path = empty($selector['tag'])
				? "//*[@class=\"{$selector['class']}\"]"
				: "//body//{$selector['tag']}[@class=\"{$selector['class']}\"]";
		}
		// By tag only
		else if (! empty($selector['tag']))
		{
			$path = "//body//{$selector['tag']}";
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		if (! empty($selector['attr']))
		{
			foreach ($selector['attr'] as $key => $value)
			{
				$path .= "[@{$key}=\"{$value}\"]";
			}
		}

		// $paths might contain a number of different
		// ready to go xpath portions to tack on.
		if (! empty($paths) && is_array($paths))
		{
			foreach ($paths as $extra)
			{
				$path .= $extra;
			}
		}

		if (! is_null($search))
		{
			$path .= "[contains(., \"{$search}\")]";
		}

<<<<<<< HEAD
		$xpath = new DOMXPath($this->dom);
=======
		$xpath = new \DOMXPath($this->dom);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $xpath->query($path);
	}

	/**
	 * Look for the a selector  in the passed text.
	 *
	 * @param  string $selector
<<<<<<< HEAD
	 * @return array
=======
	 * @return type
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function parseSelector(string $selector)
	{
		$tag   = null;
		$id    = null;
		$class = null;
		$attr  = null;

		// ID?
		if ($pos = strpos($selector, '#') !== false)
		{
			list($tag, $id) = explode('#', $selector);
		}
		// Attribute
		elseif (strpos($selector, '[') !== false && strpos($selector, ']') !== false)
		{
			$open  = strpos($selector, '[');
			$close = strpos($selector, ']');

			$tag  = substr($selector, 0, $open);
			$text = substr($selector, $open + 1, $close - 2);

			// We only support a single attribute currently
			$text = explode(',', $text);
			$text = trim(array_shift($text));

			list($name, $value) = explode('=', $text);
			$name               = trim($name);
			$value              = trim($value);
			$attr               = [$name => trim($value, '] ')];
		}
		// Class?
		elseif ($pos = strpos($selector, '.') !== false)
		{
			list($tag, $class) = explode('.', $selector);
		}
		// Otherwise, assume the entire string is our tag
		else
		{
			$tag = $selector;
		}

		return [
			'tag'   => $tag,
			'id'    => $id,
			'class' => $class,
			'attr'  => $attr,
		];
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
