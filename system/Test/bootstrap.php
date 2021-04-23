<?php
<<<<<<< HEAD

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Services;
use Config\Autoload;
use Config\Modules;
use Config\Paths;

error_reporting(E_ALL);
=======
ini_set('error_reporting', E_ALL);

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

// Make sure it recognizes that we're testing.
$_SERVER['CI_ENVIRONMENT'] = 'testing';
define('ENVIRONMENT', 'testing');
<<<<<<< HEAD
defined('CI_DEBUG') || define('CI_DEBUG', true);

// Often these constants are pre-defined, but query the current directory structure as a fallback
defined('HOMEPATH') || define('HOMEPATH', realpath(rtrim(getcwd(), '\\/ ')) . DIRECTORY_SEPARATOR);
$source = is_dir(HOMEPATH . 'app')
	? HOMEPATH
	: (is_dir('vendor/codeigniter4/framework/')
		? 'vendor/codeigniter4/framework/'
		: 'vendor/codeigniter4/codeigniter4/');
defined('CONFIGPATH') || define('CONFIGPATH', realpath($source . 'app/Config') . DIRECTORY_SEPARATOR);
defined('PUBLICPATH') || define('PUBLICPATH', realpath($source . 'public') . DIRECTORY_SEPARATOR);
unset($source);

// Load framework paths from their config file
require CONFIGPATH . 'Paths.php';
$paths = new Paths();

// Define necessary framework path constants
defined('APPPATH')       || define('APPPATH', realpath(rtrim($paths->appDirectory, '\\/ ')) . DIRECTORY_SEPARATOR);
defined('WRITEPATH')     || define('WRITEPATH', realpath(rtrim($paths->writableDirectory, '\\/ ')) . DIRECTORY_SEPARATOR);
defined('SYSTEMPATH')    || define('SYSTEMPATH', realpath(rtrim($paths->systemDirectory, '\\/')) . DIRECTORY_SEPARATOR);
=======

// Load framework paths from their config file
require CONFIGPATH . 'Paths.php';
$paths = new Config\Paths();

// Define necessary framework path constants
defined('APPPATH')       || define('APPPATH', realpath($paths->appDirectory) . DIRECTORY_SEPARATOR);
defined('WRITEPATH')     || define('WRITEPATH', realpath($paths->writableDirectory) . DIRECTORY_SEPARATOR);
defined('SYSTEMPATH')    || define('SYSTEMPATH', realpath($paths->systemDirectory) . DIRECTORY_SEPARATOR);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
defined('ROOTPATH')      || define('ROOTPATH', realpath(APPPATH . '../') . DIRECTORY_SEPARATOR);
defined('CIPATH')        || define('CIPATH', realpath(SYSTEMPATH . '../') . DIRECTORY_SEPARATOR);
defined('FCPATH')        || define('FCPATH', realpath(PUBLICPATH) . DIRECTORY_SEPARATOR);
defined('TESTPATH')      || define('TESTPATH', realpath(HOMEPATH . 'tests/') . DIRECTORY_SEPARATOR);
defined('SUPPORTPATH')   || define('SUPPORTPATH', realpath(TESTPATH . '_support/') . DIRECTORY_SEPARATOR);
defined('COMPOSER_PATH') || define('COMPOSER_PATH', realpath(HOMEPATH . 'vendor/autoload.php'));
defined('VENDORPATH')    || define('VENDORPATH', realpath(HOMEPATH . 'vendor') . DIRECTORY_SEPARATOR);

// Load Common.php from App then System
if (file_exists(APPPATH . 'Common.php'))
{
	require_once APPPATH . 'Common.php';
}

require_once SYSTEMPATH . 'Common.php';

// Set environment values that would otherwise stop the framework from functioning during tests.
if (! isset($_SERVER['app.baseURL']))
{
<<<<<<< HEAD
	$_SERVER['app.baseURL'] = 'http://example.com/';
=======
	$_SERVER['app.baseURL'] = 'http://example.com';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}

// Load necessary components
require_once SYSTEMPATH . 'Config/AutoloadConfig.php';
require_once APPPATH . 'Config/Autoload.php';
require_once APPPATH . 'Config/Constants.php';
require_once SYSTEMPATH . 'Modules/Modules.php';
require_once APPPATH . 'Config/Modules.php';

require_once SYSTEMPATH . 'Autoloader/Autoloader.php';
require_once SYSTEMPATH . 'Config/BaseService.php';
require_once SYSTEMPATH . 'Config/Services.php';
require_once APPPATH . 'Config/Services.php';

// Use Config\Services as CodeIgniter\Services
if (! class_exists('CodeIgniter\Services', false))
{
	class_alias('Config\Services', 'CodeIgniter\Services');
}

// Launch the autoloader to gather namespaces (includes composer.json's "autoload-dev")
<<<<<<< HEAD
$loader = Services::autoloader();
$loader->initialize(new Autoload(), new Modules());
$loader->register(); // Register the loader with the SPL autoloader stack.

require_once APPPATH . 'Config/Routes.php';

/**
 * @var RouteCollection $routes
 */
=======
$loader = \CodeIgniter\Services::autoloader();
$loader->initialize(new Config\Autoload(), new Config\Modules());

// Register the loader with the SPL autoloader stack.
$loader->register();

require_once APPPATH . 'Config/Routes.php';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
$routes->getRoutes('*');
