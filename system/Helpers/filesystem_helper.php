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
 * @copyright  2008-2014 EllisLab, Inc. (https://ellislab.com/)
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 1.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

/**
 * CodeIgniter File System Helpers
<<<<<<< HEAD
=======
 *
 * @package CodeIgniter
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
// ------------------------------------------------------------------------

if (! function_exists('directory_map'))
{
	/**
	 * Create a Directory Map
	 *
	 * Reads the specified directory and builds an array
	 * representation of it. Sub-folders contained with the
	 * directory will be mapped as well.
	 *
<<<<<<< HEAD
	 * @param string  $sourceDir      Path to source
	 * @param integer $directoryDepth Depth of directories to traverse
	 *                                 (0 = fully recursive, 1 = current dir, etc)
	 * @param boolean $hidden         Whether to show hidden files
	 *
	 * @return array
	 */
	function directory_map(string $sourceDir, int $directoryDepth = 0, bool $hidden = false): array
	{
		try
		{
			$fp = opendir($sourceDir);

			$fileData  = [];
			$newDepth  = $directoryDepth - 1;
			$sourceDir = rtrim($sourceDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
=======
	 * @param string  $source_dir      Path to source
	 * @param integer $directory_depth Depth of directories to traverse
	 *                                 (0 = fully recursive, 1 = current dir, etc)
	 * @param boolean $hidden          Whether to show hidden files
	 *
	 * @return array
	 */
	function directory_map(string $source_dir, int $directory_depth = 0, bool $hidden = false): array
	{
		try
		{
			$fp = opendir($source_dir);

			$fileData   = [];
			$new_depth  = $directory_depth - 1;
			$source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			while (false !== ($file = readdir($fp)))
			{
				// Remove '.', '..', and hidden files [optional]
				if ($file === '.' || $file === '..' || ($hidden === false && $file[0] === '.'))
				{
					continue;
				}

<<<<<<< HEAD
				is_dir($sourceDir . $file) && $file .= DIRECTORY_SEPARATOR;

				if (($directoryDepth < 1 || $newDepth > 0) && is_dir($sourceDir . $file))
				{
					$fileData[$file] = directory_map($sourceDir . $file, $newDepth, $hidden);
=======
				is_dir($source_dir . $file) && $file .= DIRECTORY_SEPARATOR;

				if (($directory_depth < 1 || $new_depth > 0) && is_dir($source_dir . $file))
				{
					$fileData[$file] = directory_map($source_dir . $file, $new_depth, $hidden);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
				else
				{
					$fileData[] = $file;
				}
			}

			closedir($fp);
			return $fileData;
		}
<<<<<<< HEAD
		catch (Throwable $e)
=======
		catch (\Throwable $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return [];
		}
	}
}

// ------------------------------------------------------------------------

if (! function_exists('write_file'))
{
	/**
	 * Write File
	 *
	 * Writes data to the file specified in the path.
	 * Creates a new file if non-existent.
	 *
	 * @param string $path File path
	 * @param string $data Data to write
	 * @param string $mode fopen() mode (default: 'wb')
	 *
	 * @return boolean
	 */
	function write_file(string $path, string $data, string $mode = 'wb'): bool
	{
		try
		{
			$fp = fopen($path, $mode);

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
<<<<<<< HEAD
		catch (Throwable $e)
=======
		catch (\Throwable $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return false;
		}
	}
}

// ------------------------------------------------------------------------

if (! function_exists('delete_files'))
{
	/**
	 * Delete Files
	 *
	 * Deletes all files contained in the supplied directory path.
	 * Files must be writable or owned by the system in order to be deleted.
	 * If the second parameter is set to true, any directories contained
	 * within the supplied base directory will be nuked as well.
	 *
<<<<<<< HEAD
	 * @param string  $path   File path
	 * @param boolean $delDir Whether to delete any directories found in the path
	 * @param boolean $htdocs Whether to skip deleting .htaccess and index page files
	 * @param boolean $hidden Whether to include hidden files (files beginning with a period)
	 *
	 * @return boolean
	 */
	function delete_files(string $path, bool $delDir = false, bool $htdocs = false, bool $hidden = false): bool
=======
	 * @param string  $path    File path
	 * @param boolean $del_dir Whether to delete any directories found in the path
	 * @param boolean $htdocs  Whether to skip deleting .htaccess and index page files
	 * @param boolean $hidden  Whether to include hidden files (files beginning with a period)
	 *
	 * @return boolean
	 */
	function delete_files(string $path, bool $del_dir = false, bool $htdocs = false, bool $hidden = false): bool
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$path = realpath($path) ?: $path;
		$path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

		try
		{
			foreach (new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
				RecursiveIteratorIterator::CHILD_FIRST
			) as $object)
			{
				$filename = $object->getFilename();
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				if (! $hidden && $filename[0] === '.')
				{
					continue;
				}
<<<<<<< HEAD

				if (! $htdocs || ! preg_match('/^(\.htaccess|index\.(html|htm|php)|web\.config)$/i', $filename))
				{
					$isDir = $object->isDir();
					if ($isDir && $delDir)
=======
				elseif (! $htdocs || ! preg_match('/^(\.htaccess|index\.(html|htm|php)|web\.config)$/i', $filename))
				{
					$isDir = $object->isDir();

					if ($isDir && $del_dir)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					{
						@rmdir($object->getPathname());
						continue;
					}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					if (! $isDir)
					{
						@unlink($object->getPathname());
					}
				}
			}

			return true;
		}
<<<<<<< HEAD
		catch (Throwable $e)
=======
		catch (\Throwable $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return false;
		}
	}
}

// ------------------------------------------------------------------------

if (! function_exists('get_filenames'))
{
	/**
	 * Get Filenames
	 *
	 * Reads the specified directory and builds an array containing the filenames.
	 * Any sub-folders contained within the specified path are read as well.
	 *
<<<<<<< HEAD
	 * @param string       $sourceDir   Path to source
	 * @param boolean|null $includePath Whether to include the path as part of the filename; false for no path, null for a relative path, true for full path
	 * @param boolean      $hidden      Whether to include hidden files (files beginning with a period)
	 *
	 * @return array
	 */
	function get_filenames(string $sourceDir, ?bool $includePath = false, bool $hidden = false): array
	{
		$files = [];

		$sourceDir = realpath($sourceDir) ?: $sourceDir;
		$sourceDir = rtrim($sourceDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
=======
	 * @param string       $source_dir   Path to source
	 * @param boolean|null $include_path Whether to include the path as part of the filename; false for no path, null for a relative path, true for full path
	 * @param boolean      $hidden       Whether to include hidden files (files beginning with a period)
	 *
	 * @return array
	 */
	function get_filenames(string $source_dir, ?bool $include_path = false, bool $hidden = false): array
	{
		$files = [];

		$source_dir = realpath($source_dir) ?: $source_dir;
		$source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		try
		{
			foreach (new RecursiveIteratorIterator(
<<<<<<< HEAD
					new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
=======
					new RecursiveDirectoryIterator($source_dir, RecursiveDirectoryIterator::SKIP_DOTS),
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					RecursiveIteratorIterator::SELF_FIRST
				) as $name => $object)
			{
				$basename = pathinfo($name, PATHINFO_BASENAME);
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				if (! $hidden && $basename[0] === '.')
				{
					continue;
				}
<<<<<<< HEAD

				if ($includePath === false)
				{
					$files[] = $basename;
				}
				elseif (is_null($includePath))
				{
					$files[] = str_replace($sourceDir, '', $name);
=======
				elseif ($include_path === false)
				{
					$files[] = $basename;
				}
				elseif (is_null($include_path))
				{
					$files[] = str_replace($source_dir, '', $name);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
				else
				{
					$files[] = $name;
				}
			}
		}
<<<<<<< HEAD
		catch (Throwable $e)
=======
		catch (\Throwable $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return [];
		}

		sort($files);

		return $files;
	}
}

// --------------------------------------------------------------------

if (! function_exists('get_dir_file_info'))
{
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
	 * @param boolean $recursion    Internal variable to determine recursion status - do not use in calls
	 *
	 * @return array
	 */
	function get_dir_file_info(string $sourceDir, bool $topLevelOnly = true, bool $recursion = false): array
	{
		static $fileData = [];
		$relativePath    = $sourceDir;

		try
		{
			$fp = @opendir($sourceDir); {
				// reset the array and make sure $source_dir has a trailing slash on the initial call
			if ($recursion === false)
				{
				$fileData  = [];
				$sourceDir = rtrim(realpath($sourceDir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
=======
	 * @param string  $source_dir     Path to source
	 * @param boolean $top_level_only Look only at the top level directory specified?
	 * @param boolean $recursion      Internal variable to determine recursion status - do not use in calls
	 *
	 * @return array
	 */
	function get_dir_file_info(string $source_dir, bool $top_level_only = true, bool $recursion = false): array
	{
		static $fileData = [];
		$relative_path   = $source_dir;

		try
		{
			$fp = @opendir($source_dir); {
				// reset the array and make sure $source_dir has a trailing slash on the initial call
			if ($recursion === false)
				{
				$fileData   = [];
				$source_dir = rtrim(realpath($source_dir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}

				// Used to be foreach (scandir($source_dir, 1) as $file), but scandir() is simply not as fast
			while (false !== ($file = readdir($fp)))
				{
<<<<<<< HEAD
				if (is_dir($sourceDir . $file) && $file[0] !== '.' && $topLevelOnly === false)
				{
					get_dir_file_info($sourceDir . $file . DIRECTORY_SEPARATOR, $topLevelOnly, true);
				}
				elseif ($file[0] !== '.')
				{
					$fileData[$file]                  = get_file_info($sourceDir . $file);
					$fileData[$file]['relative_path'] = $relativePath;
=======
				if (is_dir($source_dir . $file) && $file[0] !== '.' && $top_level_only === false)
				{
					get_dir_file_info($source_dir . $file . DIRECTORY_SEPARATOR, $top_level_only, true);
				}
				elseif ($file[0] !== '.')
				{
					$fileData[$file]                  = get_file_info($source_dir . $file);
					$fileData[$file]['relative_path'] = $relative_path;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
			}

				closedir($fp);
				return $fileData;
			}
		}
<<<<<<< HEAD
		catch (Throwable $fe)
=======
		catch (\Throwable $fe)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return [];
		}
	}
}

// --------------------------------------------------------------------

if (! function_exists('get_file_info'))
{
	/**
	 * Get File Info
	 *
	 * Given a file and path, returns the name, path, size, date modified
	 * Second parameter allows you to explicitly declare what information you want returned
	 * Options are: name, server_path, size, date, readable, writable, executable, fileperms
	 * Returns false if the file cannot be found.
	 *
<<<<<<< HEAD
	 * @param string $file           Path to file
	 * @param mixed  $returnedValues Array or comma separated string of information returned
	 *
	 * @return array|null
	 */
	function get_file_info(string $file, $returnedValues = ['name', 'server_path', 'size', 'date'])
=======
	 * @param string $file            Path to file
	 * @param mixed  $returned_values Array or comma separated string of information returned
	 *
	 * @return array|null
	 */
	function get_file_info(string $file, $returned_values = ['name', 'server_path', 'size', 'date'])
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if (! is_file($file))
		{
			return null;
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
			switch ($key) {
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
					$fileInfo['writable'] = is_really_writable($file);
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
}

// --------------------------------------------------------------------

if (! function_exists('symbolic_permissions'))
{
	/**
	 * Symbolic Permissions
	 *
	 * Takes a numeric value representing a file's permissions and returns
	 * standard symbolic notation representing that value
	 *
	 * @param  integer $perms Permissions
	 * @return string
	 */
	function symbolic_permissions(int $perms): string
	{
		if (($perms & 0xC000) === 0xC000)
		{
			$symbolic = 's'; // Socket
		}
		elseif (($perms & 0xA000) === 0xA000)
		{
			$symbolic = 'l'; // Symbolic Link
		}
		elseif (($perms & 0x8000) === 0x8000)
		{
			$symbolic = '-'; // Regular
		}
		elseif (($perms & 0x6000) === 0x6000)
		{
			$symbolic = 'b'; // Block special
		}
		elseif (($perms & 0x4000) === 0x4000)
		{
			$symbolic = 'd'; // Directory
		}
		elseif (($perms & 0x2000) === 0x2000)
		{
			$symbolic = 'c'; // Character special
		}
		elseif (($perms & 0x1000) === 0x1000)
		{
			$symbolic = 'p'; // FIFO pipe
		}
		else
		{
			$symbolic = 'u'; // Unknown
		}

		// Owner
		$symbolic .= (($perms & 0x0100) ? 'r' : '-')
				. (($perms & 0x0080) ? 'w' : '-')
<<<<<<< HEAD
				. (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));
=======
				. (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Group
		$symbolic .= (($perms & 0x0020) ? 'r' : '-')
				. (($perms & 0x0010) ? 'w' : '-')
<<<<<<< HEAD
				. (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));
=======
				. (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// World
		$symbolic .= (($perms & 0x0004) ? 'r' : '-')
				. (($perms & 0x0002) ? 'w' : '-')
<<<<<<< HEAD
				. (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));
=======
				. (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $symbolic;
	}
}

// --------------------------------------------------------------------

if (! function_exists('octal_permissions'))
{
	/**
	 * Octal Permissions
	 *
	 * Takes a numeric value representing a file's permissions and returns
	 * a three character string representing the file's octal permissions
	 *
	 * @param  integer $perms Permissions
	 * @return string
	 */
	function octal_permissions(int $perms): string
	{
		return substr(sprintf('%o', $perms), -3);
	}
}

// ------------------------------------------------------------------------

if (! function_exists('set_realpath'))
{
	/**
	 * Set Realpath
	 *
	 * @param string  $path
<<<<<<< HEAD
	 * @param boolean $checkExistence Checks to see if the path exists
	 *
	 * @return string
	 */
	function set_realpath(string $path, bool $checkExistence = false): string
=======
	 * @param boolean $check_existence Checks to see if the path exists
	 *
	 * @return string
	 */
	function set_realpath(string $path, bool $check_existence = false): string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		// Security check to make sure the path is NOT a URL. No remote file inclusion!
		if (preg_match('#^(http:\/\/|https:\/\/|www\.|ftp)#i', $path) || filter_var($path, FILTER_VALIDATE_IP) === $path)
		{
			throw new InvalidArgumentException('The path you submitted must be a local server path, not a URL');
		}

		// Resolve the path
		if (realpath($path) !== false)
		{
			$path = realpath($path);
		}
<<<<<<< HEAD
		elseif ($checkExistence && ! is_dir($path) && ! is_file($path))
=======
		elseif ($check_existence && ! is_dir($path) && ! is_file($path))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			throw new InvalidArgumentException('Not a valid path: ' . $path);
		}

		// Add a trailing slash, if this is a directory
		return is_dir($path) ? rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR : $path;
	}
}
