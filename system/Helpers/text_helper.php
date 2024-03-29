<?php

/**
<<<<<<< HEAD
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Config\ForeignCharacters;

/**
 * CodeIgniter Text Helpers
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
 * @copyright  2008-2014 EllisLab, Inc. (https://ellislab.com/)
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 1.0.0
 * @filesource
 */

/**
 * CodeIgniter Text Helpers
 *
 * @package CodeIgniter
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
//--------------------------------------------------------------------

if (! function_exists('word_limiter'))
{
	/**
	 * Word Limiter
	 *
	 * Limits a string to X number of words.
	 *
	 * @param string  $str
	 * @param integer $limit
<<<<<<< HEAD
	 * @param string  $endChar the end character. Usually an ellipsis
	 *
	 * @return string
	 */
	function word_limiter(string $str, int $limit = 100, string $endChar = '&#8230;'): string
=======
	 * @param string  $end_char the end character. Usually an ellipsis
	 *
	 * @return string
	 */
	function word_limiter(string $str, int $limit = 100, string $end_char = '&#8230;'): string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if (trim($str) === '')
		{
			return $str;
		}

<<<<<<< HEAD
		preg_match('/^\s*+(?:\S++\s*+){1,' . $limit . '}/', $str, $matches);

		if (strlen($str) === strlen($matches[0]))
		{
			$endChar = '';
		}

		return rtrim($matches[0]) . $endChar;
=======
		preg_match('/^\s*+(?:\S++\s*+){1,' . (int) $limit . '}/', $str, $matches);

		if (strlen($str) === strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]) . $end_char;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}

//--------------------------------------------------------------------

if (! function_exists('character_limiter'))
{
	/**
	 * Character Limiter
	 *
	 * Limits the string based on the character count.  Preserves complete words
	 * so the character count may not be exactly as specified.
	 *
	 * @param string  $str
	 * @param integer $n
<<<<<<< HEAD
	 * @param string  $endChar the end character. Usually an ellipsis
	 *
	 * @return string
	 */
	function character_limiter(string $str, int $n = 500, string $endChar = '&#8230;'): string
=======
	 * @param string  $end_char the end character. Usually an ellipsis
	 *
	 * @return string
	 */
	function character_limiter(string $str, int $n = 500, string $end_char = '&#8230;'): string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if (mb_strlen($str) < $n)
		{
			return $str;
		}

		// a bit complicated, but faster than preg_replace with \s+
		$str = preg_replace('/ {2,}/', ' ', str_replace(["\r", "\n", "\t", "\x0B", "\x0C"], ' ', $str));

		if (mb_strlen($str) <= $n)
		{
			return $str;
		}

		$out = '';

		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val . ' ';
			if (mb_strlen($out) >= $n)
			{
				$out = trim($out);
				break;
			}
		}
<<<<<<< HEAD
		return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $endChar;
=======
		return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $end_char;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}

//--------------------------------------------------------------------

if (! function_exists('ascii_to_entities'))
{
	/**
	 * High ASCII to Entities
	 *
	 * Converts high ASCII text and MS Word special characters to character entities
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	function ascii_to_entities(string $str): string
	{
		$out = '';

		for ($i = 0, $s = strlen($str) - 1, $count = 1, $temp = []; $i <= $s; $i ++)
		{
			$ordinal = ord($str[$i]);

			if ($ordinal < 128)
			{
				/*
				  If the $temp array has a value but we have moved on, then it seems only
				  fair that we output that entity and restart $temp before continuing.
				 */
				if (count($temp) === 1)
				{
<<<<<<< HEAD
					$out .= '&#' . array_shift($temp) . ';';
=======
					$out  .= '&#' . array_shift($temp) . ';';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					$count = 1;
				}

				$out .= $str[$i];
			}
			else
			{
				if (empty($temp))
				{
					$count = ($ordinal < 224) ? 2 : 3;
				}

				$temp[] = $ordinal;

				if (count($temp) === $count)
				{
					$number = ($count === 3) ? (($temp[0] % 16) * 4096) + (($temp[1] % 64) * 64) + ($temp[2] % 64) : (($temp[0] % 32) * 64) + ($temp[1] % 64);
<<<<<<< HEAD
					$out .= '&#' . $number . ';';
					$count = 1;
					$temp  = [];
=======
					$out   .= '&#' . $number . ';';
					$count  = 1;
					$temp   = [];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
				// If this is the last iteration, just output whatever we have
				elseif ($i === $s)
				{
					$out .= '&#' . implode(';', $temp) . ';';
				}
			}
		}

		return $out;
	}
}

//--------------------------------------------------------------------

if (! function_exists('entities_to_ascii'))
{
	/**
	 * Entities to ASCII
	 *
	 * Converts character entities back to ASCII
	 *
	 * @param string  $str
	 * @param boolean $all
	 *
	 * @return string
	 */
	function entities_to_ascii(string $str, bool $all = true): string
	{
		if (preg_match_all('/\&#(\d+)\;/', $str, $matches))
		{
			for ($i = 0, $s = count($matches[0]); $i < $s; $i ++)
			{
				$digits = $matches[1][$i];
				$out    = '';
				if ($digits < 128)
				{
					$out .= chr($digits);
				}
				elseif ($digits < 2048)
				{
					$out .= chr(192 + (($digits - ($digits % 64)) / 64)) . chr(128 + ($digits % 64));
				}
				else
				{
					$out .= chr(224 + (($digits - ($digits % 4096)) / 4096))
							. chr(128 + ((($digits % 4096) - ($digits % 64)) / 64))
							. chr(128 + ($digits % 64));
				}
				$str = str_replace($matches[0][$i], $out, $str);
			}
		}

		if ($all)
		{
			return str_replace([
				'&amp;',
				'&lt;',
				'&gt;',
				'&quot;',
				'&apos;',
				'&#45;',
			], [
				'&',
				'<',
				'>',
				'"',
				"'",
				'-',
			], $str
			);
		}

		return $str;
	}
}

//--------------------------------------------------------------------

if (! function_exists('word_censor'))
{
	/**
	 * Word Censoring Function
	 *
	 * Supply a string and an array of disallowed words and any
	 * matched words will be converted to #### or to the replacement
	 * word you've submitted.
	 *
	 * @param string $str         the text string
	 * @param array  $censored    the array of censored words
	 * @param string $replacement the optional replacement value
	 *
	 * @return string
	 */
	function word_censor(string $str, array $censored, string $replacement = ''): string
	{
		if (empty($censored))
		{
			return $str;
		}

		$str = ' ' . $str . ' ';

		// \w, \b and a few others do not match on a unicode character
		// set for performance reasons. As a result words like über
		// will not match on a word boundary. Instead, we'll assume that
		// a bad word will be bookended by any of these characters.
		$delim = '[-_\'\"`(){}<>\[\]|!?@#%&,.:;^~*+=\/ 0-9\n\r\t]';

		foreach ($censored as $badword)
		{
			$badword = str_replace('\*', '\w*?', preg_quote($badword, '/'));

			if ($replacement !== '')
			{
				$str = preg_replace(
						"/({$delim})(" . $badword . ")({$delim})/i", "\\1{$replacement}\\3", $str
				);
			}
			elseif (preg_match_all("/{$delim}(" . $badword . "){$delim}/i", $str, $matches, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE))
			{
				$matches = $matches[1];

				for ($i = count($matches) - 1; $i >= 0; $i --)
				{
					$length = strlen($matches[$i][0]);
					$str    = substr_replace(
							$str, str_repeat('#', $length), $matches[$i][1], $length
					);
				}
			}
		}

		return trim($str);
	}
}

//--------------------------------------------------------------------

if (! function_exists('highlight_code'))
{
	/**
	 * Code Highlighter
	 *
	 * Colorizes code strings
	 *
	 * @param string $str the text string
	 *
	 * @return string
	 */
	function highlight_code(string $str): string
	{
		/* The highlight string function encodes and highlights
		 * brackets so we need them to start raw.
		 *
		 * Also replace any existing PHP tags to temporary markers
		 * so they don't accidentally break the string out of PHP,
		 * and thus, thwart the highlighting.
		 */
		$str = str_replace([
			'&lt;',
			'&gt;',
			'<?',
			'?>',
			'<%',
			'%>',
			'\\',
			'</script>',
		], [
			'<',
			'>',
			'phptagopen',
			'phptagclose',
			'asptagopen',
			'asptagclose',
			'backslashtmp',
			'scriptclose',
		], $str
		);

		// The highlight_string function requires that the text be surrounded
		// by PHP tags, which we will remove later
		$str = highlight_string('<?php ' . $str . ' ?>', true);

		// Remove our artificially added PHP, and the syntax highlighting that came with it
		$str = preg_replace([
			'/<span style="color: #([A-Z0-9]+)">&lt;\?php(&nbsp;| )/i',
			'/(<span style="color: #[A-Z0-9]+">.*?)\?&gt;<\/span>\n<\/span>\n<\/code>/is',
			'/<span style="color: #[A-Z0-9]+"\><\/span>/i',
		], [
			'<span style="color: #$1">',
			"$1</span>\n</span>\n</code>",
			'',
		], $str
		);

		// Replace our markers back to PHP tags.
		return str_replace([
			'phptagopen',
			'phptagclose',
			'asptagopen',
			'asptagclose',
			'backslashtmp',
			'scriptclose',
		], [
			'&lt;?',
			'?&gt;',
			'&lt;%',
			'%&gt;',
			'\\',
			'&lt;/script&gt;',
		], $str
		);
	}
}

//--------------------------------------------------------------------

if (! function_exists('highlight_phrase'))
{
	/**
	 * Phrase Highlighter
	 *
	 * Highlights a phrase within a text string
	 *
<<<<<<< HEAD
	 * @param string $str      the text string
	 * @param string $phrase   the phrase you'd like to highlight
	 * @param string $tagOpen  the opening tag to precede the phrase with
	 * @param string $tagClose the closing tag to end the phrase with
	 *
	 * @return string
	 */
	function highlight_phrase(string $str, string $phrase, string $tagOpen = '<mark>', string $tagClose = '</mark>'): string
	{
		return ($str !== '' && $phrase !== '') ? preg_replace('/(' . preg_quote($phrase, '/') . ')/i', $tagOpen . '\\1' . $tagClose, $str) : $str;
=======
	 * @param string $str       the text string
	 * @param string $phrase    the phrase you'd like to highlight
	 * @param string $tag_open  the opening tag to precede the phrase with
	 * @param string $tag_close the closing tag to end the phrase with
	 *
	 * @return string
	 */
	function highlight_phrase(string $str, string $phrase, string $tag_open = '<mark>', string $tag_close = '</mark>'): string
	{
		return ($str !== '' && $phrase !== '') ? preg_replace('/(' . preg_quote($phrase, '/') . ')/i', $tag_open . '\\1' . $tag_close, $str) : $str;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}

//--------------------------------------------------------------------

if (! function_exists('convert_accented_characters'))
{
	/**
	 * Convert Accented Foreign Characters to ASCII
	 *
	 * @param string $str Input string
	 *
	 * @return string
	 */
	function convert_accented_characters(string $str): string
	{
<<<<<<< HEAD
		static $arrayFrom, $arrayTo;

		if (! is_array($arrayFrom))
		{
			$config = new ForeignCharacters();

			if (empty($config->characterList) || ! is_array($config->characterList))
			{
				$arrayFrom = [];
				$arrayTo   = [];

				return $str;
			}
			$arrayFrom = array_keys($config->characterList);
			$arrayTo   = array_values($config->characterList);
=======
		static $array_from, $array_to;

		if (! is_array($array_from))
		{
			$config = new Config\ForeignCharacters();

			if (empty($config->characterList) || ! is_array($config->characterList))
			{
				$array_from = [];
				$array_to   = [];

				return $str;
			}
			$array_from = array_keys($config->characterList);
			$array_to   = array_values($config->characterList);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			unset($config);
		}

<<<<<<< HEAD
		return preg_replace($arrayFrom, $arrayTo, $str);
=======
		return preg_replace($array_from, $array_to, $str);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}

//--------------------------------------------------------------------

if (! function_exists('word_wrap'))
{
	/**
	 * Word Wrap
	 *
	 * Wraps text at the specified character. Maintains the integrity of words.
	 * Anything placed between {unwrap}{/unwrap} will not be word wrapped, nor
	 * will URLs.
	 *
	 * @param string  $str     the text string
	 * @param integer $charlim = 76    the number of characters to wrap at
	 *
	 * @return string
	 */
	function word_wrap(string $str, int $charlim = 76): string
	{
<<<<<<< HEAD
=======
		// Set the character limit
		is_numeric($charlim) || $charlim = 76;

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		// Reduce multiple spaces
		$str = preg_replace('| +|', ' ', $str);

		// Standardize newlines
		if (strpos($str, "\r") !== false)
		{
			$str = str_replace(["\r\n", "\r"], "\n", $str);
		}

		// If the current word is surrounded by {unwrap} tags we'll
		// strip the entire chunk and replace it with a marker.
		$unwrap = [];

		if (preg_match_all('|\{unwrap\}(.+?)\{/unwrap\}|s', $str, $matches))
		{
			for ($i = 0, $c = count($matches[0]); $i < $c; $i ++)
			{
				$unwrap[] = $matches[1][$i];
				$str      = str_replace($matches[0][$i], '{{unwrapped' . $i . '}}', $str);
			}
		}

		// Use PHP's native function to do the initial wordwrap.
		// We set the cut flag to FALSE so that any individual words that are
		// too long get left alone. In the next step we'll deal with them.
		$str = wordwrap($str, $charlim, "\n", false);

		// Split the string into individual lines of text and cycle through them
		$output = '';

		foreach (explode("\n", $str) as $line)
		{
			// Is the line within the allowed character count?
			// If so we'll join it to the output and continue
			if (mb_strlen($line) <= $charlim)
			{
				$output .= $line . "\n";
				continue;
			}

			$temp = '';

			while (mb_strlen($line) > $charlim)
			{
				// If the over-length word is a URL we won't wrap it
				if (preg_match('!\[url.+\]|://|www\.!', $line))
				{
					break;
				}
				// Trim the word down
				$temp .= mb_substr($line, 0, $charlim - 1);
<<<<<<< HEAD
				$line = mb_substr($line, $charlim - 1);
=======
				$line  = mb_substr($line, $charlim - 1);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}

			// If $temp contains data it means we had to split up an over-length
			// word into smaller chunks so we'll add it back to our current line
			if ($temp !== '')
			{
				$output .= $temp . "\n" . $line . "\n";
			}
			else
			{
				$output .= $line . "\n";
			}
		}

		// Put our markers back
		if (! empty($unwrap))
		{
			foreach ($unwrap as $key => $val)
			{
				$output = str_replace('{{unwrapped' . $key . '}}', $val, $output);
			}
		}

		// remove any trailing newline
		$output = rtrim($output);

		return $output;
	}
}

//--------------------------------------------------------------------

if (! function_exists('ellipsize'))
{
	/**
	 * Ellipsize String
	 *
	 * This function will strip tags from a string, split it at its max_length and ellipsize
	 *
<<<<<<< HEAD
	 * @param string  $str       String to ellipsize
	 * @param integer $maxLength Max length of string
	 * @param mixed   $position  int (1|0) or float, .5, .2, etc for position to split
	 * @param string  $ellipsis  ellipsis ; Default '...'
	 *
	 * @return string    Ellipsized string
	 */
	function ellipsize(string $str, int $maxLength, $position = 1, string $ellipsis = '&hellip;'): string
=======
	 * @param string  $str        String to ellipsize
	 * @param integer $max_length Max length of string
	 * @param mixed   $position   int (1|0) or float, .5, .2, etc for position to split
	 * @param string  $ellipsis   ellipsis ; Default '...'
	 *
	 * @return string    Ellipsized string
	 */
	function ellipsize(string $str, int $max_length, $position = 1, string $ellipsis = '&hellip;'): string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		// Strip tags
		$str = trim(strip_tags($str));

		// Is the string long enough to ellipsize?
<<<<<<< HEAD
		if (mb_strlen($str) <= $maxLength)
=======
		if (mb_strlen($str) <= $max_length)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $str;
		}

<<<<<<< HEAD
		$beg      = mb_substr($str, 0, (int) floor($maxLength * $position));
=======
		$beg      = mb_substr($str, 0, floor($max_length * $position));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$position = ($position > 1) ? 1 : $position;

		if ($position === 1)
		{
<<<<<<< HEAD
			$end = mb_substr($str, 0, -($maxLength - mb_strlen($beg)));
		}
		else
		{
			$end = mb_substr($str, -($maxLength - mb_strlen($beg)));
=======
			$end = mb_substr($str, 0, -($max_length - mb_strlen($beg)));
		}
		else
		{
			$end = mb_substr($str, -($max_length - mb_strlen($beg)));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return $beg . $ellipsis . $end;
	}
}

//--------------------------------------------------------------------

if (! function_exists('strip_slashes'))
{
	/**
	 * Strip Slashes
	 *
	 * Removes slashes contained in a string or in an array
	 *
	 * @param mixed $str string or array
	 *
	 * @return mixed  string or array
	 */
	function strip_slashes($str)
	{
		if (! is_array($str))
		{
			return stripslashes($str);
		}
		foreach ($str as $key => $val)
		{
			$str[$key] = strip_slashes($val);
		}

		return $str;
	}
}

//--------------------------------------------------------------------

if (! function_exists('strip_quotes'))
{
	/**
	 * Strip Quotes
	 *
	 * Removes single and double quotes from a string
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	function strip_quotes(string $str): string
	{
		return str_replace(['"', "'"], '', $str);
	}
}

//--------------------------------------------------------------------

if (! function_exists('quotes_to_entities'))
{
	/**
	 * Quotes to Entities
	 *
	 * Converts single and double quotes to entities
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	function quotes_to_entities(string $str): string
	{
		return str_replace(["\'", '"', "'", '"'], ['&#39;', '&quot;', '&#39;', '&quot;'], $str);
	}
}

//--------------------------------------------------------------------

if (! function_exists('reduce_double_slashes'))
{
	/**
	 * Reduce Double Slashes
	 *
	 * Converts double slashes in a string to a single slash,
	 * except those found in http://
	 *
	 * http://www.some-site.com//index.php
	 *
	 * becomes:
	 *
	 * http://www.some-site.com/index.php
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	function reduce_double_slashes(string $str): string
	{
		return preg_replace('#(^|[^:])//+#', '\\1/', $str);
	}
}

//--------------------------------------------------------------------

if (! function_exists('reduce_multiples'))
{
	/**
	 * Reduce Multiples
	 *
	 * Reduces multiple instances of a particular character.  Example:
	 *
	 * Fred, Bill,, Joe, Jimmy
	 *
	 * becomes:
	 *
	 * Fred, Bill, Joe, Jimmy
	 *
	 * @param string  $str
	 * @param string  $character the character you wish to reduce
	 * @param boolean $trim      TRUE/FALSE - whether to trim the character from the beginning/end
	 *
	 * @return string
	 */
	function reduce_multiples(string $str, string $character = ',', bool $trim = false): string
	{
		$str = preg_replace('#' . preg_quote($character, '#') . '{2,}#', $character, $str);

		return ($trim) ? trim($str, $character) : $str;
	}
}

//--------------------------------------------------------------------

if (! function_exists('random_string'))
{
	/**
	 * Create a Random String
	 *
	 * Useful for generating passwords or hashes.
	 *
	 * @param string  $type Type of random string.  basic, alpha, alnum, numeric, nozero, md5, sha1, and crypto
	 * @param integer $len  Number of characters
	 *
	 * @return string
	 */
	function random_string(string $type = 'alnum', int $len = 8): string
	{
		switch ($type)
		{
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($type)
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}

<<<<<<< HEAD
				// @phpstan-ignore-next-line
				return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
			case 'md5':
				return md5(uniqid((string) mt_rand(), true));
			case 'sha1':
				return sha1(uniqid((string) mt_rand(), true));
=======
				return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
			case 'md5':
				return md5(uniqid(mt_rand(), true));
			case 'sha1':
				return sha1(uniqid(mt_rand(), true));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			case 'crypto':
				return bin2hex(random_bytes($len / 2));
		}
		// 'basic' type treated as default
		return (string) mt_rand();
	}
}

//--------------------------------------------------------------------

if (! function_exists('increment_string'))
{
	/**
	 * Add's _1 to a string or increment the ending number to allow _2, _3, etc
	 *
	 * @param string  $str       Required
	 * @param string  $separator What should the duplicate number be appended with
	 * @param integer $first     Which number should be used for the first dupe increment
	 *
	 * @return string
	 */
	function increment_string(string $str, string $separator = '_', int $first = 1): string
	{
		preg_match('/(.+)' . preg_quote($separator, '/') . '([0-9]+)$/', $str, $match);

		return isset($match[2]) ? $match[1] . $separator . ($match[2] + 1) : $str . $separator . $first;
	}
}

//--------------------------------------------------------------------

if (! function_exists('alternator'))
{
	/**
	 * Alternator
	 *
	 * Allows strings to be alternated. See docs...
	 *
<<<<<<< HEAD
	 * @phpstan-ignore-next-line
	 * @param                    string (as many parameters as needed)
=======
	 * @param string (as many parameters as needed)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return string
	 */
	function alternator(): string
	{
		static $i;

		if (func_num_args() === 0)
		{
			$i = 0;

			return '';
		}

		$args = func_get_args();

		return $args[($i++ % count($args))];
	}
}

//--------------------------------------------------------------------

if (! function_exists('excerpt'))
{
	/**
	 * Excerpt.
	 *
	 * Allows to extract a piece of text surrounding a word or phrase.
	 *
	 * @param string  $text     String to search the phrase
	 * @param string  $phrase   Phrase that will be searched for.
	 * @param integer $radius   The amount of characters returned around the phrase.
	 * @param string  $ellipsis Ending that will be appended
	 *
	 * @return string
	 *
	 * If no $phrase is passed, will generate an excerpt of $radius characters
	 * from the beginning of $text.
	 */
	function excerpt(string $text, string $phrase = null, int $radius = 100, string $ellipsis = '...'): string
	{
		if (isset($phrase))
		{
<<<<<<< HEAD
			$phrasePos = stripos($text, $phrase);
=======
			$phrasePos = strpos(strtolower($text), strtolower($phrase));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$phraseLen = strlen($phrase);
		}
		elseif (! isset($phrase))
		{
			$phrasePos = $radius / 2;
			$phraseLen = 1;
		}

<<<<<<< HEAD
		$pre = explode(' ', substr($text, 0, $phrasePos)); // @phpstan-ignore-line
		$pos = explode(' ', substr($text, $phrasePos + $phraseLen)); // @phpstan-ignore-line
=======
		$pre = explode(' ', substr($text, 0, $phrasePos));
		$pos = explode(' ', substr($text, $phrasePos + $phraseLen));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		$prev  = ' ';
		$post  = ' ';
		$count = 0;

		foreach (array_reverse($pre) as $e)
		{
			if ((strlen($e) + $count + 1) < $radius)
			{
				$prev = ' ' . $e . $prev;
			}
			$count = ++ $count + strlen($e);
		}

		$count = 0;

		foreach ($pos as $s)
		{
			if ((strlen($s) + $count + 1) < $radius)
			{
				$post .= $s . ' ';
			}
			$count = ++ $count + strlen($s);
		}

		$ellPre = $phrase ? $ellipsis : '';

		return str_replace('  ', ' ', $ellPre . $prev . $phrase . $post . $ellipsis);
	}

	//--------------------------------------------------------------------
}
