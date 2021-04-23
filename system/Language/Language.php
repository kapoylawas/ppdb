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

namespace CodeIgniter\Language;

use Config\Services;
<<<<<<< HEAD
use MessageFormatter;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Handle system messages and localization.
 *
 * Locale-based, built on top of PHP internationalization.
<<<<<<< HEAD
 */
class Language
{
=======
 *
 * @package CodeIgniter\Language
 */
class Language
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Stores the retrieved language lines
	 * from files for faster retrieval on
	 * second use.
	 *
	 * @var array
	 */
	protected $language = [];

	/**
	 * The current language/locale to work with.
	 *
	 * @var string
	 */
	protected $locale;

	/**
	 * Boolean value whether the intl
	 * libraries exist on the system.
	 *
	 * @var boolean
	 */
	protected $intlSupport = false;

	/**
	 * Stores filenames that have been
	 * loaded so that we don't load them again.
	 *
	 * @var array
	 */
	protected $loadedFiles = [];

	//--------------------------------------------------------------------

	public function __construct(string $locale)
	{
		$this->locale = $locale;

<<<<<<< HEAD
		if (class_exists('MessageFormatter'))
		{
			$this->intlSupport = true;
		}
=======
		if (class_exists('\MessageFormatter'))
		{
			$this->intlSupport = true;
		};
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Sets the current locale to use when performing string lookups.
	 *
	 * @param string $locale
	 *
	 * @return $this
	 */
	public function setLocale(string $locale = null)
	{
		if (! is_null($locale))
		{
			$this->locale = $locale;
		}

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * @return string
	 */
	public function getLocale(): string
	{
		return $this->locale;
	}

	//--------------------------------------------------------------------

	/**
	 * Parses the language string for a file, loads the file, if necessary,
	 * getting the line.
	 *
	 * @param string $line Line.
	 * @param array  $args Arguments.
	 *
	 * @return string|string[] Returns line.
	 */
	public function getLine(string $line, array $args = [])
	{
<<<<<<< HEAD
		// if no file is given, just parse the line
		if (strpos($line, '.') === false)
		{
			return $this->formatMessage($line, $args);
=======
		// ignore requests with no file specified
		if (! strpos($line, '.'))
		{
			return $line;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		// Parse out the file name and the actual alias.
		// Will load the language file and strings.
<<<<<<< HEAD
		list($file, $parsedLine) = $this->parseLine($line, $this->locale);
=======
		[
			$file,
			$parsedLine,
		] = $this->parseLine($line, $this->locale);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		$output = $this->getTranslationOutput($this->locale, $file, $parsedLine);

		if ($output === null && strpos($this->locale, '-'))
		{
<<<<<<< HEAD
			list($locale) = explode('-', $this->locale, 2);

			list($file, $parsedLine) = $this->parseLine($line, $locale);
=======
			[$locale] = explode('-', $this->locale, 2);

			[
				$file,
				$parsedLine,
			] = $this->parseLine($line, $locale);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			$output = $this->getTranslationOutput($locale, $file, $parsedLine);
		}

		// if still not found, try English
		if ($output === null)
		{
<<<<<<< HEAD
			list($file, $parsedLine) = $this->parseLine($line, 'en');

=======
			[
				$file,
				$parsedLine,
			]       = $this->parseLine($line, 'en');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$output = $this->getTranslationOutput('en', $file, $parsedLine);
		}

		$output = $output ?? $line;

<<<<<<< HEAD
		return $this->formatMessage($output, $args);
=======
		if (! empty($args))
		{
			$output = $this->formatMessage($output, $args);
		}

		return $output;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * @return array|string|null
	 */
	private function getTranslationOutput(string $locale, string $file, string $parsedLine)
	{
		$output = $this->language[$locale][$file][$parsedLine] ?? null;
		if ($output !== null)
		{
			return $output;
		}

		foreach (explode('.', $parsedLine) as $row)
		{
			if (! isset($current))
			{
				$current = $this->language[$locale][$file] ?? null;
			}

			$output = $current[$row] ?? null;
			if (is_array($output))
			{
				$current = $output;
			}
		}

		if ($output !== null)
		{
			return $output;
		}

		$row = current(explode('.', $parsedLine));
		$key = substr($parsedLine, strlen($row) + 1);

		return $this->language[$locale][$file][$row][$key] ?? null;
	}

	/**
	 * Parses the language string which should include the
	 * filename as the first segment (separated by period).
	 *
	 * @param string $line
	 * @param string $locale
	 *
	 * @return array
	 */
	protected function parseLine(string $line, string $locale): array
	{
		$file = substr($line, 0, strpos($line, '.'));
		$line = substr($line, strlen($file) + 1);

		if (! isset($this->language[$locale][$file]) || ! array_key_exists($line, $this->language[$locale][$file]))
		{
			$this->load($file, $locale);
		}

		return [
			$file,
			$line,
		];
	}

	//--------------------------------------------------------------------

	/**
	 * Advanced message formatting.
	 *
	 * @param string|array $message Message.
	 * @param array	       $args    Arguments.
	 *
	 * @return string|array Returns formatted message.
	 */
	protected function formatMessage($message, array $args = [])
	{
<<<<<<< HEAD
		if (! $this->intlSupport || $args === [])
=======
		if (! $this->intlSupport || ! $args)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $message;
		}

		if (is_array($message))
		{
			foreach ($message as $index => $value)
			{
				$message[$index] = $this->formatMessage($value, $args);
			}
<<<<<<< HEAD

			return $message;
		}

		return MessageFormatter::formatMessage($this->locale, $message, $args);
=======
			return $message;
		}

		return \MessageFormatter::formatMessage($this->locale, $message, $args);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Loads a language file in the current locale. If $return is true,
	 * will return the file's contents, otherwise will merge with
	 * the existing language lines.
	 *
	 * @param string  $file
	 * @param string  $locale
	 * @param boolean $return
	 *
<<<<<<< HEAD
	 * @return void|array
=======
	 * @return array|null
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function load(string $file, string $locale, bool $return = false)
	{
		if (! array_key_exists($locale, $this->loadedFiles))
		{
			$this->loadedFiles[$locale] = [];
		}

<<<<<<< HEAD
		if (in_array($file, $this->loadedFiles[$locale], true))
=======
		if (in_array($file, $this->loadedFiles[$locale]))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			// Don't load it more than once.
			return [];
		}

		if (! array_key_exists($locale, $this->language))
		{
			$this->language[$locale] = [];
		}

		if (! array_key_exists($file, $this->language[$locale]))
		{
			$this->language[$locale][$file] = [];
		}

		$path = "Language/{$locale}/{$file}.php";

		$lang = $this->requireFile($path);

		if ($return)
		{
			return $lang;
		}

		$this->loadedFiles[$locale][] = $file;

		// Merge our string
		$this->language[$locale][$file] = $lang;
	}

	//--------------------------------------------------------------------

	/**
	 * A simple method for including files that can be
	 * overridden during testing.
	 *
	 * @param string $path
	 *
	 * @return array
	 */
	protected function requireFile(string $path): array
	{
		$files   = Services::locator()->search($path, 'php', false);
		$strings = [];

		foreach ($files as $file)
		{
			// On some OS's we were seeing failures
			// on this command returning boolean instead
			// of array during testing, so we've removed
			// the require_once for now.
			if (is_file($file))
			{
				$strings[] = require $file;
			}
		}

		if (isset($strings[1]))
		{
			$strings = array_replace_recursive(...$strings);
		}
		elseif (isset($strings[0]))
		{
			$strings = $strings[0];
		}

		return $strings;
	}

	//--------------------------------------------------------------------
}
