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
 * Runs all of the migrations in reverse order, until they have
 * all been unapplied.
 */
class MigrateRollback extends BaseCommand
{
=======

/**
 * Runs all of the migrations in reverse order, until they have
 * all been un-applied.
 *
 * @package CodeIgniter\Commands
 */
class MigrateRollback extends BaseCommand
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
	protected $name = 'migrate:rollback';

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description = 'Runs the "down" method for all migrations in the last batch.';

	/**
	 * the Command's usage
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $usage = 'migrate:rollback [options]';
=======
	protected $usage = 'migrate:rollback [Options]';

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
	 * @var array
	 */
	protected $options = [
		'-b' => 'Specify a batch to roll back to; e.g. "3" to return to batch #3 or "-2" to roll back twice',
		'-g' => 'Set database group',
		'-f' => 'Force command - this option allows you to bypass the confirmation question when running this command in a production environment',
	];

	/**
	 * Runs all of the migrations in reverse order, until they have
<<<<<<< HEAD
	 * all been unapplied.
	 *
	 * @param array $params
	 *
	 * @return void
	 */
	public function run(array $params)
	{
		if (ENVIRONMENT === 'production')
		{
			// @codeCoverageIgnoreStart
			$force = array_key_exists('f', $params) || CLI::getOption('f');

			if (! $force && CLI::prompt(lang('Migrations.rollBackConfirm'), ['y', 'n']) === 'n')
			{
				return;
			}
			// @codeCoverageIgnoreEnd
		}

		$runner = Services::migrations();
		$group  = $params['g'] ?? CLI::getOption('g');

		if (is_string($group))
=======
	 * all been un-applied.
	 *
	 * @param array $params
	 */
	public function run(array $params = [])
	{
		if (ENVIRONMENT === 'production')
		{
			$force = $params['-f'] ?? CLI::getOption('f');
			if (is_null($force) && CLI::prompt(lang('Migrations.rollBackConfirm'), ['y', 'n']) === 'n')
			{
				return;
			}
		}

		$runner = Services::migrations();

		$group = $params['-g'] ?? CLI::getOption('g');

		if (! is_null($group))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$runner->setGroup($group);
		}

		try
		{
<<<<<<< HEAD
			$batch = $params['b'] ?? CLI::getOption('b') ?? $runner->getLastBatch() - 1;
=======
			$batch = $params['-b'] ?? CLI::getOption('b') ?? $runner->getLastBatch() - 1;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			CLI::write(lang('Migrations.rollingBack') . ' ' . $batch, 'yellow');

			if (! $runner->regress($batch))
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
			CLI::write('Done rolling back migrations.', 'green');
		}
		// @codeCoverageIgnoreStart
		catch (Throwable $e)
		{
			$this->showError($e);
		}
		// @codeCoverageIgnoreEnd
=======
			CLI::write('Done');
		}
		catch (\Exception $e)
		{
			$this->showError($e);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}
