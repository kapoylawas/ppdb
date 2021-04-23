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
use CodeIgniter\Database\Seeder;
<<<<<<< HEAD
use Config\Database;
use Throwable;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Runs the specified Seeder file to populate the database
 * with some data.
<<<<<<< HEAD
 */
class Seed extends BaseCommand
{
=======
 *
 * @package CodeIgniter\Commands
 */
class Seed extends BaseCommand
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
	protected $name = 'db:seed';

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description = 'Runs the specified seeder to populate known data into the database.';

	/**
	 * the Command's usage
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $usage = 'db:seed <seeder_name>';
=======
	protected $usage = 'db:seed [seeder_name]';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * the Command's Arguments
	 *
<<<<<<< HEAD
	 * @var array<string, string>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $arguments = [
		'seeder_name' => 'The seeder name to run',
	];

	/**
<<<<<<< HEAD
	 * Passes to Seeder to populate the database.
	 *
	 * @param array $params
	 *
	 * @return void
	 */
	public function run(array $params)
	{
		$seeder   = new Seeder(new Database());
=======
	 * the Command's Options
	 *
	 * @var array
	 */
	protected $options = [];

	/**
	 * Passes to Seeder to populate the database.
	 *
	 * @param array $params
	 */
	public function run(array $params = [])
	{
		$seeder = new Seeder(new \Config\Database());

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$seedName = array_shift($params);

		if (empty($seedName))
		{
<<<<<<< HEAD
			$seedName = CLI::prompt(lang('Migrations.migSeeder'), null, 'required'); // @codeCoverageIgnore
=======
			$seedName = CLI::prompt(lang('Migrations.migSeeder'), 'DatabaseSeeder');
		}

		if (empty($seedName))
		{
			CLI::error(lang('Migrations.migMissingSeeder'));
			return;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		try
		{
			$seeder->call($seedName);
		}
<<<<<<< HEAD
		catch (Throwable $e)
=======
		catch (\Exception $e)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$this->showError($e);
		}
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
