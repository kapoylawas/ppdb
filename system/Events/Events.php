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

namespace CodeIgniter\Events;

<<<<<<< HEAD
use Config\Modules;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use Config\Services;

define('EVENT_PRIORITY_LOW', 200);
define('EVENT_PRIORITY_NORMAL', 100);
define('EVENT_PRIORITY_HIGH', 10);

/**
 * Events
 */
class Events
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The list of listeners.
	 *
	 * @var array
	 */
	protected static $listeners = [];

	/**
	 * Flag to let us know if we've read from the Config file(s)
	 * and have all of the defined events.
	 *
	 * @var boolean
	 */
	protected static $initialized = false;

	/**
	 * If true, events will not actually be fired.
	 * Useful during testing.
	 *
	 * @var boolean
	 */
	protected static $simulate = false;

	/**
	 * Stores information about the events
	 * for display in the debug toolbar.
	 *
<<<<<<< HEAD
	 * @var array<array<string, float|string>>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected static $performanceLog = [];

	/**
	 * A list of found files.
	 *
<<<<<<< HEAD
	 * @var string[]
	 */
	protected static $files = [];

	/**
	 * Ensures that we have a events file ready.
	 *
	 * @return void
=======
	 * @var array
	 */
	protected static $files = [];

	//--------------------------------------------------------------------

	/**
	 * Ensures that we have a events file ready.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function initialize()
	{
		// Don't overwrite anything....
		if (static::$initialized)
		{
			return;
		}

<<<<<<< HEAD
		/**
		 * @var Modules
		 */
		$config = config('Modules');
		$events = APPPATH . 'Config' . DIRECTORY_SEPARATOR . 'Events.php';
		$files  = [];

		if ($config->shouldDiscover('events'))
		{
			$files = Services::locator()->search('Config/Events.php');
		}

		$files = array_filter(array_map(static function (string $file) {
			if (is_file($file))
			{
				return realpath($file) ?: $file;
			}

			return false; // @codeCoverageIgnore
		}, $files));

		static::$files = array_unique(array_merge($files, [$events]));

		foreach (static::$files as $file)
		{
			include $file;
=======
		$config = config('Modules');

		$files = [APPPATH . 'Config/Events.php'];

		if ($config->shouldDiscover('events'))
		{
			$locator = Services::locator();
			$files   = $locator->search('Config/Events.php');
		}

		static::$files = $files;

		foreach (static::$files as $file)
		{
			if (is_file($file))
			{
				include $file;
			}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		static::$initialized = true;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Registers an action to happen on an event. The action can be any sort
	 * of callable:
	 *
	 *  Events::on('create', 'myFunction');               // procedural function
	 *  Events::on('create', ['myClass', 'myMethod']);    // Class::method
	 *  Events::on('create', [$myInstance, 'myMethod']);  // Method on an existing instance
	 *  Events::on('create', function() {});              // Closure
	 *
<<<<<<< HEAD
	 * @param string   $eventName
	 * @param callable $callback
	 * @param integer  $priority
	 *
	 * @return void
	 */
	public static function on($eventName, $callback, $priority = EVENT_PRIORITY_NORMAL)
	{
		if (! isset(static::$listeners[$eventName]))
		{
			static::$listeners[$eventName] = [
=======
	 * @param $event_name
	 * @param callable   $callback
	 * @param integer    $priority
	 */
	public static function on($event_name, $callback, $priority = EVENT_PRIORITY_NORMAL)
	{
		if (! isset(static::$listeners[$event_name]))
		{
			static::$listeners[$event_name] = [
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				true, // If there's only 1 item, it's sorted.
				[$priority],
				[$callback],
			];
		}
		else
		{
<<<<<<< HEAD
			static::$listeners[$eventName][0]   = false; // Not sorted
			static::$listeners[$eventName][1][] = $priority;
			static::$listeners[$eventName][2][] = $callback;
		}
	}

=======
			static::$listeners[$event_name][0]   = false; // Not sorted
			static::$listeners[$event_name][1][] = $priority;
			static::$listeners[$event_name][2][] = $callback;
		}
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Runs through all subscribed methods running them one at a time,
	 * until either:
	 *  a) All subscribers have finished or
	 *  b) a method returns false, at which point execution of subscribers stops.
	 *
<<<<<<< HEAD
	 * @param string $eventName
	 * @param mixed  $arguments
=======
	 * @param $eventName
	 * @param $arguments
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return boolean
	 */
	public static function trigger($eventName, ...$arguments): bool
	{
<<<<<<< HEAD
		// Read in our Config/Events file so that we have them all!
=======
		// Read in our Config/events file so that we have them all!
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (! static::$initialized)
		{
			static::initialize();
		}

		$listeners = static::listeners($eventName);

		foreach ($listeners as $listener)
		{
			$start = microtime(true);

			$result = static::$simulate === false ? call_user_func($listener, ...$arguments) : true;

			if (CI_DEBUG)
			{
				static::$performanceLog[] = [
					'start' => $start,
					'end'   => microtime(true),
					'event' => strtolower($eventName),
				];
			}

			if ($result === false)
			{
				return false;
			}
		}

		return true;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Returns an array of listeners for a single event. They are
	 * sorted by priority.
	 *
<<<<<<< HEAD
	 * @param string $eventName
	 *
	 * @return array
	 */
	public static function listeners($eventName): array
	{
		if (! isset(static::$listeners[$eventName]))
=======
	 * If the listener could not be found, returns FALSE, or TRUE if
	 * it was removed.
	 *
	 * @param $event_name
	 *
	 * @return array
	 */
	public static function listeners($event_name): array
	{
		if (! isset(static::$listeners[$event_name]))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return [];
		}

		// The list is not sorted
<<<<<<< HEAD
		if (! static::$listeners[$eventName][0])
		{
			// Sort it!
			array_multisort(static::$listeners[$eventName][1], SORT_NUMERIC, static::$listeners[$eventName][2]);

			// Mark it as sorted already!
			static::$listeners[$eventName][0] = true;
		}

		return static::$listeners[$eventName][2];
	}

=======
		if (! static::$listeners[$event_name][0])
		{
			// Sort it!
			array_multisort(static::$listeners[$event_name][1], SORT_NUMERIC, static::$listeners[$event_name][2]);

			// Mark it as sorted already!
			static::$listeners[$event_name][0] = true;
		}

		return static::$listeners[$event_name][2];
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Removes a single listener from an event.
	 *
	 * If the listener couldn't be found, returns FALSE, else TRUE if
	 * it was removed.
	 *
<<<<<<< HEAD
	 * @param string   $eventName
	 * @param callable $listener
	 *
	 * @return boolean
	 */
	public static function removeListener($eventName, callable $listener): bool
	{
		if (! isset(static::$listeners[$eventName]))
=======
	 * @param $event_name
	 * @param callable   $listener
	 *
	 * @return boolean
	 */
	public static function removeListener($event_name, callable $listener): bool
	{
		if (! isset(static::$listeners[$event_name]))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return false;
		}

<<<<<<< HEAD
		foreach (static::$listeners[$eventName][2] as $index => $check)
		{
			if ($check === $listener)
			{
				unset(static::$listeners[$eventName][1][$index]);
				unset(static::$listeners[$eventName][2][$index]);
=======
		foreach (static::$listeners[$event_name][2] as $index => $check)
		{
			if ($check === $listener)
			{
				unset(static::$listeners[$event_name][1][$index]);
				unset(static::$listeners[$event_name][2][$index]);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

				return true;
			}
		}

		return false;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Removes all listeners.
	 *
	 * If the event_name is specified, only listeners for that event will be
	 * removed, otherwise all listeners for all events are removed.
	 *
<<<<<<< HEAD
	 * @param string|null $eventName
	 *
	 * @return void
	 */
	public static function removeAllListeners($eventName = null)
	{
		if (! is_null($eventName))
		{
			unset(static::$listeners[$eventName]);
=======
	 * @param null $event_name
	 */
	public static function removeAllListeners($event_name = null)
	{
		if (! is_null($event_name))
		{
			unset(static::$listeners[$event_name]);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
		else
		{
			static::$listeners = [];
		}
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Sets the path to the file that routes are read from.
	 *
	 * @param array $files
<<<<<<< HEAD
	 *
	 * @return void
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function setFiles(array $files)
	{
		static::$files = $files;
	}

<<<<<<< HEAD
	/**
	 * Returns the files that were found/loaded during this request.
	 *
	 * @return string[]
=======
	//--------------------------------------------------------------------

	/**
	 * Returns the files that were found/loaded during this request.
	 *
	 * @return mixed
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function getFiles()
	{
		return static::$files;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Turns simulation on or off. When on, events will not be triggered,
	 * simply logged. Useful during testing when you don't actually want
	 * the tests to run.
	 *
	 * @param boolean $choice
<<<<<<< HEAD
	 *
	 * @return void
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function simulate(bool $choice = true)
	{
		static::$simulate = $choice;
	}

<<<<<<< HEAD
	/**
	 * Getter for the performance log records.
	 *
	 * @return array<array<string, float|string>>
=======
	//--------------------------------------------------------------------

	/**
	 * Getter for the performance log records.
	 *
	 * @return array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function getPerformanceLogs()
	{
		return static::$performanceLog;
	}
<<<<<<< HEAD
=======

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
