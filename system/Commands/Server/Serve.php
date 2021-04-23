<?php
<<<<<<< HEAD

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
/**
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

namespace CodeIgniter\Commands\Server;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * Launch the PHP development server
 *
 * Not testable, as it throws phpunit for a loop :-/
 *
<<<<<<< HEAD
=======
 * @package CodeIgniter\Commands\Server
 *
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 * @codeCoverageIgnore
 */
class Serve extends BaseCommand
{
	/**
	 * Minimum PHP version
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $minPHPVersion = '7.3';
=======
	protected $minPHPVersion = '7.2';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Group
	 *
	 * @var string
	 */
	protected $group = 'CodeIgniter';

	/**
	 * Name
	 *
	 * @var string
	 */
	protected $name = 'serve';

	/**
	 * Description
	 *
	 * @var string
	 */
	protected $description = 'Launches the CodeIgniter PHP-Development Server.';

	/**
	 * Usage
	 *
	 * @var string
	 */
	protected $usage = 'serve';

	/**
	 * Arguments
	 *
	 * @var array
	 */
	protected $arguments = [];

	/**
	 * The current port offset.
	 *
	 * @var integer
	 */
	protected $portOffset = 0;

	/**
	 * The max number of ports to attempt to serve from
	 *
	 * @var integer
	 */
	protected $tries = 10;

	/**
	 * Options
	 *
	 * @var array
	 */
	protected $options = [
<<<<<<< HEAD
		'--php'  => 'The PHP Binary [default: "PHP_BINARY"]',
		'--host' => 'The HTTP Host [default: "localhost"]',
		'--port' => 'The HTTP Host Port [default: "8080"]',
=======
		'-php'  => 'The PHP Binary [default: "PHP_BINARY"]',
		'-host' => 'The HTTP Host [default: "localhost"]',
		'-port' => 'The HTTP Host Port [default: "8080"]',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	];

	/**
	 * Run the server
	 *
	 * @param array $params Parameters
	 *
	 * @return void
	 */
	public function run(array $params)
	{
<<<<<<< HEAD
		// Collect any user-supplied options and apply them.
		$php  = escapeshellarg(CLI::getOption('php') ?? PHP_BINARY);
		$host = CLI::getOption('host') ?? 'localhost';
		$port = (int) (CLI::getOption('port') ?? 8080) + $this->portOffset;
=======
		// Valid PHP Version?
		if (phpversion() < $this->minPHPVersion)
		{
			// @codeCoverageIgnoreStart
			die('Your PHP version must be ' . $this->minPHPVersion .
				' or higher to run CodeIgniter. Current version: ' . phpversion());
			// @codeCoverageIgnoreEnd
		}

		// Collect any user-supplied options and apply them.
		$php  = escapeshellarg(CLI::getOption('php') ?? PHP_BINARY);
		$host = CLI::getOption('host') ?? 'localhost';
		$port = (int) (CLI::getOption('port') ?? '8080') + $this->portOffset;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Get the party started.
		CLI::write('CodeIgniter development server started on http://' . $host . ':' . $port, 'green');
		CLI::write('Press Control-C to stop.');

		// Set the Front Controller path as Document Root.
		$docroot = escapeshellarg(FCPATH);

		// Mimic Apache's mod_rewrite functionality with user settings.
		$rewrite = escapeshellarg(__DIR__ . '/rewrite.php');

		// Call PHP's built-in webserver, making sure to set our
		// base path to the public folder, and to use the rewrite file
		// to ensure our environment is set and it simulates basic mod_rewrite.
		passthru($php . ' -S ' . $host . ':' . $port . ' -t ' . $docroot . ' ' . $rewrite, $status);

		if ($status && $this->portOffset < $this->tries)
		{
<<<<<<< HEAD
			$this->portOffset++;
=======
			$this->portOffset += 1;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			$this->run($params);
		}
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
