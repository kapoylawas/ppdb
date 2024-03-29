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

namespace CodeIgniter\Log;

use CodeIgniter\Log\Exceptions\LogException;
<<<<<<< HEAD
use CodeIgniter\Log\Handlers\HandlerInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Throwable;
=======
use Psr\Log\LoggerInterface;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * The CodeIgntier Logger
 *
 * The message MUST be a string or object implementing __toString().
 *
 * The message MAY contain placeholders in the form: {foo} where foo
 * will be replaced by the context data in key "foo".
 *
 * The context array can contain arbitrary data, the only assumption that
 * can be made by implementors is that if an Exception instance is given
 * to produce a stack trace, it MUST be in a key named "exception".
<<<<<<< HEAD
 */
class Logger implements LoggerInterface
{
=======
 *
 * @package CodeIgniter\Log
 */
class Logger implements LoggerInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Used by the logThreshold Config setting to define
	 * which errors to show.
	 *
<<<<<<< HEAD
	 * @var array<string, integer>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $logLevels = [
		'emergency' => 1,
		'alert'     => 2,
		'critical'  => 3,
		'error'     => 4,
		'warning'   => 5,
		'notice'    => 6,
		'info'      => 7,
		'debug'     => 8,
	];

	/**
	 * Array of levels to be logged.
	 * The rest will be ignored.
	 * Set in Config/logger.php
	 *
	 * @var array
	 */
	protected $loggableLevels = [];

	/**
	 * File permissions
	 *
	 * @var integer
	 */
	protected $filePermissions = 0644;

	/**
	 * Format of the timestamp for log files.
	 *
	 * @var string
	 */
	protected $dateFormat = 'Y-m-d H:i:s';

	/**
	 * Filename Extension
	 *
	 * @var string
	 */
	protected $fileExt;

	/**
	 * Caches instances of the handlers.
	 *
	 * @var array
	 */
	protected $handlers = [];

	/**
	 * Holds the configuration for each handler.
	 * The key is the handler's class name. The
	 * value is an associative array of configuration
	 * items.
	 *
	 * @var array
	 */
	protected $handlerConfig = [];

	/**
	 * Caches logging calls for debugbar.
	 *
	 * @var array
	 */
	public $logCache;

	/**
	 * Should we cache our logged items?
	 *
	 * @var boolean
	 */
	protected $cacheLogs = false;

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
	 * @param  \Config\Logger $config
	 * @param  boolean        $debug
<<<<<<< HEAD
	 * @throws RuntimeException
=======
	 * @throws \RuntimeException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __construct($config, bool $debug = CI_DEBUG)
	{
		$this->loggableLevels = is_array($config->threshold) ? $config->threshold : range(1, (int) $config->threshold);

		// Now convert loggable levels to strings.
		// We only use numbers to make the threshold setting convenient for users.
		if ($this->loggableLevels)
		{
			$temp = [];
			foreach ($this->loggableLevels as $level)
			{
<<<<<<< HEAD
				$temp[] = array_search((int) $level, $this->logLevels, true);
=======
				$temp[] = array_search((int) $level, $this->logLevels);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}

			$this->loggableLevels = $temp;
			unset($temp);
		}

		$this->dateFormat = $config->dateFormat ?? $this->dateFormat;

		if (! is_array($config->handlers) || empty($config->handlers))
		{
			throw LogException::forNoHandlers('LoggerConfig');
		}

		// Save the handler configuration for later.
		// Instances will be created on demand.
		$this->handlerConfig = $config->handlers;

		$this->cacheLogs = $debug;
		if ($this->cacheLogs)
		{
			$this->logCache = [];
		}
	}

	//--------------------------------------------------------------------

	/**
	 * System is unusable.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function emergency($message, array $context = []): bool
	{
		return $this->log('emergency', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Action must be taken immediately.
	 *
	 * Example: Entire website down, database unavailable, etc. This should
	 * trigger the SMS alerts and wake you up.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function alert($message, array $context = []): bool
	{
		return $this->log('alert', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Critical conditions.
	 *
	 * Example: Application component unavailable, unexpected exception.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function critical($message, array $context = []): bool
	{
		return $this->log('critical', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Runtime errors that do not require immediate action but should typically
	 * be logged and monitored.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function error($message, array $context = []): bool
	{
		return $this->log('error', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Exceptional occurrences that are not errors.
	 *
	 * Example: Use of deprecated APIs, poor use of an API, undesirable things
	 * that are not necessarily wrong.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function warning($message, array $context = []): bool
	{
		return $this->log('warning', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Normal but significant events.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function notice($message, array $context = []): bool
	{
		return $this->log('notice', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Interesting events.
	 *
	 * Example: User logs in, SQL logs.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function info($message, array $context = []): bool
	{
		return $this->log('info', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Detailed debug information.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function debug($message, array $context = []): bool
	{
		return $this->log('debug', $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed  $level
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function log($level, $message, array $context = []): bool
	{
		if (is_numeric($level))
		{
<<<<<<< HEAD
			$level = array_search((int) $level, $this->logLevels, true);
=======
			$level = array_search((int) $level, $this->logLevels);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		// Is the level a valid level?
		if (! array_key_exists($level, $this->logLevels))
		{
			throw LogException::forInvalidLogLevel($level);
		}

		// Does the app want to log this right now?
<<<<<<< HEAD
		if (! in_array($level, $this->loggableLevels, true))
=======
		if (! in_array($level, $this->loggableLevels))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return false;
		}

		// Parse our placeholders
		$message = $this->interpolate($message, $context);

		if (! is_string($message))
		{
			$message = print_r($message, true);
		}

		if ($this->cacheLogs)
		{
			$this->logCache[] = [
				'level' => $level,
				'msg'   => $message,
			];
		}

		foreach ($this->handlerConfig as $className => $config)
		{
			if (! array_key_exists($className, $this->handlers))
			{
				$this->handlers[$className] = new $className($config);
			}

			/**
<<<<<<< HEAD
			 * @var HandlerInterface
=======
			 * @var \CodeIgniter\Log\Handlers\HandlerInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			 */
			$handler = $this->handlers[$className];

			if (! $handler->canHandle($level))
			{
				continue;
			}

			// If the handler returns false, then we
			// don't execute any other handlers.
			if (! $handler->setDateFormat($this->dateFormat)->handle($level, $message))
			{
				break;
			}
		}

		return true;
	}

	//--------------------------------------------------------------------

	/**
	 * Replaces any placeholders in the message with variables
	 * from the context, as well as a few special items like:
	 *
	 * {session_vars}
	 * {post_vars}
	 * {get_vars}
	 * {env}
	 * {env:foo}
	 * {file}
	 * {line}
	 *
	 * @param mixed $message
	 * @param array $context
	 *
	 * @return mixed
	 */
	protected function interpolate($message, array $context = [])
	{
		if (! is_string($message))
		{
			return $message;
		}

		// build a replacement array with braces around the context keys
		$replace = [];

		foreach ($context as $key => $val)
		{
			// Verify that the 'exception' key is actually an exception
			// or error, both of which implement the 'Throwable' interface.
<<<<<<< HEAD
			if ($key === 'exception' && $val instanceof Throwable)
=======
			if ($key === 'exception' && $val instanceof \Throwable)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$val = $val->getMessage() . ' ' . $this->cleanFileNames($val->getFile()) . ':' . $val->getLine();
			}

			// todo - sanitize input before writing to file?
			$replace['{' . $key . '}'] = $val;
		}

		// Add special placeholders
		$replace['{post_vars}'] = '$_POST: ' . print_r($_POST, true);
		$replace['{get_vars}']  = '$_GET: ' . print_r($_GET, true);
		$replace['{env}']       = ENVIRONMENT;

		// Allow us to log the file/line that we are logging from
		if (strpos($message, '{file}') !== false)
		{
			list($file, $line) = $this->determineFile();

			$replace['{file}'] = $file;
			$replace['{line}'] = $line;
		}

		// Match up environment variables in {env:foo} tags.
		if (strpos($message, 'env:') !== false)
		{
			preg_match('/env:[^}]+/', $message, $matches);

			if ($matches)
			{
				foreach ($matches as $str)
				{
					$key                 = str_replace('env:', '', $str);
					$replace["{{$str}}"] = $_ENV[$key] ?? 'n/a';
				}
			}
		}

		if (isset($_SESSION))
		{
			$replace['{session_vars}'] = '$_SESSION: ' . print_r($_SESSION, true);
		}

		// interpolate replacement values into the message and return
		return strtr($message, $replace);
	}

	/**
	 * Determines the file and line that the logging call
	 * was made from by analyzing the backtrace.
	 * Find the earliest stack frame that is part of our logging system.
	 *
	 * @return array
	 */
	public function determineFile(): array
	{
		$logFunctions = [
			'log_message',
			'log',
			'error',
			'debug',
			'info',
			'warning',
			'critical',
			'emergency',
			'alert',
			'notice',
		];

		// Generate Backtrace info
<<<<<<< HEAD
		$trace = \debug_backtrace(0);
=======
		$trace = \debug_backtrace(false);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// So we search from the bottom (earliest) of the stack frames
		$stackFrames = \array_reverse($trace);

		// Find the first reference to a Logger class method
		foreach ($stackFrames as $frame)
		{
<<<<<<< HEAD
			if (\in_array($frame['function'], $logFunctions, true))
=======
			if (\in_array($frame['function'], $logFunctions))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$file = isset($frame['file']) ? $this->cleanFileNames($frame['file']) : 'unknown';
				$line = $frame['line'] ?? 'unknown';
				return [
					$file,
					$line,
				];
			}
		}

		return [
			'unknown',
			'unknown',
		];
	}

	//--------------------------------------------------------------------

	/**
	 * Cleans the paths of filenames by replacing APPPATH, SYSTEMPATH, FCPATH
	 * with the actual var. i.e.
	 *
	 *  /var/www/site/app/Controllers/Home.php
	 *      becomes:
	 *  APPPATH/Controllers/Home.php
	 *
<<<<<<< HEAD
	 * @param string $file
=======
	 * @param $file
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return string
	 */
	protected function cleanFileNames(string $file): string
	{
		$file = str_replace(APPPATH, 'APPPATH/', $file);
		$file = str_replace(SYSTEMPATH, 'SYSTEMPATH/', $file);

		return str_replace(FCPATH, 'FCPATH/', $file);
	}

	//--------------------------------------------------------------------
}
