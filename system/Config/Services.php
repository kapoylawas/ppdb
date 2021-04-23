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

namespace CodeIgniter\Config;

use CodeIgniter\Cache\CacheFactory;
<<<<<<< HEAD
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\CLI\Commands;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\MigrationRunner;
use CodeIgniter\Debug\Exceptions;
use CodeIgniter\Debug\Iterator;
use CodeIgniter\Debug\Timer;
use CodeIgniter\Debug\Toolbar;
<<<<<<< HEAD
use CodeIgniter\Email\Email;
use CodeIgniter\Encryption\EncrypterInterface;
use CodeIgniter\Encryption\Encryption;
use CodeIgniter\Filters\Filters;
use CodeIgniter\Format\Format;
=======
use CodeIgniter\Encryption\EncrypterInterface;
use CodeIgniter\Encryption\Encryption;
use CodeIgniter\Filters\Filters;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\Honeypot\Honeypot;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Negotiate;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
<<<<<<< HEAD
use CodeIgniter\Images\Handlers\BaseHandler;
use CodeIgniter\Language\Language;
use CodeIgniter\Log\Logger;
=======
use CodeIgniter\Language\Language;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\Pager\Pager;
use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\RouteCollectionInterface;
use CodeIgniter\Router\Router;
use CodeIgniter\Security\Security;
use CodeIgniter\Session\Session;
use CodeIgniter\Throttle\Throttler;
use CodeIgniter\Typography\Typography;
use CodeIgniter\Validation\Validation;
use CodeIgniter\View\Cell;
use CodeIgniter\View\Parser;
use CodeIgniter\View\RendererInterface;
<<<<<<< HEAD
use CodeIgniter\View\View;
use Config\App;
use Config\Cache;
use Config\Email as EmailConfig;
use Config\Encryption as EncryptionConfig;
use Config\Exceptions as ExceptionsConfig;
use Config\Filters as FiltersConfig;
use Config\Format as FormatConfig;
use Config\Honeypot as HoneypotConfig;
use Config\Images;
use Config\Migrations;
use Config\Pager as PagerConfig;
use Config\Toolbar as ToolbarConfig;
use Config\Validation as ValidationConfig;
use Config\View as ViewConfig;
=======
use Config\App;
use Config\Cache;
use Config\Images;
use Config\Logger;
use Config\Migrations;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This is used in place of a Dependency Injection container primarily
 * due to its simplicity, which allows a better long-term maintenance
 * of the applications built on top of CodeIgniter. A bonus side-effect
 * is that IDEs are able to determine what class you are calling
 * whereas with DI Containers there usually isn't a way for them to do this.
 *
 * @see http://blog.ircmaxell.com/2015/11/simple-easy-risk-and-change.html
 * @see http://www.infoq.com/presentations/Simple-Made-Easy
 */
class Services extends BaseService
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The cache class provides a simple way to store and retrieve
	 * complex data for later.
	 *
<<<<<<< HEAD
	 * @param Cache|null $config
	 * @param boolean    $getShared
	 *
	 * @return CacheInterface
=======
	 * @param \Config\Cache $config
	 * @param boolean       $getShared
	 *
	 * @return \CodeIgniter\Cache\CacheInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function cache(Cache $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('cache', $config);
		}

<<<<<<< HEAD
		$config = $config ?? new Cache();
=======
		if (! is_object($config))
		{
			$config = new Cache();
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return CacheFactory::getHandler($config);
	}

	//--------------------------------------------------------------------

	/**
	 * The CLI Request class provides for ways to interact with
	 * a command line request.
	 *
<<<<<<< HEAD
	 * @param App|null $config
	 * @param boolean  $getShared
	 *
	 * @return CLIRequest
=======
	 * @param \Config\App $config
	 * @param boolean     $getShared
	 *
	 * @return \CodeIgniter\HTTP\CLIRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function clirequest(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('clirequest', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('App');
=======
		if (! is_object($config))
		{
			$config = config(App::class);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new CLIRequest($config);
	}

	//--------------------------------------------------------------------

	/**
	 * The commands utility for running and working with CLI commands.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Commands
=======
	 * @return \CodeIgniter\CLI\Commands|mixed
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function commands(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('commands');
		}

<<<<<<< HEAD
		return new Commands();
=======
		return new \CodeIgniter\CLI\Commands();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * The CURL Request class acts as a simple HTTP client for interacting
	 * with other servers, typically through APIs.
	 *
<<<<<<< HEAD
	 * @param array                  $options
	 * @param ResponseInterface|null $response
	 * @param App|null               $config
	 * @param boolean                $getShared
	 *
	 * @return CURLRequest
=======
	 * @param array                               $options
	 * @param \CodeIgniter\HTTP\ResponseInterface $response
	 * @param \Config\App                         $config
	 * @param boolean                             $getShared
	 *
	 * @return \CodeIgniter\HTTP\CURLRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function curlrequest(array $options = [], ResponseInterface $response = null, App $config = null, bool $getShared = true)
	{
		if ($getShared === true)
		{
			return static::getSharedInstance('curlrequest', $options, $response, $config);
		}

<<<<<<< HEAD
		$config   = $config ?? config('App');
		$response = $response ?? new Response($config);

		return new CURLRequest(
			$config,
			new URI($options['base_uri'] ?? null),
			$response,
			$options
=======
		if (! is_object($config))
		{
			$config = config(App::class);
		}

		if (! is_object($response))
		{
			$response = new Response($config);
		}

		return new CURLRequest(
				$config,
				new URI($options['base_uri'] ?? null),
				$response,
				$options
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		);
	}

	//--------------------------------------------------------------------

	/**
	 * The Email class allows you to send email via mail, sendmail, SMTP.
	 *
<<<<<<< HEAD
	 * @param EmailConfig|array|null $config
	 * @param boolean                $getShared
	 *
	 * @return Email|mixed
=======
	 * @param null    $config
	 * @param boolean $getShared
	 *
	 * @return \CodeIgniter\Email\Email|mixed
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function email($config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('email', $config);
		}
<<<<<<< HEAD

		if (empty($config) || ! (is_array($config) || $config instanceof EmailConfig))
		{
			$config = config('Email');
		}

		return new Email($config);
=======
		if (empty($config))
		{
			$config = new \Config\Email();
		}
		return new \CodeIgniter\Email\Email($config);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * The Encryption class provides two-way encryption.
	 *
<<<<<<< HEAD
	 * @param EncryptionConfig|null $config
	 * @param boolean               $getShared
	 *
	 * @return EncrypterInterface Encryption handler
	 */
	public static function encrypter(EncryptionConfig $config = null, $getShared = false)
=======
	 * @param mixed   $config
	 * @param boolean $getShared
	 *
	 * @return EncrypterInterface Encryption handler
	 */
	public static function encrypter($config = null, $getShared = false)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared === true)
		{
			return static::getSharedInstance('encrypter', $config);
		}

<<<<<<< HEAD
		$config     = $config ?? config('Encryption');
		$encryption = new Encryption($config);

=======
		if (empty($config))
		{
			$config = new \Config\Encryption();
		}

		$encryption = new Encryption($config);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return $encryption->initialize($config);
	}

	//--------------------------------------------------------------------

	/**
	 * The Exceptions class holds the methods that handle:
	 *
	 *  - set_exception_handler
	 *  - set_error_handler
	 *  - register_shutdown_function
	 *
<<<<<<< HEAD
	 * @param ExceptionsConfig|null $config
	 * @param IncomingRequest|null  $request
	 * @param Response|null         $response
	 * @param boolean               $getShared
	 *
	 * @return Exceptions
	 */
	public static function exceptions(
		ExceptionsConfig $config = null,
=======
	 * @param \Config\Exceptions                $config
	 * @param \CodeIgniter\HTTP\IncomingRequest $request
	 * @param \CodeIgniter\HTTP\Response        $response
	 * @param boolean                           $getShared
	 *
	 * @return \CodeIgniter\Debug\Exceptions
	 */
	public static function exceptions(
		\Config\Exceptions $config = null,
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		IncomingRequest $request = null,
		Response $response = null,
		bool $getShared = true
	)
	{
		if ($getShared)
		{
			return static::getSharedInstance('exceptions', $config, $request, $response);
		}

<<<<<<< HEAD
		$config   = $config ?? config('Exceptions');
		$request  = $request ?? static::request();
		$response = $response ?? static::response();

		return new Exceptions($config, $request, $response);
=======
		if (empty($config))
		{
			$config = new \Config\Exceptions();
		}

		if (empty($request))
		{
			$request = static::request();
		}

		if (empty($response))
		{
			$response = static::response();
		}

		return (new Exceptions($config, $request, $response));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Filters allow you to run tasks before and/or after a controller
	 * is executed. During before filters, the request can be modified,
	 * and actions taken based on the request, while after filters can
	 * act on or modify the response itself before it is sent to the client.
	 *
<<<<<<< HEAD
	 * @param FiltersConfig|null $config
	 * @param boolean            $getShared
	 *
	 * @return Filters
	 */
	public static function filters(FiltersConfig $config = null, bool $getShared = true)
=======
	 * @param mixed   $config
	 * @param boolean $getShared
	 *
	 * @return \CodeIgniter\Filters\Filters
	 */
	public static function filters($config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('filters', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('Filters');

		return new Filters($config, static::request(), static::response());
	}

	//--------------------------------------------------------------------

	/**
	 * The Format class is a convenient place to create Formatters.
	 *
	 * @param FormatConfig|null $config
	 * @param boolean           $getShared
	 *
	 * @return Format
	 */
	public static function format(FormatConfig $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('format', $config);
		}

		$config = $config ?? config('Format');

		return new Format($config);
=======
		if (empty($config))
		{
			$config = new \Config\Filters();
		}

		return new Filters($config, static::request(), static::response());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * The Honeypot provides a secret input on forms that bots should NOT
	 * fill in, providing an additional safeguard when accepting user input.
	 *
<<<<<<< HEAD
	 * @param HoneypotConfig|null $config
	 * @param boolean             $getShared
	 *
	 * @return Honeypot
	 */
	public static function honeypot(HoneypotConfig $config = null, bool $getShared = true)
=======
	 * @param \CodeIgniter\Config\BaseConfig|null $config
	 * @param boolean                             $getShared
	 *
	 * @return \CodeIgniter\Honeypot\Honeypot|mixed
	 */
	public static function honeypot(BaseConfig $config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('honeypot', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('Honeypot');
=======
		if (is_null($config))
		{
			$config = new \Config\Honeypot();
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Honeypot($config);
	}

	//--------------------------------------------------------------------

	/**
	 * Acts as a factory for ImageHandler classes and returns an instance
	 * of the handler. Used like Services::image()->withFile($path)->rotate(90)->save();
	 *
<<<<<<< HEAD
	 * @param string|null $handler
	 * @param Images|null $config
	 * @param boolean     $getShared
	 *
	 * @return BaseHandler
	 */
	public static function image(string $handler = null, Images $config = null, bool $getShared = true)
=======
	 * @param string|null         $handler
	 * @param \Config\Images|null $config
	 * @param boolean             $getShared
	 *
	 * @return \CodeIgniter\Images\Handlers\BaseHandler
	 */
	public static function image(string $handler = null, $config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('image', $handler, $config);
		}

<<<<<<< HEAD
		$config  = $config ?? config('Images');
		$handler = $handler ?: $config->defaultHandler;
		$class   = $config->handlers[$handler];
=======
		if (empty($config))
		{
			$config = new Images();
		}

		$handler = is_null($handler) ? $config->defaultHandler : $handler;

		$class = $config->handlers[$handler];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new $class($config);
	}

	//--------------------------------------------------------------------

	/**
	 * The Iterator class provides a simple way of looping over a function
	 * and timing the results and memory usage. Used when debugging and
	 * optimizing applications.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Iterator
=======
	 * @return \CodeIgniter\Debug\Iterator
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function iterator(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('iterator');
		}

		return new Iterator();
	}

	//--------------------------------------------------------------------

	/**
	 * Responsible for loading the language string translations.
	 *
<<<<<<< HEAD
	 * @param string|null $locale
	 * @param boolean     $getShared
	 *
	 * @return Language
=======
	 * @param string  $locale
	 * @param boolean $getShared
	 *
	 * @return \CodeIgniter\Language\Language
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function language(string $locale = null, bool $getShared = true)
	{
		if ($getShared)
		{
<<<<<<< HEAD
			return static::getSharedInstance('language', $locale)->setLocale($locale);
		}

		// Use '?:' for empty string check
		$locale = $locale ?: static::request()->getLocale();
=======
			return static::getSharedInstance('language', $locale)
							->setLocale($locale);
		}

		$locale = ! empty($locale) ? $locale : static::request()
						->getLocale();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Language($locale);
	}

	//--------------------------------------------------------------------

	/**
	 * The Logger class is a PSR-3 compatible Logging class that supports
	 * multiple handlers that process the actual logging.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Logger
=======
	 * @return \CodeIgniter\Log\Logger
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function logger(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('logger');
		}

<<<<<<< HEAD
		return new Logger(config('Logger'));
=======
		return new \CodeIgniter\Log\Logger(new Logger());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Return the appropriate Migration runner.
	 *
<<<<<<< HEAD
	 * @param Migrations|null          $config
	 * @param ConnectionInterface|null $db
	 * @param boolean                  $getShared
	 *
	 * @return MigrationRunner
	 */
	public static function migrations(Migrations $config = null, ConnectionInterface $db = null, bool $getShared = true)
=======
	 * @param \CodeIgniter\Config\BaseConfig            $config
	 * @param \CodeIgniter\Database\ConnectionInterface $db
	 * @param boolean                                   $getShared
	 *
	 * @return \CodeIgniter\Database\MigrationRunner
	 */
	public static function migrations(BaseConfig $config = null, ConnectionInterface $db = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('migrations', $config, $db);
		}

<<<<<<< HEAD
		$config = $config ?? config('Migrations');
=======
		$config = empty($config) ? new Migrations() : $config;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new MigrationRunner($config, $db);
	}

	//--------------------------------------------------------------------

	/**
	 * The Negotiate class provides the content negotiation features for
	 * working the request to determine correct language, encoding, charset,
	 * and more.
	 *
<<<<<<< HEAD
	 * @param RequestInterface|null $request
	 * @param boolean               $getShared
	 *
	 * @return Negotiate
=======
	 * @param \CodeIgniter\HTTP\RequestInterface $request
	 * @param boolean                            $getShared
	 *
	 * @return \CodeIgniter\HTTP\Negotiate
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function negotiator(RequestInterface $request = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('negotiator', $request);
		}

<<<<<<< HEAD
		$request = $request ?? static::request();
=======
		if (is_null($request))
		{
			$request = static::request();
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Negotiate($request);
	}

	//--------------------------------------------------------------------

	/**
	 * Return the appropriate pagination handler.
	 *
<<<<<<< HEAD
	 * @param PagerConfig|null       $config
	 * @param RendererInterface|null $view
	 * @param boolean                $getShared
	 *
	 * @return Pager
	 */
	public static function pager(PagerConfig $config = null, RendererInterface $view = null, bool $getShared = true)
=======
	 * @param mixed                               $config
	 * @param \CodeIgniter\View\RendererInterface $view
	 * @param boolean                             $getShared
	 *
	 * @return \CodeIgniter\Pager\Pager
	 */
	public static function pager($config = null, RendererInterface $view = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('pager', $config, $view);
		}

<<<<<<< HEAD
		$config = $config ?? config('Pager');
		$view   = $view ?? static::renderer();
=======
		if (empty($config))
		{
			$config = config('Pager');
		}

		if (! $view instanceof RendererInterface)
		{
			$view = static::renderer();
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Pager($config, $view);
	}

	//--------------------------------------------------------------------

	/**
	 * The Parser is a simple template parser.
	 *
<<<<<<< HEAD
	 * @param string|null     $viewPath
	 * @param ViewConfig|null $config
	 * @param boolean         $getShared
	 *
	 * @return Parser
	 */
	public static function parser(string $viewPath = null, ViewConfig $config = null, bool $getShared = true)
=======
	 * @param string  $viewPath
	 * @param mixed   $config
	 * @param boolean $getShared
	 *
	 * @return \CodeIgniter\View\Parser
	 */
	public static function parser(string $viewPath = null, $config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('parser', $viewPath, $config);
		}

<<<<<<< HEAD
		$viewPath = $viewPath ?: config('Paths')->viewDirectory;
		$config   = $config ?? config('View');
=======
		if (is_null($config))
		{
			$config = new \Config\View();
		}

		if (is_null($viewPath))
		{
			$paths    = config('Paths');
			$viewPath = $paths->viewDirectory;
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Parser($config, $viewPath, static::locator(), CI_DEBUG, static::logger());
	}

	//--------------------------------------------------------------------

	/**
	 * The Renderer class is the class that actually displays a file to the user.
	 * The default View class within CodeIgniter is intentionally simple, but this
	 * service could easily be replaced by a template engine if the user needed to.
	 *
<<<<<<< HEAD
	 * @param string|null     $viewPath
	 * @param ViewConfig|null $config
	 * @param boolean         $getShared
	 *
	 * @return View
	 */
	public static function renderer(string $viewPath = null, ViewConfig $config = null, bool $getShared = true)
=======
	 * @param string  $viewPath
	 * @param mixed   $config
	 * @param boolean $getShared
	 *
	 * @return \CodeIgniter\View\View
	 */
	public static function renderer(string $viewPath = null, $config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('renderer', $viewPath, $config);
		}

<<<<<<< HEAD
		$viewPath = $viewPath ?: config('Paths')->viewDirectory;
		$config   = $config ?? config('View');

		return new View($config, $viewPath, static::locator(), CI_DEBUG, static::logger());
=======
		if (is_null($config))
		{
			$config = new \Config\View();
		}

		if (is_null($viewPath))
		{
			$paths = config('Paths');

			$viewPath = $paths->viewDirectory;
		}

		return new \CodeIgniter\View\View($config, $viewPath, static::locator(), CI_DEBUG, static::logger());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * The Request class models an HTTP request.
	 *
<<<<<<< HEAD
	 * @param App|null $config
	 * @param boolean  $getShared
	 *
	 * @return IncomingRequest
=======
	 * @param \Config\App $config
	 * @param boolean     $getShared
	 *
	 * @return \CodeIgniter\HTTP\IncomingRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function request(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('request', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('App');

		return new IncomingRequest(
			$config,
			static::uri(),
			'php://input',
			new UserAgent()
=======
		if (! is_object($config))
		{
			$config = config(App::class);
		}

		return new IncomingRequest(
				$config,
				static::uri(),
				'php://input',
				new UserAgent()
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		);
	}

	//--------------------------------------------------------------------

	/**
	 * The Response class models an HTTP response.
	 *
<<<<<<< HEAD
	 * @param App|null $config
	 * @param boolean  $getShared
	 *
	 * @return Response
=======
	 * @param \Config\App $config
	 * @param boolean     $getShared
	 *
	 * @return \CodeIgniter\HTTP\Response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function response(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('response', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('App');
=======
		if (! is_object($config))
		{
			$config = config(App::class);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Response($config);
	}

	//--------------------------------------------------------------------

	/**
	 * The Redirect class provides nice way of working with redirects.
	 *
<<<<<<< HEAD
	 * @param App|null $config
	 * @param boolean  $getShared
	 *
	 * @return RedirectResponse
	 */
	public static function redirectresponse(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('redirectresponse', $config);
		}

		$config   = $config ?? config('App');
		$response = new RedirectResponse($config);
		$response->setProtocolVersion(static::request()->getProtocolVersion());
=======
	 * @param \Config\App $config
	 * @param boolean     $getShared
	 *
	 * @return \CodeIgniter\HTTP\Response
	 */
	public static function redirectResponse(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('redirectResponse', $config);
		}

		if (! is_object($config))
		{
			$config = config(App::class);
		}

		$response = new RedirectResponse($config);
		$response->setProtocolVersion(static::request()
						->getProtocolVersion());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $response;
	}

	//--------------------------------------------------------------------

	/**
	 * The Routes service is a class that allows for easily building
	 * a collection of routes.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return RouteCollection
=======
	 * @return \CodeIgniter\Router\RouteCollection
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function routes(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('routes');
		}

		return new RouteCollection(static::locator(), config('Modules'));
	}

	//--------------------------------------------------------------------

	/**
	 * The Router class uses a RouteCollection's array of routes, and determines
	 * the correct Controller and Method to execute.
	 *
<<<<<<< HEAD
	 * @param RouteCollectionInterface|null $routes
	 * @param Request|null                  $request
	 * @param boolean                       $getShared
	 *
	 * @return Router
=======
	 * @param \CodeIgniter\Router\RouteCollectionInterface $routes
	 * @param \CodeIgniter\HTTP\Request                    $request
	 * @param boolean                                      $getShared
	 *
	 * @return \CodeIgniter\Router\Router
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function router(RouteCollectionInterface $routes = null, Request $request = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('router', $routes, $request);
		}

<<<<<<< HEAD
		$routes  = $routes ?? static::routes();
		$request = $request ?? static::request();
=======
		if (empty($routes))
		{
			$routes = static::routes();
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Router($routes, $request);
	}

	//--------------------------------------------------------------------

	/**
	 * The Security class provides a few handy tools for keeping the site
	 * secure, most notably the CSRF protection tools.
	 *
<<<<<<< HEAD
	 * @param App|null $config
	 * @param boolean  $getShared
	 *
	 * @return Security
=======
	 * @param \Config\App $config
	 * @param boolean     $getShared
	 *
	 * @return \CodeIgniter\Security\Security
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function security(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('security', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('Security') ?? config('App');
=======
		if (! is_object($config))
		{
			$config = config(App::class);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Security($config);
	}

	//--------------------------------------------------------------------

	/**
	 * Return the session manager.
	 *
<<<<<<< HEAD
	 * @param App|null $config
	 * @param boolean  $getShared
	 *
	 * @return Session
=======
	 * @param \Config\App $config
	 * @param boolean     $getShared
	 *
	 * @return \CodeIgniter\Session\Session
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function session(App $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('session', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('App');
=======
		if (! is_object($config))
		{
			$config = config(App::class);
		}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$logger = static::logger();

		$driverName = $config->sessionDriver;
		$driver     = new $driverName($config, static::request()->getIPAddress());
		$driver->setLogger($logger);

		$session = new Session($driver, $config);
		$session->setLogger($logger);

		if (session_status() === PHP_SESSION_NONE)
		{
			$session->start();
		}

		return $session;
	}

	//--------------------------------------------------------------------

	/**
	 * The Throttler class provides a simple method for implementing
	 * rate limiting in your applications.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Throttler
=======
	 * @return \CodeIgniter\Throttle\Throttler
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function throttler(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('throttler');
		}

		return new Throttler(static::cache());
	}

	//--------------------------------------------------------------------

	/**
	 * The Timer class provides a simple way to Benchmark portions of your
	 * application.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Timer
=======
	 * @return \CodeIgniter\Debug\Timer
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function timer(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('timer');
		}

		return new Timer();
	}

	//--------------------------------------------------------------------

	/**
	 * Return the debug toolbar.
	 *
<<<<<<< HEAD
	 * @param ToolbarConfig|null $config
	 * @param boolean            $getShared
	 *
	 * @return Toolbar
	 */
	public static function toolbar(ToolbarConfig $config = null, bool $getShared = true)
=======
	 * @param \Config\Toolbar $config
	 * @param boolean         $getShared
	 *
	 * @return \CodeIgniter\Debug\Toolbar
	 */
	public static function toolbar(\Config\Toolbar $config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('toolbar', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('Toolbar');
=======
		if (! is_object($config))
		{
			$config = config('Toolbar');
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Toolbar($config);
	}

	//--------------------------------------------------------------------

	/**
	 * The URI class provides a way to model and manipulate URIs.
	 *
	 * @param string  $uri
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return URI
=======
	 * @return \CodeIgniter\HTTP\URI
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function uri(string $uri = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('uri', $uri);
		}

		return new URI($uri);
	}

	//--------------------------------------------------------------------

	/**
	 * The Validation class provides tools for validating input data.
	 *
<<<<<<< HEAD
	 * @param ValidationConfig|null $config
	 * @param boolean               $getShared
	 *
	 * @return Validation
	 */
	public static function validation(ValidationConfig $config = null, bool $getShared = true)
=======
	 * @param \Config\Validation $config
	 * @param boolean            $getShared
	 *
	 * @return \CodeIgniter\Validation\Validation
	 */
	public static function validation(\Config\Validation $config = null, bool $getShared = true)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		if ($getShared)
		{
			return static::getSharedInstance('validation', $config);
		}

<<<<<<< HEAD
		$config = $config ?? config('Validation');
=======
		if (is_null($config))
		{
			$config = config('Validation');
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return new Validation($config, static::renderer());
	}

	//--------------------------------------------------------------------

	/**
	 * View cells are intended to let you insert HTML into view
	 * that has been generated by any callable in the system.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Cell
=======
	 * @return \CodeIgniter\View\Cell
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function viewcell(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('viewcell');
		}

		return new Cell(static::cache());
	}

	//--------------------------------------------------------------------

	/**
	 * The Typography class provides a way to format text in semantically relevant ways.
	 *
	 * @param boolean $getShared
	 *
<<<<<<< HEAD
	 * @return Typography
=======
	 * @return \CodeIgniter\Typography\Typography
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function typography(bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('typography');
		}

		return new Typography();
	}
<<<<<<< HEAD
=======

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
