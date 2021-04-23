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

namespace CodeIgniter\Encryption;

<<<<<<< HEAD
use CodeIgniter\Encryption\Exceptions\EncryptionException;
use Config\Encryption as EncryptionConfig;
=======
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Encryption\Exceptions\EncryptionException;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * CodeIgniter Encryption Manager
 *
 * Provides two-way keyed encryption via PHP's Sodium and/or OpenSSL extensions.
 * This class determines the driver, cipher, and mode to use, and then
 * initializes the appropriate encryption handler.
 */
class Encryption
{
<<<<<<< HEAD
	/**
	 * The encrypter we create
	 *
	 * @var EncrypterInterface
=======

	/**
	 * The encrypter we create
	 *
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $encrypter;

	/**
	 * The driver being used
<<<<<<< HEAD
	 *
	 * @var string
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $driver;

	/**
	 * The key/seed being used
<<<<<<< HEAD
	 *
	 * @var string
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $key;

	/**
<<<<<<< HEAD
	 * The derived HMAC key
	 *
	 * @var string
=======
	 * The derived hmac key
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $hmacKey;

	/**
	 * HMAC digest to use
<<<<<<< HEAD
	 *
	 * @var string
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $digest = 'SHA512';

	/**
	 * Map of drivers to handler classes, in preference order
	 *
	 * @var array
	 */
	protected $drivers = [
		'OpenSSL',
<<<<<<< HEAD
		'Sodium',
	];

	/**
	 * Handlers that are to be installed
	 *
	 * @var array<string, boolean>
	 */
	protected $handlers = [];
=======
	];

	// --------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Class constructor
	 *
<<<<<<< HEAD
	 * @param EncryptionConfig $config Configuration parameters
	 *
	 * @throws EncryptionException
	 *
	 * @return void
	 */
	public function __construct(EncryptionConfig $config = null)
	{
		$config = $config ?? new EncryptionConfig();

		$this->key    = $config->key;
		$this->driver = $config->driver;
		$this->digest = $config->digest ?? 'SHA512';

		// Map what we have installed
		$this->handlers = [
			'OpenSSL' => extension_loaded('openssl'),
			// the SodiumHandler uses some API (like sodium_pad) that is available only on v1.0.14+
			'Sodium'  => extension_loaded('sodium') && version_compare(SODIUM_LIBRARY_VERSION, '1.0.14', '>='),
		];

		// If requested driver is not active, bail
		if (! in_array($this->driver, $this->drivers, true) || (array_key_exists($this->driver, $this->handlers) && ! $this->handlers[$this->driver]))
		{
			// this should never happen in travis-ci
			throw EncryptionException::forNoHandlerAvailable($this->driver);
=======
	 * @param  BaseConfig $config Configuration parameters
	 * @return void
	 *
	 * @throws \CodeIgniter\Encryption\Exceptions\EncryptionException
	 */
	public function __construct(BaseConfig $config = null)
	{
		if (empty($config))
		{
			$config = new \Config\Encryption();
		}
		$this->driver = $config->driver;
		$this->key    = $config->key;

		// determine what is installed
		$this->handlers = [
			'OpenSSL' => extension_loaded('openssl'),
		];

		// if any aren't there, bomb
		if (in_array(false, $this->handlers))
		{
			// this should never happen in travis-ci
			// @codeCoverageIgnoreStart
			throw EncryptionException::forNoHandlerAvailable($this->driver);
			// @codeCoverageIgnoreEnd
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
	}

	/**
	 * Initialize or re-initialize an encrypter
	 *
<<<<<<< HEAD
	 * @param EncryptionConfig $config Configuration parameters
	 *
	 * @throws EncryptionException
	 *
	 * @return EncrypterInterface
	 */
	public function initialize(EncryptionConfig $config = null)
	{
		// override config?
		if ($config)
		{
			$this->key    = $config->key;
			$this->driver = $config->driver;
			$this->digest = $config->digest ?? 'SHA512';
=======
	 * @param  BaseConfig $config Configuration parameters
	 * @return \CodeIgniter\Encryption\EncrypterInterface
	 *
	 * @throws \CodeIgniter\Encryption\Exceptions\EncryptionException
	 */
	public function initialize(BaseConfig $config = null)
	{
		// override config?
		if (! empty($config))
		{
			$this->driver = $config->driver;
			$this->key    = $config->key;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		// Insist on a driver
		if (empty($this->driver))
		{
			throw EncryptionException::forNoDriverRequested();
		}

		// Check for an unknown driver
<<<<<<< HEAD
		if (! in_array($this->driver, $this->drivers, true))
=======
		if (! in_array($this->driver, $this->drivers))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			throw EncryptionException::forUnKnownHandler($this->driver);
		}

		if (empty($this->key))
		{
			throw EncryptionException::forNeedsStarterKey();
		}

		// Derive a secret key for the encrypter
		$this->hmacKey = bin2hex(\hash_hkdf($this->digest, $this->key));

		$handlerName     = 'CodeIgniter\\Encryption\\Handlers\\' . $this->driver . 'Handler';
		$this->encrypter = new $handlerName($config);
<<<<<<< HEAD

		return $this->encrypter;
	}

	/**
	 * Create a random key
	 *
	 * @param integer $length Output length
	 *
=======
		return $this->encrypter;
	}

	// --------------------------------------------------------------------

	/**
	 * Create a random key
	 *
	 * @param  integer $length Output length
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return string
	 */
	public static function createKey($length = 32)
	{
		return random_bytes($length);
	}

<<<<<<< HEAD
	/**
	 * __get() magic, providing readonly access to some of our protected properties
	 *
	 * @param string $key Property name
	 *
=======
	// --------------------------------------------------------------------

	/**
	 * __get() magic, providing readonly access to some of our protected properties
	 *
	 * @param  string $key Property name
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return mixed
	 */
	public function __get($key)
	{
<<<<<<< HEAD
		if ($this->__isset($key))
=======
		if (in_array($key, ['key', 'digest', 'driver', 'drivers'], true))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $this->{$key};
		}

		return null;
	}

	/**
	 * __isset() magic, providing checking for some of our protected properties
	 *
	 * @param  string $key Property name
	 * @return boolean
	 */
	public function __isset($key): bool
	{
		return in_array($key, ['key', 'digest', 'driver', 'drivers'], true);
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
