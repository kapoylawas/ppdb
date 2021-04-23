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

namespace CodeIgniter\CLI;

use CodeIgniter\Log\Logger;
use Config\Services;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Class Commands
 *
 * Core functionality for running, listing, etc commands.
<<<<<<< HEAD
=======
 *
 * @package CodeIgniter\CLI
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
class Commands
{
	/**
	 * The found commands.
	 *
	 * @var array
	 */
	protected $commands = [];

	/**
	 * Logger instance.
	 *
	 * @var Logger
	 */
	protected $logger;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param Logger|null $logger
	 */
	public function __construct($logger = null)
	{
		$this->logger = $logger ?? Services::logger();
=======
	 * @param \CodeIgniter\Log\Logger|null $logger
	 */
	public function __construct($logger = null)
	{
		$this->logger = $logger ?? service('logger');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Runs a command given
	 *
	 * @param string $command
	 * @param array  $params
	 */
	public function run(string $command, array $params)
	{
		$this->discoverCommands();

<<<<<<< HEAD
		if (! $this->verifyCommand($command, $this->commands))
		{
=======
		if (! isset($this->commands[$command]))
		{
			CLI::error(lang('CLI.commandNotFound', [$command]));
			CLI::newLine();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			return;
		}

		// The file would have already been loaded during the
		// createCommandList function...
		$className = $this->commands[$command]['class'];
		$class     = new $className($this->logger, $this);

		return $class->run($params);
	}

	/**
	 * Provide access to the list of commands.
	 *
	 * @return array
	 */
	public function getCommands()
	{
		$this->discoverCommands();

		return $this->commands;
	}

	/**
	 * Discovers all commands in the framework and within user code,
	 * and collects instances of them to work with.
	 */
	public function discoverCommands()
	{
		if (! empty($this->commands))
		{
			return;
		}

		$files = service('locator')->listFiles('Commands/');

		// If no matching command files were found, bail
		if (empty($files))
		{
			// This should never happen in unit testing.
			// if it does, we have far bigger problems!
			// @codeCoverageIgnoreStart
			return;
			// @codeCoverageIgnoreEnd
		}

		// Loop over each file checking to see if a command with that
		// alias exists in the class. If so, return it. Otherwise, try the next.
		foreach ($files as $file)
		{
			$className = Services::locator()->findQualifiedNameFromPath($file);
			if (empty($className) || ! class_exists($className))
			{
				continue;
			}

			try
			{
<<<<<<< HEAD
				$class = new ReflectionClass($className);
=======
				$class = new \ReflectionClass($className);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

				if (! $class->isInstantiable() || ! $class->isSubclassOf(BaseCommand::class))
				{
					continue;
				}

				$class = new $className($this->logger, $this);

				// Store it!
<<<<<<< HEAD
				if (! is_null($class->group))
=======
				if ($class->group !== null)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				{
					$this->commands[$class->name] = [
						'class'       => $className,
						'file'        => $file,
						'group'       => $class->group,
						'description' => $class->description,
					];
				}

				$class = null;
				unset($class);
			}
<<<<<<< HEAD
			catch (ReflectionException $e)
=======
			catch (\ReflectionException $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->logger->error($e->getMessage());
			}
		}

		asort($this->commands);
	}
<<<<<<< HEAD

	/**
	 * Verifies if the command being sought is found
	 * in the commands list.
	 *
	 * @param string $command
	 * @param array  $commands
	 *
	 * @return boolean
	 */
	public function verifyCommand(string $command, array $commands): bool
	{
		if (isset($commands[$command]))
		{
			return true;
		}

		$message = lang('CLI.commandNotFound', [$command]);

		if ($alternatives = $this->getCommandAlternatives($command, $commands))
		{
			if (count($alternatives) === 1)
			{
				$message .= "\n\n" . lang('CLI.altCommandSingular') . "\n    ";
			}
			else
			{
				$message .= "\n\n" . lang('CLI.altCommandPlural') . "\n    ";
			}

			$message .= implode("\n    ", $alternatives);
		}

		CLI::error($message);
		CLI::newLine();

		return false;
	}

	/**
	 * Finds alternative of `$name` among collection
	 * of commands.
	 *
	 * @param string $name
	 * @param array  $collection
	 *
	 * @return array
	 */
	protected function getCommandAlternatives(string $name, array $collection): array
	{
		$alternatives = [];

		foreach ($collection as $commandName => $attributes)
		{
			$lev = levenshtein($name, $commandName);

			if ($lev <= strlen($commandName) / 3 || strpos($commandName, $name) !== false)
			{
				$alternatives[$commandName] = $lev;
			}
		}

		ksort($alternatives, SORT_NATURAL | SORT_FLAG_CASE);

		return array_keys($alternatives);
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
