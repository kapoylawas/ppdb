<?php

/**
<<<<<<< HEAD
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use CodeIgniter\CodeIgniter;
use CodeIgniter\Config\DotEnv;
use Config\App;
use Config\Autoload;
use Config\Modules;
use Config\Paths;
use Config\Services;

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
 */

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
/*
 * ---------------------------------------------------------------
 * SETUP OUR PATH CONSTANTS
 * ---------------------------------------------------------------
 *
 * The path constants provide convenient access to the folders
 * throughout the application. We have to setup them up here
 * so they are available in the config files that are loaded.
 */

<<<<<<< HEAD
// The path to the application directory.
if (! defined('APPPATH'))
{
	/**
	 * @var Paths $paths
	 */
	define('APPPATH', realpath(rtrim($paths->appDirectory, '\\/ ')) . DIRECTORY_SEPARATOR);
}

// The path to the project root directory. Just above APPPATH.
=======
/**
 * The path to the application directory.
 */
if (! defined('APPPATH'))
{
	define('APPPATH', realpath($paths->appDirectory) . DIRECTORY_SEPARATOR);
}

/**
 * The path to the project root directory. Just above APPPATH.
 */
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
if (! defined('ROOTPATH'))
{
	define('ROOTPATH', realpath(APPPATH . '../') . DIRECTORY_SEPARATOR);
}

<<<<<<< HEAD
// The path to the system directory.
if (! defined('SYSTEMPATH'))
{
	/**
	 * @var Paths $paths
	 */
	define('SYSTEMPATH', realpath(rtrim($paths->systemDirectory, '\\/ ')) . DIRECTORY_SEPARATOR);
}

// The path to the writable directory.
if (! defined('WRITEPATH'))
{
	/**
	 * @var Paths $paths
	 */
	define('WRITEPATH', realpath(rtrim($paths->writableDirectory, '\\/ ')) . DIRECTORY_SEPARATOR);
}

// The path to the tests directory
if (! defined('TESTPATH'))
{
	/**
	 * @var Paths $paths
	 */
	define('TESTPATH', realpath(rtrim($paths->testsDirectory, '\\/ ')) . DIRECTORY_SEPARATOR);
=======
/**
 * The path to the system directory.
 */
if (! defined('SYSTEMPATH'))
{
	define('SYSTEMPATH', realpath($paths->systemDirectory) . DIRECTORY_SEPARATOR);
}

/**
 * The path to the writable directory.
 */
if (! defined('WRITEPATH'))
{
	define('WRITEPATH', realpath($paths->writableDirectory) . DIRECTORY_SEPARATOR);
}

/**
 * The path to the tests directory
 */
if (! defined('TESTPATH'))
{
	define('TESTPATH', realpath($paths->testsDirectory) . DIRECTORY_SEPARATOR);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}

/*
 * ---------------------------------------------------------------
 * GRAB OUR CONSTANTS & COMMON
 * ---------------------------------------------------------------
 */
if (! defined('APP_NAMESPACE'))
{
	require_once APPPATH . 'Config/Constants.php';
}

<<<<<<< HEAD
// Require app/Common.php file if exists.
if (is_file(APPPATH . 'Common.php'))
=======
// Let's see if an app/Common.php file exists
if (file_exists(APPPATH . 'Common.php'))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	require_once APPPATH . 'Common.php';
}

// Require system/Common.php
require_once SYSTEMPATH . 'Common.php';

/*
 * ---------------------------------------------------------------
 * LOAD OUR AUTOLOADER
 * ---------------------------------------------------------------
 *
<<<<<<< HEAD
 * The autoloader allows all of the pieces to work together in the
 * framework. We have to load it here, though, so that the config
 * files can use the path constants.
 */

if (! class_exists('Config\Autoload', false))
=======
 * The autoloader allows all of the pieces to work together
 * in the framework. We have to load it here, though, so
 * that the config files can use the path constants.
 */

if (! class_exists(Config\Autoload::class, false))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	require_once SYSTEMPATH . 'Config/AutoloadConfig.php';
	require_once APPPATH . 'Config/Autoload.php';
	require_once SYSTEMPATH . 'Modules/Modules.php';
	require_once APPPATH . 'Config/Modules.php';
}

require_once SYSTEMPATH . 'Autoloader/Autoloader.php';
require_once SYSTEMPATH . 'Config/BaseService.php';
require_once SYSTEMPATH . 'Config/Services.php';
require_once APPPATH . 'Config/Services.php';

// Use Config\Services as CodeIgniter\Services
if (! class_exists('CodeIgniter\Services', false))
{
	class_alias('Config\Services', 'CodeIgniter\Services');
}

<<<<<<< HEAD
// Initialize and register the loader with the SPL autoloader stack.
Services::autoloader()->initialize(new Autoload(), new Modules())->register();
=======
$loader = CodeIgniter\Services::autoloader();
$loader->initialize(new Config\Autoload(), new Config\Modules());
$loader->register();    // Register the loader with the SPL autoloader stack.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

// Now load Composer's if it's available
if (is_file(COMPOSER_PATH))
{
<<<<<<< HEAD
	/*
=======
	/**
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * The path to the vendor directory.
	 *
	 * We do not want to enforce this, so set the constant if Composer was used.
	 */
	if (! defined('VENDORPATH'))
	{
		define('VENDORPATH', realpath(ROOTPATH . 'vendor') . DIRECTORY_SEPARATOR);
	}

	require_once COMPOSER_PATH;
}

<<<<<<< HEAD
// Load environment settings from .env files into $_SERVER and $_ENV
require_once SYSTEMPATH . 'Config/DotEnv.php';

$env = new DotEnv(ROOTPATH);
$env->load();

// Always load the URL helper, it should be used in most of apps.
=======
// Load environment settings from .env files
// into $_SERVER and $_ENV
require_once SYSTEMPATH . 'Config/DotEnv.php';

$env = new \CodeIgniter\Config\DotEnv(ROOTPATH);
$env->load();

// Always load the URL helper -
// it should be used in 90% of apps.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
helper('url');

/*
 * ---------------------------------------------------------------
 * GRAB OUR CODEIGNITER INSTANCE
 * ---------------------------------------------------------------
 *
 * The CodeIgniter class contains the core functionality to make
 * the application run, and does all of the dirty work to get
 * the pieces all working together.
 */

<<<<<<< HEAD
$app = new CodeIgniter(new App());
=======
$appConfig = config(\Config\App::class);
$app       = new \CodeIgniter\CodeIgniter($appConfig);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
$app->initialize();

return $app;
