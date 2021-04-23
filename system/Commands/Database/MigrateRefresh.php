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

/**
 * Does a rollback followed by a latest to refresh the current state
 * of the database.
<<<<<<< HEAD
 */
class MigrateRefresh extends BaseCommand
{
=======
 *
 * @package CodeIgniter\Commands
 */
class MigrateRefresh extends BaseCommand
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
	protected $name = 'migrate:refresh';

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description = 'Does a rollback followed by a latest to refresh the current state of the database.';

	/**
	 * the Command's usage
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $usage = 'migrate:refresh [options]';
=======
	protected $usage = 'migrate:refresh [Options]';

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
<<<<<<< HEAD
		'-n'    => 'Set migration namespace',
		'-g'    => 'Set database group',
		'--all' => 'Set latest for all namespace, will ignore (-n) option',
		'-f'    => 'Force command - this option allows you to bypass the confirmation question when running this command in a production environment',
=======
		'-n'   => 'Set migration namespace',
		'-g'   => 'Set database group',
		'-all' => 'Set latest for all namespace, will ignore (-n) option',
		'-f'   => 'Force command - this option allows you to bypass the confirmation question when running this command in a production environment',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	];

	/**
	 * Does a rollback followed by a latest to refresh the current state
	 * of the database.
	 *
	 * @param array $params
<<<<<<< HEAD
	 *
	 * @return void
	 */
	public function run(array $params)
	{
		$params['b'] = 0;

		if (ENVIRONMENT === 'production')
		{
			// @codeCoverageIgnoreStart
			$force = array_key_exists('f', $params) || CLI::getOption('f');

			if (! $force && CLI::prompt(lang('Migrations.refreshConfirm'), ['y', 'n']) === 'n')
=======
	 */
	public function run(array $params = [])
	{
		$params = ['-b' => 0];

		if (ENVIRONMENT === 'production')
		{
			$force = $params['-f'] ?? CLI::getOption('f');
			if (is_null($force) && CLI::prompt(lang('Migrations.refreshConfirm'), ['y', 'n']) === 'n')
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				return;
			}

<<<<<<< HEAD
			$params['f'] = null;
			// @codeCoverageIgnoreEnd
		}

		$this->call('migrate:rollback', $params);
		$this->call('migrate', $params);
	}
=======
			$params['-f'] = '';
		}

		$this->call('migrate:rollback', $params);
		$this->call('migrate');
	}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
