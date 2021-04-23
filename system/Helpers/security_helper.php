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
 * @license    https://opensource.org/licenses/MIT    MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

use Config\Services;

/**
 * CodeIgniter Security Helpers
<<<<<<< HEAD
=======
 *
 * @package CodeIgniter
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

if (! function_exists('sanitize_filename'))
{
	/**
	 * Sanitize a filename to use in a URI.
	 *
	 * @param string $filename
	 *
	 * @return string
	 */
	function sanitize_filename(string $filename): string
	{
		return Services::security()->sanitizeFilename($filename);
	}
}

//--------------------------------------------------------------------

if (! function_exists('strip_image_tags'))
{
	/**
	 * Strip Image Tags
	 *
<<<<<<< HEAD
	 * @param string $str
	 *
=======
	 * @param  string $str
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return string
	 */
	function strip_image_tags(string $str): string
	{
		return preg_replace([
			'#<img[\s/]+.*?src\s*=\s*(["\'])([^\\1]+?)\\1.*?\>#i',
			'#<img[\s/]+.*?src\s*=\s*?(([^\s"\'=<>`]+)).*?\>#i',
		], '\\2', $str
		);
	}
}

//--------------------------------------------------------------------

if (! function_exists('encode_php_tags'))
{
	/**
	 * Convert PHP tags to entities
	 *
<<<<<<< HEAD
	 * @param string $str
	 *
=======
	 * @param  string $str
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return string
	 */
	function encode_php_tags(string $str): string
	{
		return str_replace(['<?', '?>'], ['&lt;?', '?&gt;'], $str);
	}
}

//--------------------------------------------------------------------
