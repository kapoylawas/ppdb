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

namespace CodeIgniter\Session\Handlers;

<<<<<<< HEAD
use CodeIgniter\Session\Exceptions\SessionException;
use Config\App as AppConfig;
use Memcached;
=======
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Exceptions\SessionException;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Session handler using Memcache for persistence
 */
<<<<<<< HEAD
class MemcachedHandler extends BaseHandler
{
	/**
	 * Memcached instance
	 *
	 * @var Memcached|null
=======
class MemcachedHandler extends BaseHandler implements \SessionHandlerInterface
{

	/**
	 * Memcached instance
	 *
	 * @var \Memcached
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $memcached;

	/**
	 * Key prefix
	 *
	 * @var string
	 */
	protected $keyPrefix = 'ci_session:';

	/**
	 * Lock key
	 *
<<<<<<< HEAD
	 * @var string|null
=======
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $lockKey;

	/**
	 * Number of seconds until the session ends.
	 *
	 * @var integer
	 */
	protected $sessionExpiration = 7200;

	//--------------------------------------------------------------------

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param  AppConfig $config
	 * @param  string    $ipAddress
	 * @throws SessionException
	 */
	public function __construct(AppConfig $config, string $ipAddress)
=======
	 * @param  BaseConfig $config
	 * @param  string     $ipAddress
	 * @throws \CodeIgniter\Session\Exceptions\SessionException
	 */
	public function __construct(BaseConfig $config, string $ipAddress)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		parent::__construct($config, $ipAddress);

		if (empty($this->savePath))
		{
			throw SessionException::forEmptySavepath();
		}

		if ($this->matchIP === true)
		{
			$this->keyPrefix .= $this->ipAddress . ':';
		}

		if (! empty($this->keyPrefix))
		{
			ini_set('memcached.sess_prefix', $this->keyPrefix);
		}

		$this->sessionExpiration = $config->sessionExpiration;
	}

	//--------------------------------------------------------------------

	/**
	 * Open
	 *
	 * Sanitizes save_path and initializes connections.
	 *
<<<<<<< HEAD
	 * @param string $savePath Server path(s)
	 * @param string $name     Session cookie name, unused
	 *
	 * @return boolean
	 */
	public function open($savePath, $name): bool
	{
		$this->memcached = new Memcached();
		$this->memcached->setOption(Memcached::OPT_BINARY_PROTOCOL, true); // required for touch() usage

		$serverList = [];

		foreach ($this->memcached->getServerList() as $server)
		{
			$serverList[] = $server['host'] . ':' . $server['port'];
=======
	 * @param string $save_path Server path(s)
	 * @param string $name      Session cookie name, unused
	 *
	 * @return boolean
	 */
	public function open($save_path, $name): bool
	{
		$this->memcached = new \Memcached();
		$this->memcached->setOption(\Memcached::OPT_BINARY_PROTOCOL, true); // required for touch() usage

		$server_list = [];

		foreach ($this->memcached->getServerList() as $server)
		{
			$server_list[] = $server['host'] . ':' . $server['port'];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		if (! preg_match_all('#,?([^,:]+)\:(\d{1,5})(?:\:(\d+))?#', $this->savePath, $matches, PREG_SET_ORDER)
		)
		{
			$this->memcached = null;
			$this->logger->error('Session: Invalid Memcached save path format: ' . $this->savePath);

			return false;
		}

		foreach ($matches as $match)
		{
			// If Memcached already has this server (or if the port is invalid), skip it
<<<<<<< HEAD
			if (in_array($match[1] . ':' . $match[2], $serverList, true))
=======
			if (in_array($match[1] . ':' . $match[2], $server_list, true))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->logger->debug('Session: Memcached server pool already has ' . $match[1] . ':' . $match[2]);
				continue;
			}

			if (! $this->memcached->addServer($match[1], $match[2], $match[3] ?? 0))
			{
				$this->logger->error('Could not add ' . $match[1] . ':' . $match[2] . ' to Memcached server pool.');
			}
			else
			{
<<<<<<< HEAD
				$serverList[] = $match[1] . ':' . $match[2];
			}
		}

		if (empty($serverList))
=======
				$server_list[] = $match[1] . ':' . $match[2];
			}
		}

		if (empty($server_list))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$this->logger->error('Session: Memcached server pool is empty.');

			return false;
		}

		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Read
	 *
	 * Reads session data and acquires a lock
	 *
	 * @param string $sessionID Session ID
	 *
	 * @return string    Serialized session data
	 */
	public function read($sessionID): string
	{
		if (isset($this->memcached) && $this->lockSession($sessionID))
		{
			// Needed by write() to detect session_regenerate_id() calls
<<<<<<< HEAD
			if (is_null($this->sessionID)) // @phpstan-ignore-line
=======
			if (is_null($this->sessionID))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->sessionID = $sessionID;
			}

<<<<<<< HEAD
			$sessionData       = (string) $this->memcached->get($this->keyPrefix . $sessionID);
			$this->fingerprint = md5($sessionData);

			return $sessionData;
=======
			$session_data      = (string) $this->memcached->get($this->keyPrefix . $sessionID);
			$this->fingerprint = md5($session_data);

			return $session_data;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return '';
	}

	//--------------------------------------------------------------------

	/**
	 * Write
	 *
	 * Writes (create / update) session data
	 *
	 * @param string $sessionID   Session ID
	 * @param string $sessionData Serialized session data
	 *
	 * @return boolean
	 */
	public function write($sessionID, $sessionData): bool
	{
		if (! isset($this->memcached))
		{
			return false;
		}
<<<<<<< HEAD

		// Was the ID regenerated?
		if ($sessionID !== $this->sessionID)
=======
		// Was the ID regenerated?
		elseif ($sessionID !== $this->sessionID)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			if (! $this->releaseLock() || ! $this->lockSession($sessionID))
			{
				return false;
			}

			$this->fingerprint = md5('');
			$this->sessionID   = $sessionID;
		}

		if (isset($this->lockKey))
		{
			$this->memcached->replace($this->lockKey, time(), 300);

			if ($this->fingerprint !== ($fingerprint = md5($sessionData)))
			{
				if ($this->memcached->set($this->keyPrefix . $sessionID, $sessionData, $this->sessionExpiration))
				{
					$this->fingerprint = $fingerprint;

					return true;
				}

				return false;
			}

			return $this->memcached->touch($this->keyPrefix . $sessionID, $this->sessionExpiration);
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Close
	 *
	 * Releases locks and closes connection.
	 *
	 * @return boolean
	 */
	public function close(): bool
	{
		if (isset($this->memcached))
		{
			isset($this->lockKey) && $this->memcached->delete($this->lockKey);

			if (! $this->memcached->quit())
			{
				return false;
			}

			$this->memcached = null;

			return true;
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Destroy
	 *
	 * Destroys the current session.
	 *
<<<<<<< HEAD
	 * @param string $sessionId Session ID
	 *
	 * @return boolean
	 */
	public function destroy($sessionId): bool
	{
		if (isset($this->memcached, $this->lockKey))
		{
			$this->memcached->delete($this->keyPrefix . $sessionId);
=======
	 * @param string $session_id Session ID
	 *
	 * @return boolean
	 */
	public function destroy($session_id): bool
	{
		if (isset($this->memcached, $this->lockKey))
		{
			$this->memcached->delete($this->keyPrefix . $session_id);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			return $this->destroyCookie();
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Garbage Collector
	 *
	 * Deletes expired sessions
	 *
	 * @param integer $maxlifetime Maximum lifetime of sessions
	 *
	 * @return boolean
	 */
	public function gc($maxlifetime): bool
	{
		// Not necessary, Memcached takes care of that.
		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Get lock
	 *
	 * Acquires an (emulated) lock.
	 *
	 * @param string $sessionID Session ID
	 *
	 * @return boolean
	 */
	protected function lockSession(string $sessionID): bool
	{
		if (isset($this->lockKey))
		{
			return $this->memcached->replace($this->lockKey, time(), 300);
		}

		// 30 attempts to obtain a lock, in case another request already has it
<<<<<<< HEAD
		$lockKey = $this->keyPrefix . $sessionID . ':lock';
		$attempt = 0;

		do
		{
			if ($this->memcached->get($lockKey))
=======
		$lock_key = $this->keyPrefix . $sessionID . ':lock';
		$attempt  = 0;

		do
		{
			if ($this->memcached->get($lock_key))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				sleep(1);
				continue;
			}

<<<<<<< HEAD
			if (! $this->memcached->set($lockKey, time(), 300))
=======
			if (! $this->memcached->set($lock_key, time(), 300))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->logger->error('Session: Error while trying to obtain lock for ' . $this->keyPrefix . $sessionID);

				return false;
			}

<<<<<<< HEAD
			$this->lockKey = $lockKey;
=======
			$this->lockKey = $lock_key;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			break;
		}
		while (++ $attempt < 30);

		if ($attempt === 30)
		{
			$this->logger->error('Session: Unable to obtain lock for ' . $this->keyPrefix . $sessionID . ' after 30 attempts, aborting.');

			return false;
		}

		$this->lock = true;

		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Release lock
	 *
	 * Releases a previously acquired lock
	 *
	 * @return boolean
	 */
	protected function releaseLock(): bool
	{
		if (isset($this->memcached, $this->lockKey) && $this->lock)
		{
			if (! $this->memcached->delete($this->lockKey) &&
<<<<<<< HEAD
					$this->memcached->getResultCode() !== Memcached::RES_NOTFOUND
=======
					$this->memcached->getResultCode() !== \Memcached::RES_NOTFOUND
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			)
			{
				$this->logger->error('Session: Error while trying to free lock for ' . $this->lockKey);

				return false;
			}

			$this->lockKey = null;
			$this->lock    = false;
		}

		return true;
	}

	//--------------------------------------------------------------------
}
