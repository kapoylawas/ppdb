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

namespace CodeIgniter\Session\Handlers;

<<<<<<< HEAD
use CodeIgniter\Session\Exceptions\SessionException;
use Config\App as AppConfig;
use Exception;
=======
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Exceptions\SessionException;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Session handler using file system for storage
 */
<<<<<<< HEAD
class FileHandler extends BaseHandler
{
=======
class FileHandler extends BaseHandler implements \SessionHandlerInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Where to save the session files to.
	 *
	 * @var string
	 */
	protected $savePath;

	/**
	 * The file handle
	 *
<<<<<<< HEAD
	 * @var resource|null
=======
	 * @var resource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $fileHandle;

	/**
	 * File Name
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var resource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $filePath;

	/**
	 * Whether this is a new file.
	 *
	 * @var boolean
	 */
	protected $fileNew;

	/**
	 * Whether IP addresses should be matched.
	 *
	 * @var boolean
	 */
	protected $matchIP = false;

<<<<<<< HEAD
	/**
	 * Regex of session ID
	 *
	 * @var string
	 */
	protected $sessionIDRegex = '';

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	//--------------------------------------------------------------------

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param AppConfig $config
	 * @param string    $ipAddress
	 */
	public function __construct(AppConfig $config, string $ipAddress)
=======
	 * @param BaseConfig $config
	 * @param string     $ipAddress
	 */
	public function __construct($config, string $ipAddress)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		parent::__construct($config, $ipAddress);

		if (! empty($config->sessionSavePath))
		{
			$this->savePath = rtrim($config->sessionSavePath, '/\\');
			ini_set('session.save_path', $config->sessionSavePath);
		}
		else
		{
			$sessionPath = rtrim(ini_get('session.save_path'), '/\\');

			if (! $sessionPath)
			{
				$sessionPath = WRITEPATH . 'session';
			}

			$this->savePath = $sessionPath;
		}

		$this->matchIP = $config->sessionMatchIP;

		$this->configureSessionIDRegex();
	}

	//--------------------------------------------------------------------

	/**
	 * Open
	 *
	 * Sanitizes the save_path directory.
	 *
	 * @param string $savePath Path to session files' directory
	 * @param string $name     Session cookie name
	 *
	 * @return boolean
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function open($savePath, $name): bool
	{
		if (! is_dir($savePath))
		{
			if (! mkdir($savePath, 0700, true))
			{
				throw SessionException::forInvalidSavePath($this->savePath);
			}
		}
		elseif (! is_writable($savePath))
		{
			throw SessionException::forWriteProtectedSavePath($this->savePath);
		}

		$this->savePath = $savePath;
		$this->filePath = $this->savePath . '/'
						  . $name // we'll use the session cookie name as a prefix to avoid collisions
						  . ($this->matchIP ? md5($this->ipAddress) : '');

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
<<<<<<< HEAD
	 * @return string|boolean    Serialized session data
	 */
	public function read($sessionID)
=======
	 * @return string    Serialized session data
	 */
	public function read($sessionID): string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		// This might seem weird, but PHP 5.6 introduced session_reset(),
		// which re-reads session data
		if ($this->fileHandle === null)
		{
			$this->fileNew = ! is_file($this->filePath . $sessionID);

			if (($this->fileHandle = fopen($this->filePath . $sessionID, 'c+b')) === false)
			{
				$this->logger->error("Session: Unable to open file '" . $this->filePath . $sessionID . "'.");

				return false;
			}

			if (flock($this->fileHandle, LOCK_EX) === false)
			{
				$this->logger->error("Session: Unable to obtain lock for file '" . $this->filePath . $sessionID . "'.");
				fclose($this->fileHandle);
				$this->fileHandle = null;

				return false;
			}

			// Needed by write() to detect session_regenerate_id() calls
<<<<<<< HEAD
			if (is_null($this->sessionID)) // @phpstan-ignore-line
=======
			if (is_null($this->sessionID))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->sessionID = $sessionID;
			}

			if ($this->fileNew)
			{
				chmod($this->filePath . $sessionID, 0600);
				$this->fingerprint = md5('');

				return '';
			}
		}
		else
		{
			rewind($this->fileHandle);
		}

<<<<<<< HEAD
		$sessionData = '';
=======
		$session_data = '';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		clearstatcache();    // Address https://github.com/codeigniter4/CodeIgniter4/issues/2056
		for ($read = 0, $length = filesize($this->filePath . $sessionID); $read < $length; $read += strlen($buffer))
		{
			if (($buffer = fread($this->fileHandle, $length - $read)) === false)
			{
				break;
			}

<<<<<<< HEAD
			$sessionData .= $buffer;
		}

		$this->fingerprint = md5($sessionData);

		return $sessionData;
=======
			$session_data .= $buffer;
		}

		$this->fingerprint = md5($session_data);

		return $session_data;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
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
		// If the two IDs don't match, we have a session_regenerate_id() call
		if ($sessionID !== $this->sessionID)
		{
			$this->sessionID = $sessionID;
		}

		if (! is_resource($this->fileHandle))
		{
			return false;
		}
<<<<<<< HEAD

		if ($this->fingerprint === md5($sessionData))
=======
		elseif ($this->fingerprint === md5($sessionData))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return ($this->fileNew) ? true : touch($this->filePath . $sessionID);
		}

		if (! $this->fileNew)
		{
			ftruncate($this->fileHandle, 0);
			rewind($this->fileHandle);
		}

		if (($length = strlen($sessionData)) > 0)
		{
			for ($written = 0; $written < $length; $written += $result)
			{
				if (($result = fwrite($this->fileHandle, substr($sessionData, $written))) === false)
				{
					break;
				}
			}

<<<<<<< HEAD
			if (! is_int($result)) // @phpstan-ignore-line
=======
			if (! is_int($result))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->fingerprint = md5(substr($sessionData, 0, $written));
				$this->logger->error('Session: Unable to write data.');

				return false;
			}
		}

		$this->fingerprint = md5($sessionData);

		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Close
	 *
	 * Releases locks and closes file descriptor.
	 *
	 * @return boolean
	 */
	public function close(): bool
	{
		if (is_resource($this->fileHandle))
		{
			flock($this->fileHandle, LOCK_UN);
			fclose($this->fileHandle);

<<<<<<< HEAD
			$this->fileHandle = null;
			$this->fileNew    = false;
=======
			$this->fileHandle = $this->fileNew = null;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			return true;
		}

		return true;
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
		if ($this->close())
		{
			return is_file($this->filePath . $sessionId)
				? (unlink($this->filePath . $sessionId) && $this->destroyCookie()) : true;
		}

		if ($this->filePath !== null)
		{
			clearstatcache();

			return is_file($this->filePath . $sessionId)
				? (unlink($this->filePath . $sessionId) && $this->destroyCookie()) : true;
=======
	 * @param string $session_id Session ID
	 *
	 * @return boolean
	 */
	public function destroy($session_id): bool
	{
		if ($this->close())
		{
			return is_file($this->filePath . $session_id)
				? (unlink($this->filePath . $session_id) && $this->destroyCookie()) : true;
		}
		elseif ($this->filePath !== null)
		{
			clearstatcache();

			return is_file($this->filePath . $session_id)
				? (unlink($this->filePath . $session_id) && $this->destroyCookie()) : true;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
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
		if (! is_dir($this->savePath) || ($directory = opendir($this->savePath)) === false)
		{
			$this->logger->debug("Session: Garbage collector couldn't list files under directory '" . $this->savePath . "'.");

			return false;
		}

		$ts = time() - $maxlifetime;

		$pattern = $this->matchIP === true
			? '[0-9a-f]{32}'
			: '';

		$pattern = sprintf(
			'#\A%s' . $pattern . $this->sessionIDRegex . '\z#',
			preg_quote($this->cookieName)
		);

		while (($file = readdir($directory)) !== false)
		{
			// If the filename doesn't match this pattern, it's either not a session file or is not ours
			if (! preg_match($pattern, $file)
				|| ! is_file($this->savePath . DIRECTORY_SEPARATOR . $file)
				|| ($mtime = filemtime($this->savePath . DIRECTORY_SEPARATOR . $file)) === false
				|| $mtime > $ts
			)
			{
				continue;
			}

			unlink($this->savePath . DIRECTORY_SEPARATOR . $file);
		}

		closedir($directory);

		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Configure Session ID regular expression
	 */
	protected function configureSessionIDRegex()
	{
<<<<<<< HEAD
		$bitsPerCharacter = (int) ini_get('session.sid_bits_per_character');
		$SIDLength        = (int) ini_get('session.sid_length');
=======
		$bitsPerCharacter = (int)ini_get('session.sid_bits_per_character');
		$SIDLength        = (int)ini_get('session.sid_length');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		if (($bits = $SIDLength * $bitsPerCharacter) < 160)
		{
			// Add as many more characters as necessary to reach at least 160 bits
<<<<<<< HEAD
			$SIDLength += (int) ceil((160 % $bits) / $bitsPerCharacter);
			ini_set('session.sid_length', (string) $SIDLength);
=======
			$SIDLength += (int)ceil((160 % $bits) / $bitsPerCharacter);
			ini_set('session.sid_length', $SIDLength);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		// Yes, 4,5,6 are the only known possible values as of 2016-10-27
		switch ($bitsPerCharacter)
		{
			case 4:
				$this->sessionIDRegex = '[0-9a-f]';
				break;
			case 5:
				$this->sessionIDRegex = '[0-9a-v]';
				break;
			case 6:
				$this->sessionIDRegex = '[0-9a-zA-Z,-]';
				break;
		}

		$this->sessionIDRegex .= '{' . $SIDLength . '}';
	}
}
