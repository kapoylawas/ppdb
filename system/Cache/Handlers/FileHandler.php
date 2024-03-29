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

namespace CodeIgniter\Cache\Handlers;

<<<<<<< HEAD
use CodeIgniter\Cache\Exceptions\CacheException;
use Config\Cache;
=======
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Cache\Exceptions\CacheException;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * File system cache handler
 */
<<<<<<< HEAD
class FileHandler extends BaseHandler
{
=======
class FileHandler implements CacheInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Prefixed to all cache names.
	 *
	 * @var string
	 */
	protected $prefix;

	/**
	 * Where to store cached files on the disk.
	 *
	 * @var string
	 */
	protected $path;

<<<<<<< HEAD
	/**
	 * Mode for the stored files.
	 * Must be chmod-safe (octal).
	 *
	 * @var integer
	 *
	 * @see https://www.php.net/manual/en/function.chmod.php
	 */
	protected $mode;

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param  Cache $config
	 * @throws CacheException
	 */
	public function __construct(Cache $config)
	{
		if (! property_exists($config, 'file'))
		{
			$config->file = [
				'storePath' => $config->storePath ?? WRITEPATH . 'cache',
				'mode'      => 0640,
			];
		}

		$this->path = ! empty($config->file['storePath']) ? $config->file['storePath'] : WRITEPATH . 'cache';
		$this->path = rtrim($this->path, '/') . '/';

		if (! is_really_writable($this->path))
		{
			throw CacheException::forUnableToWrite($this->path);
		}

		$this->mode   = $config->file['mode'] ?? 0640;
		$this->prefix = (string) $config->prefix;
=======
	 * @param  \Config\Cache $config
	 * @throws CacheException
	 */
	public function __construct($config)
	{
		$path = ! empty($config->storePath) ? $config->storePath : WRITEPATH . 'cache';
		if (! is_really_writable($path))
		{
			throw CacheException::forUnableToWrite($path);
		}

		$this->prefix = $config->prefix ?: '';
		$this->path   = rtrim($path, '/') . '/';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Takes care of any handler-specific setup that must be done.
	 */
	public function initialize()
	{
		// Not to see here...
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

		$data = $this->getItem($key);

		return is_array($data) ? $data['data'] : null;
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

		$contents = [
			'time' => time(),
			'ttl'  => $ttl,
			'data' => $value,
		];

		if ($this->writeFile($this->path . $key, serialize($contents)))
		{
<<<<<<< HEAD
			chmod($this->path . $key, $this->mode);
=======
			chmod($this->path . $key, 0640);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			return true;
		}

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

		return is_file($this->path . $key) && unlink($this->path . $key);
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
		$key = $this->prefix . $key;

		$data = $this->getItem($key);

		if ($data === false)
		{
			$data = [
				'data' => 0,
				'ttl'  => 60,
			];
		}
		elseif (! is_int($data['data']))
		{
			return false;
		}

<<<<<<< HEAD
		$newValue = $data['data'] + $offset;

		return $this->save($key, $newValue, $data['ttl']) ? $newValue : false;
=======
		$new_value = $data['data'] + $offset;

		return $this->save($key, $new_value, $data['ttl']) ? $new_value : false;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
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
		$key = $this->prefix . $key;

		$data = $this->getItem($key);

		if ($data === false)
		{
			$data = [
				'data' => 0,
				'ttl'  => 60,
			];
		}
		elseif (! is_int($data['data']))
		{
			return false;
		}

<<<<<<< HEAD
		$newValue = $data['data'] - $offset;

		return $this->save($key, $newValue, $data['ttl']) ? $newValue : false;
=======
		$new_value = $data['data'] - $offset;

		return $this->save($key, $new_value, $data['ttl']) ? $new_value : false;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Will delete all items in the entire cache.
	 *
	 * @return boolean
	 */
	public function clean()
	{
		return $this->deleteFiles($this->path, false, true);
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
		return $this->getDirFileInfo($this->path);
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

		if (! is_file($this->path . $key))
		{
			return false;
		}

		$data = @unserialize(file_get_contents($this->path . $key));

		if (is_array($data))
		{
			$mtime = filemtime($this->path . $key);

			if (! isset($data['ttl']))
			{
				return false;
			}

			return [
				'expire' => $mtime + $data['ttl'],
				'mtime'  => $mtime,
				'data'   => $data['data'],
			];
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Determines if the driver is supported on this system.
	 *
	 * @return boolean
	 */
	public function isSupported(): bool
	{
		return is_writable($this->path);
	}

	//--------------------------------------------------------------------

	/**
	 * Does the heavy lifting of actually retrieving the file and
	 * verifying it's age.
	 *
	 * @param string $key
	 *
	 * @return boolean|mixed
	 */
	protected function getItem(string $key)
	{
		if (! is_file($this->path . $key))
		{
			return false;
		}

		$data = unserialize(file_get_contents($this->path . $key));

<<<<<<< HEAD
		// @phpstan-ignore-next-line
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if ($data['ttl'] > 0 && time() > $data['time'] + $data['ttl'])
		{
			// If the file is still there then remove it
			if (is_file($this->path . $key))
			{
				unlink($this->path . $key);
			}

			return false;
		}

		return $data;
	}

	//--------------------------------------------------------------------
	//--------------------------------------------------------------------
	// SUPPORT METHODS FOR FILES
	//--------------------------------------------------------------------

	/**
	 * Writes a file to disk, or returns false if not successful.
	 *
	 * @param string $path
	 * @param string $data
	 * @param string $mode
	 *
	 * @return boolean
	 */
	protected function writeFile($path, $data, $mode = 'wb')
	{
		if (($fp = @fopen($path, $mode)) === false)
		{
			return false;
		}

		flock($fp, LOCK_EX);

		for ($result = $written = 0, $length = strlen($data); $written < $length; $written += $result)
		{
			if (($result = fwrite($fp, substr($data, $written))) === false)
			{
				break;
			}
		}

		flock($fp, LOCK_UN);
		fclose($fp);

		return is_int($result);
	}

	//--------------------------------------------------------------------

	/**
	 * Delete Files
	 *
	 * Deletes all files contained in the supplied directory path.
	 * Files must be writable or owned by the system in order to be deleted.
	 * If the second parameter is set to TRUE, any directories contained
	 * within the supplied base directory will be nuked as well.
	 *
<<<<<<< HEAD
	 * @param string  $path   File path
	 * @param boolean $delDir Whether to delete any directories found in the path
	 * @param boolean $htdocs Whether to skip deleting .htaccess and index page files
	 * @param integer $_level Current directory depth level (default: 0; internal use only)
	 *
	 * @return boolean
	 */
	protected function deleteFiles(string $path, bool $delDir = false, bool $htdocs = false, int $_level = 0): bool
=======
	 * @param string  $path    File path
	 * @param boolean $del_dir Whether to delete any directories found in the path
	 * @param boolean $htdocs  Whether to skip deleting .htaccess and index page files
	 * @param integer $_level  Current directory depth level (default: 0; internal use only)
	 *
	 * @return boolean
	 */
	protected function deleteFiles(string $path, bool $del_dir = false, bool $htdocs = false, int $_level = 0): bool
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		// Trim the trailing slash
		$path = rtrim($path, '/\\');

<<<<<<< HEAD
		if (! $currentDir = @opendir($path))
=======
		if (! $current_dir = @opendir($path))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return false;
		}

<<<<<<< HEAD
		while (false !== ($filename = @readdir($currentDir)))
=======
		while (false !== ($filename = @readdir($current_dir)))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			if ($filename !== '.' && $filename !== '..')
			{
				if (is_dir($path . DIRECTORY_SEPARATOR . $filename) && $filename[0] !== '.')
				{
<<<<<<< HEAD
					$this->deleteFiles($path . DIRECTORY_SEPARATOR . $filename, $delDir, $htdocs, $_level + 1);
=======
					$this->deleteFiles($path . DIRECTORY_SEPARATOR . $filename, $del_dir, $htdocs, $_level + 1);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
				elseif ($htdocs !== true || ! preg_match('/^(\.htaccess|index\.(html|htm|php)|web\.config)$/i', $filename))
				{
					@unlink($path . DIRECTORY_SEPARATOR . $filename);
				}
			}
		}

<<<<<<< HEAD
		closedir($currentDir);

		return ($delDir === true && $_level > 0) ? @rmdir($path) : true;
=======
		closedir($current_dir);

		return ($del_dir === true && $_level > 0) ? @rmdir($path) : true;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Get Directory File Information
	 *
	 * Reads the specified directory and builds an array containing the filenames,
	 * filesize, dates, and permissions
	 *
	 * Any sub-folders contained within the specified path are read as well.
	 *
<<<<<<< HEAD
	 * @param string  $sourceDir    Path to source
	 * @param boolean $topLevelOnly Look only at the top level directory specified?
	 * @param boolean $_recursion   Internal variable to determine recursion status - do not use in calls
	 *
	 * @return array|false
	 */
	protected function getDirFileInfo(string $sourceDir, bool $topLevelOnly = true, bool $_recursion = false)
	{
		static $_filedata = [];
		$relativePath     = $sourceDir;

		if ($fp = @opendir($sourceDir))
=======
	 * @param string  $source_dir     Path to source
	 * @param boolean $top_level_only Look only at the top level directory specified?
	 * @param boolean $_recursion     Internal variable to determine recursion status - do not use in calls
	 *
	 * @return array|false
	 */
	protected function getDirFileInfo(string $source_dir, bool $top_level_only = true, bool $_recursion = false)
	{
		static $_filedata = [];
		$relative_path    = $source_dir;

		if ($fp = @opendir($source_dir))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			// reset the array and make sure $source_dir has a trailing slash on the initial call
			if ($_recursion === false)
			{
<<<<<<< HEAD
				$_filedata = [];
				$sourceDir = rtrim(realpath($sourceDir) ?: $sourceDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
=======
				$_filedata  = [];
				$source_dir = rtrim(realpath($source_dir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}

			// Used to be foreach (scandir($source_dir, 1) as $file), but scandir() is simply not as fast
			while (false !== ($file = readdir($fp)))
			{
<<<<<<< HEAD
				if (is_dir($sourceDir . $file) && $file[0] !== '.' && $topLevelOnly === false)
				{
					$this->getDirFileInfo($sourceDir . $file . DIRECTORY_SEPARATOR, $topLevelOnly, true);
				}
				elseif ($file[0] !== '.')
				{
					$_filedata[$file]                  = $this->getFileInfo($sourceDir . $file);
					$_filedata[$file]['relative_path'] = $relativePath;
=======
				if (is_dir($source_dir . $file) && $file[0] !== '.' && $top_level_only === false)
				{
					$this->getDirFileInfo($source_dir . $file . DIRECTORY_SEPARATOR, $top_level_only, true);
				}
				elseif ($file[0] !== '.')
				{
					$_filedata[$file]                  = $this->getFileInfo($source_dir . $file);
					$_filedata[$file]['relative_path'] = $relative_path;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
			}

			closedir($fp);

			return $_filedata;
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Get File Info
	 *
	 * Given a file and path, returns the name, path, size, date modified
	 * Second parameter allows you to explicitly declare what information you want returned
	 * Options are: name, server_path, size, date, readable, writable, executable, fileperms
	 * Returns FALSE if the file cannot be found.
	 *
<<<<<<< HEAD
	 * @param string $file           Path to file
	 * @param mixed  $returnedValues Array or comma separated string of information returned
	 *
	 * @return array|false
	 */
	protected function getFileInfo(string $file, $returnedValues = ['name', 'server_path', 'size', 'date'])
=======
	 * @param string $file            Path to file
	 * @param mixed  $returned_values Array or comma separated string of information returned
	 *
	 * @return array|false
	 */
	protected function getFileInfo(string $file, $returned_values = ['name', 'server_path', 'size', 'date'])
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if (! is_file($file))
		{
			return false;
		}

<<<<<<< HEAD
		if (is_string($returnedValues))
		{
			$returnedValues = explode(',', $returnedValues);
		}

		foreach ($returnedValues as $key)
=======
		if (is_string($returned_values))
		{
			$returned_values = explode(',', $returned_values);
		}

		foreach ($returned_values as $key)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			switch ($key)
			{
				case 'name':
					$fileInfo['name'] = basename($file);
					break;
				case 'server_path':
					$fileInfo['server_path'] = $file;
					break;
				case 'size':
					$fileInfo['size'] = filesize($file);
					break;
				case 'date':
					$fileInfo['date'] = filemtime($file);
					break;
				case 'readable':
					$fileInfo['readable'] = is_readable($file);
					break;
				case 'writable':
					$fileInfo['writable'] = is_writable($file);
					break;
				case 'executable':
					$fileInfo['executable'] = is_executable($file);
					break;
				case 'fileperms':
					$fileInfo['fileperms'] = fileperms($file);
					break;
			}
		}

<<<<<<< HEAD
		return $fileInfo; // @phpstan-ignore-line
=======
		return $fileInfo;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------
}
