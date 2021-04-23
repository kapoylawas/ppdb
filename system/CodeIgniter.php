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

namespace CodeIgniter;

use Closure;
use CodeIgniter\Debug\Timer;
use CodeIgniter\Events\Events;
<<<<<<< HEAD
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\DownloadResponse;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\RequestInterface;
=======
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\DownloadResponse;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use CodeIgniter\Router\Exceptions\RedirectException;
use CodeIgniter\Router\RouteCollectionInterface;
<<<<<<< HEAD
use CodeIgniter\Router\Router;
use Config\App;
use Config\Cache;
use Config\Services;
use Exception;
use Kint;
use Kint\Renderer\CliRenderer;
use Kint\Renderer\RichRenderer;
=======
use Config\Cache;
use Config\Services;
use Exception;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * This class is the core of the framework, and will analyse the
 * request, route it to a controller, and send back the response.
 * Of course, there are variations to that flow, but this is the brains.
 */
class CodeIgniter
{
<<<<<<< HEAD
	/**
	 * The current version of CodeIgniter Framework
	 */
	const CI_VERSION = '4.1.1';
=======

	/**
	 * The current version of CodeIgniter Framework
	 */
	const CI_VERSION = '4.0.4';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * App startup time.
	 *
	 * @var mixed
	 */
	protected $startTime;

	/**
	 * Total app execution time
	 *
	 * @var float
	 */
	protected $totalTime;

	/**
	 * Main application configuration
	 *
<<<<<<< HEAD
	 * @var App
=======
	 * @var \Config\App
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $config;

	/**
	 * Timer instance.
	 *
	 * @var Timer
	 */
	protected $benchmark;

	/**
	 * Current request.
	 *
<<<<<<< HEAD
	 * @var Request|IncomingRequest|CLIRequest
=======
	 * @var HTTP\Request|HTTP\IncomingRequest|CLIRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $request;

	/**
	 * Current response.
	 *
<<<<<<< HEAD
	 * @var ResponseInterface
=======
	 * @var HTTP\ResponseInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $response;

	/**
	 * Router to use.
	 *
<<<<<<< HEAD
	 * @var Router
=======
	 * @var Router\Router
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $router;

	/**
	 * Controller to use.
	 *
<<<<<<< HEAD
	 * @var string|Closure
=======
	 * @var string|\Closure
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $controller;

	/**
	 * Controller method to invoke.
	 *
	 * @var string
	 */
	protected $method;

	/**
	 * Output handler to use.
	 *
	 * @var string
	 */
	protected $output;

	/**
	 * Cache expiration time
	 *
	 * @var integer
	 */
	protected static $cacheTTL = 0;

	/**
	 * Request path to use.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Should the Response instance "pretend"
	 * to keep from setting headers/cookies/etc
	 *
	 * @var boolean
	 */
	protected $useSafeOutput = false;

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param App $config
	 */
	public function __construct(App $config)
=======
	 * @param type $config
	 */
	public function __construct($config)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$this->startTime = microtime(true);
		$this->config    = $config;
	}

	//--------------------------------------------------------------------

	/**
	 * Handles some basic app and environment setup.
	 */
	public function initialize()
	{
<<<<<<< HEAD
=======
		// Set default locale on the server
		// locale_set_default($this->config->defaultLocale ?? 'en');
		if( function_exists('locale_set_default' ) ) :

			locale_set_default($this->config->defaultLocale ?? 'en');
			
			endif;

		// Set default timezone on the server
		date_default_timezone_set($this->config->appTimezone ?? 'UTC');

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		// Define environment variables
		$this->detectEnvironment();
		$this->bootstrapEnvironment();

		// Setup Exception Handling
<<<<<<< HEAD
		Services::exceptions()->initialize();

		// Run this check for manual installations
		if (! is_file(COMPOSER_PATH))
		{
			// @codeCoverageIgnoreStart
			$this->resolvePlatformExtensions();
			// @codeCoverageIgnoreEnd
		}

		// Set default locale on the server
		locale_set_default($this->config->defaultLocale ?? 'en');

		// Set default timezone on the server
		date_default_timezone_set($this->config->appTimezone ?? 'UTC');
=======
		Services::exceptions()
				->initialize();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		$this->initializeKint();

		if (! CI_DEBUG)
		{
			// @codeCoverageIgnoreStart
<<<<<<< HEAD
			Kint::$enabled_mode = false;
=======
			\Kint::$enabled_mode = false;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			// @codeCoverageIgnoreEnd
		}
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Checks system for missing required PHP extensions.
	 *
	 * @return void
	 * @throws FrameworkException
	 *
	 * @codeCoverageIgnore
	 */
	protected function resolvePlatformExtensions()
	{
		$requiredExtensions = [
			'curl',
			'intl',
			'json',
			'mbstring',
			'xml',
		];

		$missingExtensions = [];

		foreach ($requiredExtensions as $extension)
		{
			if (! extension_loaded($extension))
			{
				$missingExtensions[] = $extension;
			}
		}

		if ($missingExtensions)
		{
			throw FrameworkException::forMissingExtension(implode(', ', $missingExtensions));
		}
	}

	//--------------------------------------------------------------------

	/**
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Initializes Kint
	 */
	protected function initializeKint()
	{
		// If we have KINT_DIR it means it's already loaded via composer
		if (! defined('KINT_DIR'))
		{
			spl_autoload_register(function ($class) {
				$class = explode('\\', $class);

				if ('Kint' !== array_shift($class))
				{
					return;
				}

				$file = SYSTEMPATH . 'ThirdParty/Kint/' . implode('/', $class) . '.php';

				file_exists($file) && require_once $file;
			});

			require_once SYSTEMPATH . 'ThirdParty/Kint/init.php';
		}

		/**
		 * Config\Kint
		 */
		$config = config('Config\Kint');

<<<<<<< HEAD
		Kint::$max_depth           = $config->maxDepth;
		Kint::$display_called_from = $config->displayCalledFrom;
		Kint::$expanded            = $config->expanded;

		if (! empty($config->plugins) && is_array($config->plugins))
		{
			Kint::$plugins = $config->plugins;
		}

		RichRenderer::$theme  = $config->richTheme;
		RichRenderer::$folder = $config->richFolder;
		RichRenderer::$sort   = $config->richSort;
		if (! empty($config->richObjectPlugins) && is_array($config->richObjectPlugins))
		{
			RichRenderer::$object_plugins = $config->richObjectPlugins;
		}
		if (! empty($config->richTabPlugins) && is_array($config->richTabPlugins))
		{
			RichRenderer::$tab_plugins = $config->richTabPlugins;
		}

		CliRenderer::$cli_colors         = $config->cliColors;
		CliRenderer::$force_utf8         = $config->cliForceUTF8;
		CliRenderer::$detect_width       = $config->cliDetectWidth;
		CliRenderer::$min_terminal_width = $config->cliMinWidth;
=======
		\Kint::$max_depth           = $config->maxDepth;
		\Kint::$display_called_from = $config->displayCalledFrom;
		\Kint::$expanded            = $config->expanded;

		if (! empty($config->plugins) && is_array($config->plugins))
		{
			\Kint::$plugins = $config->plugins;
		}

		\Kint\Renderer\RichRenderer::$theme  = $config->richTheme;
		\Kint\Renderer\RichRenderer::$folder = $config->richFolder;
		\Kint\Renderer\RichRenderer::$sort   = $config->richSort;
		if (! empty($config->richObjectPlugins) && is_array($config->richObjectPlugins))
		{
			\Kint\Renderer\RichRenderer::$object_plugins = $config->richObjectPlugins;
		}
		if (! empty($config->richTabPlugins) && is_array($config->richTabPlugins))
		{
			\Kint\Renderer\RichRenderer::$tab_plugins = $config->richTabPlugins;
		}

		\Kint\Renderer\CliRenderer::$cli_colors         = $config->cliColors;
		\Kint\Renderer\CliRenderer::$force_utf8         = $config->cliForceUTF8;
		\Kint\Renderer\CliRenderer::$detect_width       = $config->cliDetectWidth;
		\Kint\Renderer\CliRenderer::$min_terminal_width = $config->cliMinWidth;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Launch the application!
	 *
	 * This is "the loop" if you will. The main entry point into the script
	 * that gets the required class instances, fires off the filters,
	 * tries to route the response, loads the controller and generally
	 * makes all of the pieces work together.
	 *
<<<<<<< HEAD
	 * @param RouteCollectionInterface|null $routes
	 * @param boolean                       $returnResponse
	 *
	 * @return boolean|RequestInterface|ResponseInterface|mixed
	 * @throws RedirectException
	 * @throws Exception
=======
	 * @param \CodeIgniter\Router\RouteCollectionInterface $routes
	 * @param boolean                                      $returnResponse
	 *
	 * @return boolean|\CodeIgniter\HTTP\RequestInterface|\CodeIgniter\HTTP\Response|\CodeIgniter\HTTP\ResponseInterface|mixed
	 * @throws \CodeIgniter\Router\Exceptions\RedirectException
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function run(RouteCollectionInterface $routes = null, bool $returnResponse = false)
	{
		$this->startBenchmark();

		$this->getRequestObject();
		$this->getResponseObject();

		$this->forceSecureAccess();

		$this->spoofRequestMethod();

		Events::trigger('pre_system');

		// Check for a cached page. Execution will stop
		// if the page has been cached.
		$cacheConfig = new Cache();
		$response    = $this->displayCache($cacheConfig);
		if ($response instanceof ResponseInterface)
		{
			if ($returnResponse)
			{
				return $response;
			}

			$this->response->pretend($this->useSafeOutput)->send();
			$this->callExit(EXIT_SUCCESS);
		}

		try
		{
			return $this->handleRequest($routes, $cacheConfig, $returnResponse);
		}
		catch (RedirectException $e)
		{
			$logger = Services::logger();
			$logger->info('REDIRECTED ROUTE at ' . $e->getMessage());

			// If the route is a 'redirect' route, it throws
			// the exception with the $to as the message
			$this->response->redirect(base_url($e->getMessage()), 'auto', $e->getCode());
			$this->sendResponse();

			$this->callExit(EXIT_SUCCESS);
		}
		catch (PageNotFoundException $e)
		{
			$this->display404errors($e);
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Set our Response instance to "pretend" mode so that things like
	 * cookies and headers are not actually sent, allowing PHP 7.2+ to
	 * not complain when ini_set() function is used.
	 *
	 * @param boolean $safe
	 *
	 * @return $this
	 */
	public function useSafeOutput(bool $safe = true)
	{
		$this->useSafeOutput = $safe;

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Handles the main request logic and fires the controller.
	 *
<<<<<<< HEAD
	 * @param RouteCollectionInterface|null $routes
	 * @param Cache                         $cacheConfig
	 * @param boolean                       $returnResponse
	 *
	 * @return RequestInterface|ResponseInterface|mixed
	 * @throws RedirectException
	 */
	protected function handleRequest(?RouteCollectionInterface $routes, Cache $cacheConfig, bool $returnResponse = false)
=======
	 * @param \CodeIgniter\Router\RouteCollectionInterface $routes
	 * @param $cacheConfig
	 * @param boolean                                      $returnResponse
	 *
	 * @return \CodeIgniter\HTTP\RequestInterface|\CodeIgniter\HTTP\Response|\CodeIgniter\HTTP\ResponseInterface|mixed
	 * @throws \CodeIgniter\Router\Exceptions\RedirectException
	 */
	protected function handleRequest(RouteCollectionInterface $routes = null, $cacheConfig, bool $returnResponse = false)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$routeFilter = $this->tryToRouteIt($routes);

		// Run "before" filters
		$filters = Services::filters();

		// If any filters were specified within the routes file,
		// we need to ensure it's active for the current request
		if (! is_null($routeFilter))
		{
			$filters->enableFilter($routeFilter, 'before');
			$filters->enableFilter($routeFilter, 'after');
		}

<<<<<<< HEAD
		$uri = $this->request instanceof CLIRequest ? $this->request->getPath() : $this->request->getUri()->getPath();
=======
		$uri = $this->request instanceof CLIRequest ? $this->request->getPath() : $this->request->uri->getPath();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Never run filters when running through Spark cli
		if (! defined('SPARKED'))
		{
<<<<<<< HEAD
			$possibleResponse = $filters->run($uri, 'before');

			// If a ResponseInterface instance is returned then send it back to the client and stop
			if ($possibleResponse instanceof ResponseInterface)
			{
				return $returnResponse ? $possibleResponse : $possibleResponse->pretend($this->useSafeOutput)->send();
			}

			if ($possibleResponse instanceof Request)
			{
				$this->request = $possibleResponse;
=======
			$possibleRedirect = $filters->run($uri, 'before');
			if ($possibleRedirect instanceof RedirectResponse)
			{
				return $possibleRedirect->send();
			}
			// If a Response instance is returned, the Response will be sent back to the client and script execution will stop
			if ($possibleRedirect instanceof ResponseInterface)
			{
				return $possibleRedirect->send();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			}
		}

		$returned = $this->startController();

		// Closure controller has run in startController().
		if (! is_callable($this->controller))
		{
			$controller = $this->createController();

<<<<<<< HEAD
			if (! method_exists($controller, '_remap') && ! is_callable([$controller, $this->method], false))
			{
				throw PageNotFoundException::forMethodNotFound($this->method);
			}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			// Is there a "post_controller_constructor" event?
			Events::trigger('post_controller_constructor');

			$returned = $this->runController($controller);
		}
		else
		{
			$this->benchmark->stop('controller_constructor');
			$this->benchmark->stop('controller');
		}

		// If $returned is a string, then the controller output something,
		// probably a view, instead of echoing it directly. Send it along
		// so it can be used with the output.
		$this->gatherOutput($cacheConfig, $returned);

		// Never run filters when running through Spark cli
		if (! defined('SPARKED'))
		{
			$filters->setResponse($this->response);
			// Run "after" filters
			$response = $filters->run($uri, 'after');
		}
		else
		{
			$response = $this->response;

			// Set response code for CLI command failures
			if (is_numeric($returned) || $returned === false)
			{
				$response->setStatusCode(400);
			}
		}

<<<<<<< HEAD
		if ($response instanceof ResponseInterface)
=======
		if ($response instanceof Response)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$this->response = $response;
		}

		// Save our current URI as the previous URI in the session
		// for safer, more accurate use with `previous_url()` helper function.
<<<<<<< HEAD
		$this->storePreviousURL((string) current_url(true));
=======
		$this->storePreviousURL((string)current_url(true));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		unset($uri);

		if (! $returnResponse)
		{
			$this->sendResponse();
		}

		//--------------------------------------------------------------------
		// Is there a post-system event?
		//--------------------------------------------------------------------
		Events::trigger('post_system');

		return $this->response;
	}

	//--------------------------------------------------------------------

	/**
	 * You can load different configurations depending on your
	 * current environment. Setting the environment also influences
	 * things like logging and error reporting.
	 *
	 * This can be set to anything, but default usage is:
	 *
	 *     development
	 *     testing
	 *     production
	 */
	protected function detectEnvironment()
	{
		// Make sure ENVIRONMENT isn't already set by other means.
		if (! defined('ENVIRONMENT'))
		{
			// running under Continuous Integration server?
			if (getenv('CI') !== false)
			{
				define('ENVIRONMENT', 'testing');
			}
			else
			{
				define('ENVIRONMENT', $_SERVER['CI_ENVIRONMENT'] ?? 'production');
			}
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Load any custom boot files based upon the current environment.
	 *
	 * If no boot file exists, we shouldn't continue because something
	 * is wrong. At the very least, they should have error reporting setup.
	 */
	protected function bootstrapEnvironment()
	{
		if (is_file(APPPATH . 'Config/Boot/' . ENVIRONMENT . '.php'))
		{
			require_once APPPATH . 'Config/Boot/' . ENVIRONMENT . '.php';
		}
		else
		{
			// @codeCoverageIgnoreStart
			header('HTTP/1.1 503 Service Unavailable.', true, 503);
			echo 'The application environment is not set correctly.';
<<<<<<< HEAD
			exit(EXIT_ERROR); // EXIT_ERROR
=======
			exit(1); // EXIT_ERROR
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			// @codeCoverageIgnoreEnd
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Start the Benchmark
	 *
	 * The timer is used to display total script execution both in the
	 * debug toolbar, and potentially on the displayed page.
	 */
	protected function startBenchmark()
	{
		$this->startTime = microtime(true);

		$this->benchmark = Services::timer();
		$this->benchmark->start('total_execution', $this->startTime);
		$this->benchmark->start('bootstrap');
	}

	//--------------------------------------------------------------------

	/**
	 * Sets a Request object to be used for this request.
	 * Used when running certain tests.
	 *
<<<<<<< HEAD
	 * @param Request $request
	 *
	 * @return $this
=======
	 * @param \CodeIgniter\HTTP\Request $request
	 *
	 * @return \CodeIgniter\CodeIgniter
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function setRequest(Request $request)
	{
		$this->request = $request;

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Get our Request object, (either IncomingRequest or CLIRequest)
	 * and set the server protocol based on the information provided
	 * by the server.
	 */
	protected function getRequestObject()
	{
		if ($this->request instanceof Request)
		{
			return;
		}

<<<<<<< HEAD
		// @phpstan-ignore-next-line
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		if (is_cli() && ENVIRONMENT !== 'testing')
		{
			// @codeCoverageIgnoreStart
			$this->request = Services::clirequest($this->config);
			// @codeCoverageIgnoreEnd
		}
		else
		{
			$this->request = Services::request($this->config);
			// guess at protocol if needed
			$this->request->setProtocolVersion($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.1');
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Get our Response object, and set some default values, including
	 * the HTTP protocol version and a default successful response.
	 */
	protected function getResponseObject()
	{
		$this->response = Services::response($this->config);

		if (! is_cli() || ENVIRONMENT === 'testing')
		{
			$this->response->setProtocolVersion($this->request->getProtocolVersion());
		}

		// Assume success until proven otherwise.
		$this->response->setStatusCode(200);
	}

	//--------------------------------------------------------------------

	/**
	 * Force Secure Site Access? If the config value 'forceGlobalSecureRequests'
	 * is true, will enforce that all requests to this site are made through
	 * HTTPS. Will redirect the user to the current page with HTTPS, as well
	 * as set the HTTP Strict Transport Security header for those browsers
	 * that support it.
	 *
	 * @param integer $duration How long the Strict Transport Security
	 *                          should be enforced for this URL.
	 */
	protected function forceSecureAccess($duration = 31536000)
	{
		if ($this->config->forceGlobalSecureRequests !== true)
		{
			return;
		}

		force_https($duration, $this->request, $this->response);
	}

	//--------------------------------------------------------------------

	/**
	 * Determines if a response has been cached for the given URI.
	 *
<<<<<<< HEAD
	 * @param Cache $config
	 *
	 * @throws Exception
	 *
	 * @return boolean|ResponseInterface
	 */
	public function displayCache(Cache $config)
=======
	 * @param \Config\Cache $config
	 *
	 * @throws \Exception
	 *
	 * @return boolean|\CodeIgniter\HTTP\ResponseInterface
	 */
	public function displayCache($config)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($cachedResponse = cache()->get($this->generateCacheName($config)))
		{
			$cachedResponse = unserialize($cachedResponse);
			if (! is_array($cachedResponse) || ! isset($cachedResponse['output']) || ! isset($cachedResponse['headers']))
			{
				throw new Exception('Error unserializing page cache');
			}

			$headers = $cachedResponse['headers'];
			$output  = $cachedResponse['output'];

			// Clear all default headers
<<<<<<< HEAD
			foreach ($this->response->headers() as $key => $val)
=======
			foreach ($this->response->getHeaders() as $key => $val)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->response->removeHeader($key);
			}

			// Set cached headers
			foreach ($headers as $name => $value)
			{
				$this->response->setHeader($name, $value);
			}

			$output = $this->displayPerformanceMetrics($output);
			$this->response->setBody($output);

			return $this->response;
		}

		return false;
	}

	//--------------------------------------------------------------------

	/**
	 * Tells the app that the final output should be cached.
	 *
	 * @param integer $time
	 *
	 * @return void
	 */
	public static function cache(int $time)
	{
		static::$cacheTTL = $time;
	}

	//--------------------------------------------------------------------

	/**
	 * Caches the full response from the current request. Used for
	 * full-page caching for very high performance.
	 *
<<<<<<< HEAD
	 * @param Cache $config
=======
	 * @param \Config\Cache $config
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return mixed
	 */
	public function cachePage(Cache $config)
	{
		$headers = [];
<<<<<<< HEAD
		foreach ($this->response->headers() as $header)
=======
		foreach ($this->response->getHeaders() as $header)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$headers[$header->getName()] = $header->getValueLine();
		}

<<<<<<< HEAD
		return cache()->save($this->generateCacheName($config), serialize(['headers' => $headers, 'output' => $this->output]), static::$cacheTTL);
=======
		return cache()->save(
						$this->generateCacheName($config), serialize(['headers' => $headers, 'output' => $this->output]), static::$cacheTTL
		);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Returns an array with our basic performance stats collected.
	 *
	 * @return array
	 */
	public function getPerformanceStats(): array
	{
		return [
			'startTime' => $this->startTime,
			'totalTime' => $this->totalTime,
		];
	}

	//--------------------------------------------------------------------

	/**
	 * Generates the cache name to use for our full-page caching.
	 *
<<<<<<< HEAD
	 * @param Cache $config
	 *
	 * @return string
	 */
	protected function generateCacheName(Cache $config): string
	{
		if ($this->request instanceof CLIRequest)
=======
	 * @param $config
	 *
	 * @return string
	 */
	protected function generateCacheName($config): string
	{
		if (get_class($this->request) === CLIRequest::class)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return md5($this->request->getPath());
		}

<<<<<<< HEAD
		$uri = $this->request->getUri();

		if ($config->cacheQueryString)
		{
			$name = URI::createURIString($uri->getScheme(), $uri->getAuthority(), $uri->getPath(), $uri->getQuery());
		}
		else
		{
			$name = URI::createURIString($uri->getScheme(), $uri->getAuthority(), $uri->getPath());
=======
		$uri = $this->request->uri;

		if ($config->cacheQueryString)
		{
			$name = URI::createURIString(
							$uri->getScheme(), $uri->getAuthority(), $uri->getPath(), $uri->getQuery()
			);
		}
		else
		{
			$name = URI::createURIString(
							$uri->getScheme(), $uri->getAuthority(), $uri->getPath()
			);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return md5($name);
	}

	//--------------------------------------------------------------------

	/**
	 * Replaces the memory_usage and elapsed_time tags.
	 *
	 * @param string $output
	 *
	 * @return string
	 */
	public function displayPerformanceMetrics(string $output): string
	{
		$this->totalTime = $this->benchmark->getElapsedTime('total_execution');

<<<<<<< HEAD
		return str_replace('{elapsed_time}', (string) $this->totalTime, $output);
=======
		return str_replace('{elapsed_time}', $this->totalTime, $output);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Try to Route It - As it sounds like, works with the router to
	 * match a route against the current URI. If the route is a
	 * "redirect route", will also handle the redirect.
	 *
<<<<<<< HEAD
	 * @param RouteCollectionInterface|null $routes An collection interface to use in place
	 *                                         of the config file.
	 *
	 * @return string|null
	 * @throws RedirectException
	 */
	protected function tryToRouteIt(RouteCollectionInterface $routes = null)
	{
		if ($routes === null)
=======
	 * @param RouteCollectionInterface $routes An collection interface to use in place
	 *                                         of the config file.
	 *
	 * @return string
	 * @throws \CodeIgniter\Router\Exceptions\RedirectException
	 */
	protected function tryToRouteIt(RouteCollectionInterface $routes = null)
	{
		if (empty($routes) || ! $routes instanceof RouteCollectionInterface)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			require APPPATH . 'Config/Routes.php';
		}

		// $routes is defined in Config/Routes.php
		$this->router = Services::router($routes, $this->request);

		$path = $this->determinePath();

		$this->benchmark->stop('bootstrap');
		$this->benchmark->start('routing');

		ob_start();

		$this->controller = $this->router->handle($path);
		$this->method     = $this->router->methodName();

		// If a {locale} segment was matched in the final route,
		// then we need to set the correct locale on our Request.
		if ($this->router->hasLocale())
		{
<<<<<<< HEAD
			$this->request->setLocale($this->router->getLocale()); // @phpstan-ignore-line
=======
			$this->request->setLocale($this->router->getLocale());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		$this->benchmark->stop('routing');

		return $this->router->getFilter();
	}

	//--------------------------------------------------------------------

	/**
	 * Determines the path to use for us to try to route to, based
	 * on user input (setPath), or the CLI/IncomingRequest path.
	 */
	protected function determinePath()
	{
		if (! empty($this->path))
		{
			return $this->path;
		}

<<<<<<< HEAD
		// @phpstan-ignore-next-line
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return (is_cli() && ! (ENVIRONMENT === 'testing')) ? $this->request->getPath() : $this->request->uri->getPath();
	}

	//--------------------------------------------------------------------

	/**
	 * Allows the request path to be set from outside the class,
	 * instead of relying on CLIRequest or IncomingRequest for the path.
	 *
	 * This is primarily used by the Console.
	 *
	 * @param string $path
	 *
	 * @return $this
	 */
	public function setPath(string $path)
	{
		$this->path = $path;

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Now that everything has been setup, this method attempts to run the
	 * controller method and make the script go. If it's not able to, will
	 * show the appropriate Page Not Found error.
	 */
	protected function startController()
	{
		$this->benchmark->start('controller');
		$this->benchmark->start('controller_constructor');

		// Is it routed to a Closure?
		if (is_object($this->controller) && (get_class($this->controller) === 'Closure'))
		{
			$controller = $this->controller;
			return $controller(...$this->router->params());
		}

		// No controller specified - we don't know what to do now.
		if (empty($this->controller))
		{
			throw PageNotFoundException::forEmptyController();
		}

		// Try to autoload the class
		if (! class_exists($this->controller, true) || $this->method[0] === '_')
		{
			throw PageNotFoundException::forControllerNotFound($this->controller, $this->method);
		}
<<<<<<< HEAD
=======
		else if (! method_exists($this->controller, '_remap') &&
				! is_callable([$this->controller, $this->method], false)
		)
		{
			throw PageNotFoundException::forMethodNotFound($this->method);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Instantiates the controller class.
	 *
	 * @return mixed
	 */
	protected function createController()
	{
<<<<<<< HEAD
		$class = new $this->controller(); // @phpstan-ignore-line
=======
		$class = new $this->controller();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$class->initController($this->request, $this->response, Services::logger());

		$this->benchmark->stop('controller_constructor');

		return $class;
	}

	//--------------------------------------------------------------------

	/**
	 * Runs the controller, allowing for _remap methods to function.
	 *
	 * @param mixed $class
	 *
	 * @return mixed
	 */
	protected function runController($class)
	{
		// If this is a console request then use the input segments as parameters
<<<<<<< HEAD
		$params = defined('SPARKED') ? $this->request->getSegments() : $this->router->params(); // @phpstan-ignore-line
=======
		$params = defined('SPARKED') ? $this->request->getSegments() : $this->router->params();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		if (method_exists($class, '_remap'))
		{
			$output = $class->_remap($this->method, ...$params);
		}
		else
		{
			$output = $class->{$this->method}(...$params);
		}

		$this->benchmark->stop('controller');

		return $output;
	}

	//--------------------------------------------------------------------

	/**
	 * Displays a 404 Page Not Found error. If set, will try to
	 * call the 404Override controller/method that was set in routing config.
	 *
	 * @param PageNotFoundException $e
	 */
	protected function display404errors(PageNotFoundException $e)
	{
		// Is there a 404 Override available?
		if ($override = $this->router->get404Override())
		{
			if ($override instanceof Closure)
			{
				echo $override($e->getMessage());
			}
<<<<<<< HEAD
			elseif (is_array($override))
=======
			else if (is_array($override))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				$this->benchmark->start('controller');
				$this->benchmark->start('controller_constructor');

				$this->controller = $override[0];
				$this->method     = $override[1];

<<<<<<< HEAD
=======
				unset($override);

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				$controller = $this->createController();
				$this->runController($controller);
			}

<<<<<<< HEAD
			unset($override);

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$cacheConfig = new Cache();
			$this->gatherOutput($cacheConfig);
			$this->sendResponse();

			return;
		}

		// Display 404 Errors
		$this->response->setStatusCode($e->getCode());

		if (ENVIRONMENT !== 'testing')
		{
			// @codeCoverageIgnoreStart
			if (ob_get_level() > 0)
			{
				ob_end_flush();
			}
			// @codeCoverageIgnoreEnd
		}
		else
		{
			// When testing, one is for phpunit, another is for test case.
			if (ob_get_level() > 2)
			{
				ob_end_flush();
			}
		}

		throw PageNotFoundException::forPageNotFound(ENVIRONMENT !== 'production' || is_cli() ? $e->getMessage() : '');
	}

	//--------------------------------------------------------------------

	/**
	 * Gathers the script output from the buffer, replaces some execution
	 * time tag in the output and displays the debug toolbar, if required.
	 *
<<<<<<< HEAD
	 * @param Cache|null $cacheConfig
	 * @param mixed|null $returned
	 */
	protected function gatherOutput(Cache $cacheConfig = null, $returned = null)
=======
	 * @param null $cacheConfig
	 * @param null $returned
	 */
	protected function gatherOutput($cacheConfig = null, $returned = null)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$this->output = ob_get_contents();
		// If buffering is not null.
		// Clean (erase) the output buffer and turn off output buffering
		if (ob_get_length())
		{
			ob_end_clean();
		}

		if ($returned instanceof DownloadResponse)
		{
			$this->response = $returned;
			return;
		}
		// If the controller returned a response object,
		// we need to grab the body from it so it can
		// be added to anything else that might have been
		// echoed already.
		// We also need to save the instance locally
		// so that any status code changes, etc, take place.
<<<<<<< HEAD
		if ($returned instanceof ResponseInterface)
=======
		if ($returned instanceof Response)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$this->response = $returned;
			$returned       = $returned->getBody();
		}

		if (is_string($returned))
		{
			$this->output .= $returned;
		}

		// Cache it without the performance metrics replaced
		// so that we can have live speed updates along the way.
		if (static::$cacheTTL > 0)
		{
			$this->cachePage($cacheConfig);
		}

		$this->output = $this->displayPerformanceMetrics($this->output);

		$this->response->setBody($this->output);
	}

	//--------------------------------------------------------------------

	/**
	 * If we have a session object to use, store the current URI
	 * as the previous URI. This is called just prior to sending the
	 * response to the client, and will make it available next request.
	 *
	 * This helps provider safer, more reliable previous_url() detection.
	 *
<<<<<<< HEAD
	 * @param URI|string $uri
=======
	 * @param \CodeIgniter\HTTP\URI $uri
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function storePreviousURL($uri)
	{
		// Ignore CLI requests
		if (is_cli())
		{
			return;
		}
		// Ignore AJAX requests
		if (method_exists($this->request, 'isAJAX') && $this->request->isAJAX())
		{
			return;
		}

		// This is mainly needed during testing...
		if (is_string($uri))
		{
			$uri = new URI($uri);
		}

		if (isset($_SESSION))
		{
			$_SESSION['_ci_previous_url'] = (string) $uri;
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Modifies the Request Object to use a different method if a POST
	 * variable called _method is found.
	 */
	public function spoofRequestMethod()
	{
		// Only works with POSTED forms
		if ($this->request->getMethod() !== 'post')
		{
			return;
		}

<<<<<<< HEAD
		$method = $this->request->getPost('_method'); // @phpstan-ignore-line
=======
		$method = $this->request->getPost('_method');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		if (empty($method))
		{
			return;
		}

		$this->request = $this->request->setMethod($method);
	}

	/**
	 * Sends the output of this request back to the client.
	 * This is what they've been waiting for!
	 */
	protected function sendResponse()
	{
		$this->response->pretend($this->useSafeOutput)->send();
	}

	//--------------------------------------------------------------------

	/**
	 * Exits the application, setting the exit code for CLI-based applications
	 * that might be watching.
	 *
	 * Made into a separate method so that it can be mocked during testing
	 * without actually stopping script execution.
	 *
<<<<<<< HEAD
	 * @param integer $code
=======
	 * @param $code
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function callExit($code)
	{
		// @codeCoverageIgnoreStart
		exit($code);
		// @codeCoverageIgnoreEnd
	}

	//--------------------------------------------------------------------
}
