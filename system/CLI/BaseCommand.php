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

use Psr\Log\LoggerInterface;
<<<<<<< HEAD
use ReflectionException;
use Throwable;

/**
 * Class BaseCommand
 */
abstract class BaseCommand
{
=======

/**
 * Class BaseCommand
 *
 * @property $group
 * @property $name
 * @property $description
 *
 * @package CodeIgniter\CLI
 */
abstract class BaseCommand
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The group the command is lumped under
	 * when listing commands.
	 *
	 * @var string
	 */
	protected $group;

	/**
	 * The Command's name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * the Command's usage description
	 *
	 * @var string
	 */
	protected $usage;

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * the Command's options description
	 *
	 * @var array
	 */
	protected $options = [];

	/**
	 * the Command's Arguments description
	 *
	 * @var array
	 */
	protected $arguments = [];

	/**
	 * The Logger to use for a command
	 *
<<<<<<< HEAD
	 * @var LoggerInterface
=======
	 * @var \Psr\Log\LoggerInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $logger;

	/**
<<<<<<< HEAD
	 * Instance of Commands so
	 * commands can call other commands.
	 *
	 * @var Commands
=======
	 * Instance of the CommandRunner controller
	 * so commands can call other commands.
	 *
	 * @var \CodeIgniter\CLI\Commands
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $commands;

	//--------------------------------------------------------------------

	/**
	 * BaseCommand constructor.
	 *
<<<<<<< HEAD
	 * @param LoggerInterface $logger
	 * @param Commands        $commands
=======
	 * @param \Psr\Log\LoggerInterface  $logger
	 * @param \CodeIgniter\CLI\Commands $commands
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __construct(LoggerInterface $logger, Commands $commands)
	{
		$this->logger   = $logger;
		$this->commands = $commands;
	}

	//--------------------------------------------------------------------

	/**
	 * Actually execute a command.
	 * This has to be over-ridden in any concrete implementation.
	 *
	 * @param array $params
	 */
	abstract public function run(array $params);

	//--------------------------------------------------------------------

	/**
	 * Can be used by a command to run other commands.
	 *
	 * @param string $command
	 * @param array  $params
	 *
	 * @return mixed
<<<<<<< HEAD
	 * @throws ReflectionException
	 */
	protected function call(string $command, array $params = [])
	{
=======
	 * @throws \ReflectionException
	 */
	protected function call(string $command, array $params = [])
	{
		// The CommandRunner will grab the first element
		// for the command name.
		array_unshift($params, $command);

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return $this->commands->run($command, $params);
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * A simple method to display an error with line/file, in child commands.
	 *
	 * @param Throwable $e
	 */
	protected function showError(Throwable $e)
	{
		$exception = $e;
		$message   = $e->getMessage();

		require APPPATH . 'Views/errors/cli/error_exception.php';
=======
	 * A simple method to display an error with line/file,
	 * in child commands.
	 *
	 * @param \Exception $e
	 */
	protected function showError(\Exception $e)
	{
		CLI::newLine();
		CLI::error($e->getMessage());
		CLI::write($e->getFile() . ' - ' . $e->getLine());
		CLI::newLine();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Show Help includes (Usage, Arguments, Description, Options).
	 */
	public function showHelp()
	{
		CLI::write(lang('CLI.helpUsage'), 'yellow');

		if (! empty($this->usage))
		{
			$usage = $this->usage;
		}
		else
		{
			$usage = $this->name;

			if (! empty($this->arguments))
			{
				$usage .= ' [arguments]';
			}
		}

		CLI::write($this->setPad($usage, 0, 0, 2));

		if (! empty($this->description))
		{
			CLI::newLine();
			CLI::write(lang('CLI.helpDescription'), 'yellow');
			CLI::write($this->setPad($this->description, 0, 0, 2));
		}

		if (! empty($this->arguments))
		{
			CLI::newLine();
			CLI::write(lang('CLI.helpArguments'), 'yellow');
			$length = max(array_map('strlen', array_keys($this->arguments)));

			foreach ($this->arguments as $argument => $description)
			{
				CLI::write(CLI::color($this->setPad($argument, $length, 2, 2), 'green') . $description);
			}
=======
	 * Makes it simple to access our protected properties.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get(string $key)
	{
		if (isset($this->$key))
		{
			return $this->$key;
		}

		return null;
	}

	//--------------------------------------------------------------------

	/**
	 * Makes it simple to check our protected properties.
	 *
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function __isset(string $key): bool
	{
		return isset($this->$key);
	}

	//--------------------------------------------------------------------

	/**
	 * show Help include (usage,arguments,description,options)
	 */
	public function showHelp()
	{
		// 4 spaces instead of tab
		$tab = '   ';
		CLI::write(lang('CLI.helpDescription'), 'yellow');
		CLI::write($tab . $this->description);
		CLI::newLine();

		CLI::write(lang('CLI.helpUsage'), 'yellow');
		$usage = empty($this->usage) ? $this->name . ' [arguments]' : $this->usage;
		CLI::write($tab . $usage);
		CLI::newLine();

		$pad = max($this->getPad($this->options, 6), $this->getPad($this->arguments, 6));

		if (! empty($this->arguments))
		{
			CLI::write(lang('CLI.helpArguments'), 'yellow');
			foreach ($this->arguments as $argument => $description)
			{
				CLI::write($tab . CLI::color(str_pad($argument, $pad), 'green') . $description, 'yellow');
			}
			CLI::newLine();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		if (! empty($this->options))
		{
<<<<<<< HEAD
			CLI::newLine();
			CLI::write(lang('CLI.helpOptions'), 'yellow');
			$length = max(array_map('strlen', array_keys($this->options)));

			foreach ($this->options as $option => $description)
			{
				CLI::write(CLI::color($this->setPad($option, $length, 2, 2), 'green') . $description);
			}
=======
			CLI::write(lang('CLI.helpOptions'), 'yellow');
			foreach ($this->options as $option => $description)
			{
				CLI::write($tab . CLI::color(str_pad($option, $pad), 'green') . $description, 'yellow');
			}
			CLI::newLine();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Pads our string out so that all titles are the same length to nicely line up descriptions.
	 *
	 * @param string  $item
	 * @param integer $max
	 * @param integer $extra  How many extra spaces to add at the end
	 * @param integer $indent
	 *
	 * @return string
	 */
	public function setPad(string $item, int $max, int $extra = 2, int $indent = 0): string
	{
		$max += $extra + $indent;

		return str_pad(str_repeat(' ', $indent) . $item, $max);
	}

	//--------------------------------------------------------------------

	/**
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Get pad for $key => $value array output
	 *
	 * @param array   $array
	 * @param integer $pad
	 *
	 * @return integer
<<<<<<< HEAD
	 *
	 * @deprecated Use setPad() instead.
	 *
	 * @codeCoverageIgnore
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function getPad(array $array, int $pad): int
	{
		$max = 0;
		foreach ($array as $key => $value)
		{
			$max = max($max, strlen($key));
		}
		return $max + $pad;
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD

	/**
	 * Makes it simple to access our protected properties.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get(string $key)
	{
		if (isset($this->$key))
		{
			return $this->$key;
		}

		return null;
	}

	//--------------------------------------------------------------------

	/**
	 * Makes it simple to check our protected properties.
	 *
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function __isset(string $key): bool
	{
		return isset($this->$key);
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
