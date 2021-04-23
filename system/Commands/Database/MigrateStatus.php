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

/**
 * Displays a list of all migrations and whether they've been run or not.
<<<<<<< HEAD
 */
class MigrateStatus extends BaseCommand
{
=======
 *
 * @package CodeIgniter\Commands
 */
class MigrateStatus extends BaseCommand
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
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
	protected $name = 'migrate:status';

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description = 'Displays a list of all migrations and whether they\'ve been run or not.';

	/**
	 * the Command's usage
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $usage = 'migrate:status [options]';
=======
	protected $usage = 'migrate:status [Options]';

	/**
	 * the Command's Arguments
	 *
	 * @var array
	 */
	protected $arguments = [];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * the Command's Options
	 *
<<<<<<< HEAD
	 * @var array<string, string>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $options = [
		'-g' => 'Set database group',
	];

	/**
	 * Namespaces to ignore when looking for migrations.
	 *
<<<<<<< HEAD
	 * @var string[]
=======
	 * @var type
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $ignoredNamespaces = [
		'CodeIgniter',
		'Config',
<<<<<<< HEAD
=======
		'Tests\Support',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		'Kint',
		'Laminas\ZendFrameworkBridge',
		'Laminas\Escaper',
		'Psr\Log',
	];

	/**
	 * Displays a list of all migrations and whether they've been run or not.
	 *
<<<<<<< HEAD
	 * @param array<string, mixed> $params
	 *
	 * @return void
	 */
	public function run(array $params)
	{
		$runner = Services::migrations();
		$group  = $params['g'] ?? CLI::getOption('g');
=======
	 * @param array $params
	 */
	public function run(array $params = [])
	{
		$runner = Services::migrations();

		$group = $params['-g'] ?? CLI::getOption('g');

		if (! is_null($group))
		{
			$runner->setGroup($group);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Get all namespaces
		$namespaces = Services::autoloader()->getNamespace();

<<<<<<< HEAD
		// Collection of migration status
		$status = [];

		foreach ($namespaces as $namespace => $path)
		{
			if (ENVIRONMENT !== 'testing')
			{
				// Make Tests\\Support discoverable for testing
				$this->ignoredNamespaces[] = 'Tests\Support'; // @codeCoverageIgnore
			}

			if (in_array($namespace, $this->ignoredNamespaces, true))
=======
		// Determines whether any migrations were found
		$found = false;

		// Loop for all $namespaces
		foreach ($namespaces as $namespace => $path)
		{
			if (in_array($namespace, $this->ignoredNamespaces))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				continue;
			}

<<<<<<< HEAD
			if (APP_NAMESPACE !== 'App' && $namespace === 'App')
			{
				continue; // @codeCoverageIgnore
			}

			$migrations = $runner->findNamespaceMigrations($namespace);
=======
			$runner->setNamespace($namespace);
			$migrations = $runner->findMigrations();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			if (empty($migrations))
			{
				continue;
			}

<<<<<<< HEAD
			$history = $runner->getHistory((string) $group);
			ksort($migrations);

			foreach ($migrations as $uid => $migration)
			{
				$migrations[$uid]->name = mb_substr($migration->name, mb_strpos($migration->name, $uid . '_'));

				$date  = '---';
				$group = '---';
				$batch = '---';

				foreach ($history as $row)
				{
					// @codeCoverageIgnoreStart
					if ($runner->getObjectUid($row) !== $migration->uid)
=======
			$found   = true;
			$history = $runner->getHistory();

			CLI::write($namespace);

			ksort($migrations);

			$max = 0;
			foreach ($migrations as $version => $migration)
			{
				$file                       = substr($migration->name, strpos($migration->name, $version . '_'));
				$migrations[$version]->name = $file;

				$max = max($max, strlen($file));
			}

			CLI::write('  ' . str_pad(lang('Migrations.filename'), $max + 4) . lang('Migrations.on'), 'yellow');

			foreach ($migrations as $uid => $migration)
			{
				$date = '';
				foreach ($history as $row)
				{
					if ($runner->getObjectUid($row) !== $uid)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					{
						continue;
					}

<<<<<<< HEAD
					$date  = date('Y-m-d H:i:s', $row->time);
					$group = $row->group;
					$batch = $row->batch;
					// @codeCoverageIgnoreEnd
				}

				$status[] = [
					$namespace,
					$migration->version,
					$migration->name,
					$group,
					$date,
					$batch,
				];
			}
		}

		if (! $status)
		{
			// @codeCoverageIgnoreStart
			CLI::error(lang('Migrations.noneFound'), 'light_gray', 'red');
			CLI::newLine();

			return;
			// @codeCoverageIgnoreEnd
		}

		$headers = [
			CLI::color(lang('Migrations.namespace'), 'yellow'),
			CLI::color(lang('Migrations.version'), 'yellow'),
			CLI::color(lang('Migrations.filename'), 'yellow'),
			CLI::color(lang('Migrations.group'), 'yellow'),
			CLI::color(str_replace(': ', '', lang('Migrations.on')), 'yellow'),
			CLI::color(lang('Migrations.batch'), 'yellow'),
		];

		CLI::table($status, $headers);
	}
=======
					$date = date('Y-m-d H:i:s', $row->time);
				}
				CLI::write(str_pad('  ' . $migration->name, $max + 6) . ($date ? $date : '---'));
			}
		}

		if (! $found)
		{
			CLI::error(lang('Migrations.noneFound'));
		}
	}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
