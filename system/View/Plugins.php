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

namespace CodeIgniter\View;

<<<<<<< HEAD
use CodeIgniter\HTTP\URI;
use Config\Services;

/**
 * View plugins
 */
class Plugins
{
	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @return string|URI
=======
 /**
  * View plugins
  */
class Plugins
{

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @return string|\CodeIgniter\HTTP\URI
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function currentURL()
	{
		return current_url();
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
<<<<<<< HEAD
	 * @return URI|mixed|string
=======
	 * @return \CodeIgniter\HTTP\URI|mixed|string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function previousURL()
	{
		return previous_url();
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public static function mailto(array $params = []): string
	{
		$email = $params['email'] ?? '';
		$title = $params['title'] ?? '';
		$attrs = $params['attributes'] ?? '';

		return mailto($email, $title, $attrs);
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public static function safeMailto(array $params = []): string
	{
		$email = $params['email'] ?? '';
		$title = $params['title'] ?? '';
		$attrs = $params['attributes'] ?? '';

		return safe_mailto($email, $title, $attrs);
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public static function lang(array $params = []): string
	{
		$line = array_shift($params);

		return lang($line, $params);
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public static function ValidationErrors(array $params = []): string
	{
<<<<<<< HEAD
		$validator = Services::validation();
=======
		$validator = \Config\Services::validation();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (empty($params))
		{
			return $validator->listErrors();
		}

		return $validator->showError($params['field']);
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @param array $params
	 *
	 * @return string|false
	 */
	public static function route(array $params = [])
	{
		return route_to(...$params);
	}

	//--------------------------------------------------------------------

	/**
	 * Wrap helper function to use as view plugin.
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public static function siteURL(array $params = []): string
	{
		return site_url(...$params);
	}
}
