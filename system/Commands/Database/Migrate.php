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

namespace CodeIgniter\Commands\Database;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;
<<<<<<< HEAD
use Throwable;

/**
 * Runs all new migrations.
=======

/**
 * Runs all new migrations.
 *
 * @package CodeIgniter\Commands
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
class Migrate extends BaseCommand
{
	/**
	 * The group the command is lumped under
	 * when listing commands.
	 *
	 * @var string
	 */
	protected $group = 'Database';

	/**
	 * The Command's name
	 *
	 * @var string
	 */
	protected $name = 'migrate';

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description = 'Locates and runs all new migrations against the database.';

	/**
	 * the Command's usage
	 *
	 * @var string
	 */
	protected $usage = 'migrate [options]';

	/**
<<<<<<< HEAD
=======
	 * the Command's Arguments
	 *
	 * @var array
	 */
	protected $arguments = [];

	/**
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * the Command's Options
	 *
	 * @var array
	 */
	protected $options = [
<<<<<<< HEAD
		'-n'    => 'Set migration namespace',
		'-g'    => 'Set database group',
		'--all' => 'Set for all namespaces, will ignore (-n) option',
=======
		'-n'   => 'Set migration namespace',
		'-g'   => 'Set database group',
		'-all' => 'Set for all namespaces, will ignore (-n) option',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	];

	/**
	 * Ensures that all migrations have been run.
	 *
	 * @param array $params
<<<<<<< HEAD
	 *
	 * @return void
	 */
	public function run(array $params)
=======
	 */
	public function run(array $params = [])
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$runner = Services::migrations();
		$runner->clearCliMessages();

		CLI::write(lang('Migrations.latest'), 'yellow');

<<<<<<< HEAD
		$namespace = $params['n'] ?? CLI::getOption('n');
		$group     = $params['g'] ?? CLI::getOption('g');
=======
		$namespace = $params['-n'] ?? CLI::getOption('n');
		$group     = $params['-g'] ?? CLI::getOption('g');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		try
		{
			// Check for 'all' namespaces
<<<<<<< HEAD
			if (array_key_exists('all', $params) || CLI::getOption('all'))
=======
			if ($this->isAllNamespace($params))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$runner->setNamespace(null);
			}
			// Check for a specified namespace
			elseif ($namespace)
			{
				$runner->setNamespace($namespace);
			}

			if (! $runner->latest($group))
			{
<<<<<<< HEAD
				CLI::error(lang('Migrations.generalFault'), 'light_gray', 'red'); // @codeCoverageIgnore
			}

			$messages = $runner->getCliMessages();

=======
				CLI::write(lang('Migrations.generalFault'), 'red');
			}

			$messages = $runner->getCliMessages();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			foreach ($messages as $message)
			{
				CLI::write($message);
			}

<<<<<<< HEAD
			CLI::write('Done migrations.', 'green');
		}
		// @codeCoverageIgnoreStart
		catch (Throwable $e)
		{
			$this->showError($e);
		}
		// @codeCoverageIgnoreEnd
	}
=======
			CLI::write('Done');
		}
		catch (\Exception $e)
		{
			$this->showError($e);
		}
	}

	/**
	 * To migrate all namespaces to the latest migration
	 *
	 * Demo:
	 *  1. command line: php spark migrate:latest -all
	 *  2. command file: $this->call('migrate:latest', ['-g' => 'test','-all']);
	 *
	 * @param  array $params
	 * @return boolean
	 */
	private function isAllNamespace(array $params): bool
	{
		if (array_search('-all', $params) !== false)
		{
			return true;
		}

		return ! is_null(CLI::getOption('all'));
	}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
