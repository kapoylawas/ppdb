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
 * Copyright (c) 2014-2017 British Columbia Institute of Technology
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
 * @copyright  2014-2017 British Columbia Institute of Technology (https://bcit.ca/)
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

namespace CodeIgniter\Encryption\Handlers;

<<<<<<< HEAD
use CodeIgniter\Encryption\EncrypterInterface;
use Config\Encryption;
use Psr\Log\LoggerInterface;
=======
use CodeIgniter\Config\BaseConfig;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Base class for encryption handling
 */
<<<<<<< HEAD
abstract class BaseHandler implements EncrypterInterface
{
	/**
	 * Logger instance to record error messages and warnings.
	 *
	 * @var LoggerInterface
	 */
	protected $logger;

	/**
	 * Constructor
	 *
	 * @param Encryption|null $config
	 */
	public function __construct(Encryption $config = null)
	{
		$config = $config ?? config('Encryption');

		// make the parameters conveniently accessible
		foreach (get_object_vars($config) as $key => $value)
		{
			if (property_exists($this, $key))
			{
				$this->{$key} = $value;
			}
=======
abstract class BaseHandler implements \CodeIgniter\Encryption\EncrypterInterface
{

	/**
	 * Configuraiton passed from encryption manager
	 *
	 * @var string
	 */
	protected $config;

	/**
	 * Logger instance to record error messages and warnings.
	 *
	 * @var \PSR\Log\LoggerInterface
	 */
	protected $logger;

	//--------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @param BaseConfig $config
	 */
	public function __construct(BaseConfig $config = null)
	{
		if (empty($config))
		{
			$config = new \Config\Encryption();
		}

		// make the parameters conveniently accessible
		foreach ($config as $pkey => $value)
		{
			$this->$pkey = $value;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
	}

	/**
	 * Byte-safe substr()
	 *
<<<<<<< HEAD
	 * @param string  $str
	 * @param integer $start
	 * @param integer $length
	 *
=======
	 * @param  string  $str
	 * @param  integer $start
	 * @param  integer $length
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return string
	 */
	protected static function substr($str, $start, $length = null)
	{
		return mb_substr($str, $start, $length, '8bit');
	}

	/**
	 * __get() magic, providing readonly access to some of our properties
	 *
	 * @param  string $key Property name
	 * @return mixed
	 */
	public function __get($key)
	{
<<<<<<< HEAD
		if ($this->__isset($key))
=======
		if (in_array($key, ['cipher', 'key'], true))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $this->{$key};
		}

		return null;
	}

	/**
	 * __isset() magic, providing checking for some of our properties
	 *
	 * @param  string $key Property name
	 * @return boolean
	 */
	public function __isset($key): bool
	{
<<<<<<< HEAD
		return property_exists($this, $key);
=======
		return in_array($key, ['cipher', 'key'], true);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}
