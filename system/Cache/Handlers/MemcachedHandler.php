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

namespace CodeIgniter\Cache\Handlers;

<<<<<<< HEAD
use CodeIgniter\Exceptions\CriticalError;
use Config\Cache;
use Exception;
use Memcache;
use Memcached;
=======
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Exceptions\CriticalError;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Mamcached cache handler
 */
<<<<<<< HEAD
class MemcachedHandler extends BaseHandler
{
=======
class MemcachedHandler implements CacheInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Prefixed to all cache names.
	 *
	 * @var string
	 */
	protected $prefix;

	/**
	 * The memcached object
	 *
<<<<<<< HEAD
	 * @var Memcached|Memcache
=======
	 * @var \Memcached|\Memcache
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $memcached;

	/**
	 * Memcached Configuration
	 *
	 * @var array
	 */
	protected $config = [
		'host'   => '127.0.0.1',
		'port'   => 11211,
		'weight' => 1,
		'raw'    => false,
	];

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param Cache $config
	 */
	public function __construct(Cache $config)
	{
		$this->prefix = (string) $config->prefix;
=======
	 * @param \Config\Cache $config
	 */
	public function __construct($config)
	{
		$this->prefix = $config->prefix ?: '';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		if (! empty($config))
		{
			$this->config = array_merge($this->config, $config->memcached);
		}
	}

	/**
	 * Class destructor
	 *
	 * Closes the connection to Memcache(d) if present.
	 */
	public function __destruct()
	{
<<<<<<< HEAD
		if ($this->memcached instanceof Memcached)
		{
			$this->memcached->quit();
		}
		elseif ($this->memcached instanceof Memcache)
=======
		if ($this->memcached instanceof \Memcached)
		{
			$this->memcached->quit();
		}
		elseif ($this->memcached instanceof \Memcache)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$this->memcached->close();
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Takes care of any handler-specific setup that must be done.
	 */
	public function initialize()
	{
		// Try to connect to Memcache or Memcached, if an issue occurs throw a CriticalError exception,
		// so that the CacheFactory can attempt to initiate the next cache handler.
		try
		{
<<<<<<< HEAD
			if (class_exists(Memcached::class))
			{
				// Create new instance of Memcached
				$this->memcached = new Memcached();
				if ($this->config['raw'])
				{
					$this->memcached->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
=======
			if (class_exists('\Memcached'))
			{
				// Create new instance of \Memcached
				$this->memcached = new \Memcached();
				if ($this->config['raw'])
				{
					$this->memcached->setOption(\Memcached::OPT_BINARY_PROTOCOL, true);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}

				// Add server
				$this->memcached->addServer(
					$this->config['host'], $this->config['port'], $this->config['weight']
				);

				// attempt to get status of servers
				$stats = $this->memcached->getStats();

				// $stats should be an associate array with a key in the format of host:port.
				// If it doesn't have the key, we know the server is not working as expected.
				if (! isset($stats[$this->config['host'] . ':' . $this->config['port']]))
				{
					throw new CriticalError('Cache: Memcached connection failed.');
				}
			}
<<<<<<< HEAD
			elseif (class_exists(Memcache::class))
			{
				// Create new instance of Memcache
				$this->memcached = new Memcache();

				// Check if we can connect to the server
				$canConnect = $this->memcached->connect(
=======
			elseif (class_exists('\Memcache'))
			{
				// Create new instance of \Memcache
				$this->memcached = new \Memcache();

				// Check if we can connect to the server
				$can_connect = $this->memcached->connect(
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					$this->config['host'], $this->config['port']
				);

				// If we can't connect, throw a CriticalError exception
<<<<<<< HEAD
				if ($canConnect === false)
=======
				if ($can_connect === false)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				{
					throw new CriticalError('Cache: Memcache connection failed.');
				}

				// Add server, third parameter is persistence and defaults to TRUE.
				$this->memcached->addServer(
					$this->config['host'], $this->config['port'], true, $this->config['weight']
				);
			}
			else
			{
				throw new CriticalError('Cache: Not support Memcache(d) extension.');
			}
		}
		catch (CriticalError $e)
		{
			// If a CriticalError exception occurs, throw it up.
			throw $e;
		}
<<<<<<< HEAD
		catch (Exception $e)
=======
		catch (\Exception $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			// If an \Exception occurs, convert it into a CriticalError exception and throw it.
			throw new CriticalError('Cache: Memcache(d) connection refused (' . $e->getMessage() . ').');
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Attempts to fetch an item from the cache store.
	 *
	 * @param string $key Cache item name
	 *
	 * @return mixed
	 */
	public function get(string $key)
	{
		$key = $this->prefix . $key;

<<<<<<< HEAD
		if ($this->memcached instanceof Memcached)
=======
		if ($this->memcached instanceof \Memcached)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$data = $this->memcached->get($key);

			// check for unmatched key
<<<<<<< HEAD
			if ($this->memcached->getResultCode() === Memcached::RES_NOTFOUND)
=======
			if ($this->memcached->getResultCode() === \Memcached::RES_NOTFOUND)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				return null;
			}
		}
<<<<<<< HEAD
		elseif ($this->memcached instanceof Memcache)
		{
			$flags = false;
			$data  = $this->memcached->get($key, $flags); // @phpstan-ignore-line
=======
		elseif ($this->memcached instanceof \Memcache)
		{
			$flags = false;
			$data  = $this->memcached->get($key, $flags);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			// check for unmatched key (i.e. $flags is untouched)
			if ($flags === false)
			{
				return null;
			}
		}

<<<<<<< HEAD
		return is_array($data) ? $data[0] : $data; // @phpstan-ignore-line
=======
		return is_array($data) ? $data[0] : $data;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Saves an item to the cache store.
	 *
	 * @param string  $key   Cache item name
	 * @param mixed   $value The data to save
	 * @param integer $ttl   Time To Live, in seconds (default 60)
	 *
	 * @return mixed
	 */
	public function save(string $key, $value, int $ttl = 60)
	{
		$key = $this->prefix . $key;

		if (! $this->config['raw'])
		{
			$value = [
				$value,
				time(),
				$ttl,
			];
		}

<<<<<<< HEAD
		if ($this->memcached instanceof Memcached)
=======
		if ($this->memcached instanceof \Memcached)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $this->memcached->set($key, $value, $ttl);
		}

<<<<<<< HEAD
		if ($this->memcached instanceof Memcache)
=======
		if ($this->memcached instanceof \Memcache)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $this->memcached->set($key, $value, 0, $ttl);
		}

<<<<<<< HEAD
		// @phpstan-ignore-next-line
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Deletes a specific item from the cache store.
	 *
	 * @param string $key Cache item name
	 *
	 * @return boolean
	 */
	public function delete(string $key)
	{
		$key = $this->prefix . $key;

		return $this->memcached->delete($key);
	}

	//--------------------------------------------------------------------

	/**
	 * Performs atomic incrementation of a raw stored value.
	 *
	 * @param string  $key    Cache ID
	 * @param integer $offset Step/value to increase by
	 *
	 * @return mixed
	 */
	public function increment(string $key, int $offset = 1)
	{
		if (! $this->config['raw'])
		{
			return false;
		}

		$key = $this->prefix . $key;

<<<<<<< HEAD
		// @phpstan-ignore-next-line
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return $this->memcached->increment($key, $offset, $offset, 60);
	}

	//--------------------------------------------------------------------

	/**
	 * Performs atomic decrementation of a raw stored value.
	 *
	 * @param string  $key    Cache ID
	 * @param integer $offset Step/value to increase by
	 *
	 * @return mixed
	 */
	public function decrement(string $key, int $offset = 1)
	{
		if (! $this->config['raw'])
		{
			return false;
		}

		$key = $this->prefix . $key;

		//FIXME: third parameter isn't other handler actions.
<<<<<<< HEAD
		// @phpstan-ignore-next-line
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return $this->memcached->decrement($key, $offset, $offset, 60);
	}

	//--------------------------------------------------------------------

	/**
	 * Will delete all items in the entire cache.
	 *
	 * @return boolean
	 */
	public function clean()
	{
		return $this->memcached->flush();
	}

	//--------------------------------------------------------------------

	/**
	 * Returns information on the entire cache.
	 *
	 * The information returned and the structure of the data
	 * varies depending on the handler.
	 *
	 * @return mixed
	 */
	public function getCacheInfo()
	{
		return $this->memcached->getStats();
	}

	//--------------------------------------------------------------------

	/**
	 * Returns detailed information about the specific item in the cache.
	 *
	 * @param string $key Cache item name.
	 *
	 * @return mixed
	 */
	public function getMetaData(string $key)
	{
		$key = $this->prefix . $key;

		$stored = $this->memcached->get($key);

		// if not an array, don't try to count for PHP7.2
		if (! is_array($stored) || count($stored) !== 3)
		{
			return false;
		}

		list($data, $time, $ttl) = $stored;

		return [
			'expire' => $time + $ttl,
			'mtime'  => $time,
			'data'   => $data,
		];
	}

	//--------------------------------------------------------------------

	/**
	 * Determines if the driver is supported on this system.
	 *
	 * @return boolean
	 */
	public function isSupported(): bool
	{
		return (extension_loaded('memcached') || extension_loaded('memcache'));
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
