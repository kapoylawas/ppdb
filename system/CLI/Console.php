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

use CodeIgniter\CodeIgniter;
<<<<<<< HEAD
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Console
 */
class Console
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Main CodeIgniter instance.
	 *
	 * @var CodeIgniter
	 */
	protected $app;

	//--------------------------------------------------------------------

	/**
	 * Console constructor.
	 *
<<<<<<< HEAD
	 * @param CodeIgniter $app
=======
	 * @param \CodeIgniter\CodeIgniter $app
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function __construct(CodeIgniter $app)
	{
		$this->app = $app;
	}

	//--------------------------------------------------------------------

	/**
	 * Runs the current command discovered on the CLI.
	 *
	 * @param boolean $useSafeOutput
	 *
<<<<<<< HEAD
	 * @return RequestInterface|Response|ResponseInterface|mixed
	 * @throws Exception
=======
	 * @return \CodeIgniter\HTTP\RequestInterface|\CodeIgniter\HTTP\Response|\CodeIgniter\HTTP\ResponseInterface|mixed
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function run(bool $useSafeOutput = false)
	{
		$path = CLI::getURI() ?: 'list';

		// Set the path for the application to route to.
		$this->app->setPath("ci{$path}");

		return $this->app->useSafeOutput($useSafeOutput)->run();
	}

	//--------------------------------------------------------------------

	/**
	 * Displays basic information about the Console.
	 */
	public function showHeader()
	{
<<<<<<< HEAD
		CLI::write(sprintf('CodeIgniter v%s Command Line Tool - Server Time: %s UTC%s', CodeIgniter::CI_VERSION, date('Y-m-d H:i:s'), date('P')), 'green');
		CLI::newLine();
	}
=======
		CLI::newLine(1);

		CLI::write(CLI::color('CodeIgniter CLI Tool', 'green')
				. ' - Version ' . CodeIgniter::CI_VERSION
				. ' - Server-Time: ' . date('Y-m-d H:i:sa'));

		CLI::newLine(1);
	}

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
