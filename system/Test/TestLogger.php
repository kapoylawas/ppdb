<<<<<<< HEAD
<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\Test;
=======
<?php namespace CodeIgniter\Test;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Log\Logger;

class TestLogger extends Logger
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	protected static $op_logs = [];

	//--------------------------------------------------------------------

	/**
	 * The log method is overridden so that we can store log history during
	 * the tests to allow us to check ->assertLogged() methods.
	 *
	 * @param string $level
	 * @param string $message
	 * @param array  $context
	 *
	 * @return boolean
	 */
	public function log($level, $message, array $context = []): bool
	{
		// While this requires duplicate work, we want to ensure
		// we have the final message to test against.
<<<<<<< HEAD
		$logMessage = $this->interpolate($message, $context);
=======
		$log_message = $this->interpolate($message, $context);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Determine the file and line by finding the first
		// backtrace that is not part of our logging system.
		$trace = debug_backtrace();
		$file  = null;

		foreach ($trace as $row)
		{
<<<<<<< HEAD
			if (! in_array($row['function'], ['log', 'log_message'], true))
=======
			if (! in_array($row['function'], ['log', 'log_message']))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$file = basename($row['file'] ?? '');
				break;
			}
		}

		self::$op_logs[] = [
				  'level'   => $level,
<<<<<<< HEAD
				  'message' => $logMessage,
=======
				  'message' => $log_message,
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				  'file'    => $file,
			  ];

		// Let the parent do it's thing.
		return parent::log($level, $message, $context);
	}

	//--------------------------------------------------------------------

	/**
	 * Used by CIUnitTestCase class to provide ->assertLogged() methods.
	 *
	 * @param string $level
	 * @param string $message
	 *
	 * @return boolean
	 */
	public static function didLog(string $level, $message)
	{
		foreach (self::$op_logs as $log)
		{
			if (strtolower($log['level']) === strtolower($level) && $message === $log['message'])
			{
				return true;
			}
		}

		return false;
	}

	//--------------------------------------------------------------------
	// Expose cleanFileNames()
	public function cleanup($file)
	{
		return $this->cleanFileNames($file);
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
