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

namespace CodeIgniter\Filters;

use CodeIgniter\Filters\Exceptions\FilterException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
<<<<<<< HEAD
use Config\Filters as FiltersConfig;
use Config\Modules;
use Config\Services;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Filters
 */
class Filters
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The processed filters that will
	 * be used to check against.
	 *
	 * @var array
	 */
	protected $filters = [
		'before' => [],
		'after'  => [],
	];

	/**
<<<<<<< HEAD
	 * The collection of filters' class names that will
	 * be used to execute in each position.
	 *
	 * @var array
	 */
	protected $filtersClass = [
		'before' => [],
		'after'  => [],
	];

	/**
	 * Any arguments to be passed to filtersClass.
	 *
	 * @var array
	 */
	protected $argumentsClass = [];

	/**
	 * The original config file
	 *
	 * @var FiltersConfig
=======
	 * The original config file
	 *
	 * @var \Config\Filters
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $config;

	/**
	 * The active IncomingRequest or CLIRequest
	 *
	 * @var RequestInterface
	 */
	protected $request;

	/**
	 * The active Response instance
	 *
	 * @var ResponseInterface
	 */
	protected $response;

	/**
	 * Whether we've done initial processing
	 * on the filter lists.
	 *
	 * @var boolean
	 */
	protected $initialized = false;

	/**
	 * Any arguments to be passed to filters.
	 *
	 * @var array
	 */
	protected $arguments = [];

<<<<<<< HEAD
	/**
	 * Handle to the modules config.
	 *
	 * @var Modules
	 */
	protected $modules;
=======
	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param FiltersConfig     $config
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param Modules|null      $modules
	 */
	public function __construct($config, RequestInterface $request, ResponseInterface $response, Modules $modules = null)
=======
	 * @param \Config\Filters   $config
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 */
	public function __construct($config, RequestInterface $request, ResponseInterface $response)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	{
		$this->config  = $config;
		$this->request = &$request;
		$this->setResponse($response);
<<<<<<< HEAD

		$this->modules = $modules ?? config('Modules');
	}

	/**
	 * If discoverFilters is enabled in Config then system will try to
	 * auto-discover custom filters files in Namespaces and allow access to
	 * the config object via the variable $customfilters as with the routes file
	 *
	 * Sample :
	 * $filters->aliases['custom-auth'] = \Acme\Blob\Filters\BlobAuth::class;
	 */
	private function discoverFilters()
	{
		$locator = Services::locator();

		// for access by custom filters
		$filters = $this->config;

		$files = $locator->search('Config/Filters.php');

		foreach ($files as $file)
		{
			$className = $locator->getClassname($file);

			// Don't include our main Filter config again...
			if ($className === 'Config\\Filters')
			{
				continue;
			}

			include $file;
		}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Set the response explicity.
	 *
	 * @param ResponseInterface $response
	 */
	public function setResponse(ResponseInterface $response)
	{
		$this->response = &$response;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Runs through all of the filters for the specified
	 * uri and position.
	 *
	 * @param string $uri
	 * @param string $position
	 *
<<<<<<< HEAD
	 * @return RequestInterface|ResponseInterface|mixed
	 * @throws FilterException
=======
	 * @return \CodeIgniter\HTTP\RequestInterface|\CodeIgniter\HTTP\ResponseInterface|mixed
	 * @throws \CodeIgniter\Filters\Exceptions\FilterException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function run(string $uri, string $position = 'before')
	{
		$this->initialize(strtolower($uri));

<<<<<<< HEAD
		foreach ($this->filtersClass[$position] as $className)
		{
			$class = new $className();

			if (! $class instanceof FilterInterface)
			{
				throw FilterException::forIncorrectInterface(get_class($class));
			}

			if ($position === 'before')
			{
				$result = $class->before($this->request, $this->argumentsClass[$className] ?? null);

				if ($result instanceof RequestInterface)
				{
					$this->request = $result;
					continue;
				}

				// If the response object was sent back,
				// then send it and quit.
				if ($result instanceof ResponseInterface)
				{
					// short circuit - bypass any other filters
					return $result;
				}
				// Ignore an empty result
				if (empty($result))
				{
					continue;
				}

				return $result;
			}

			if ($position === 'after')
			{
				$result = $class->after($this->request, $this->response, $this->argumentsClass[$className] ?? null);

				if ($result instanceof ResponseInterface)
				{
					$this->response = $result;

					continue;
=======
		foreach ($this->filters[$position] as $alias => $rules)
		{
			if (is_numeric($alias) && is_string($rules))
			{
				$alias = $rules;
			}

			if (! array_key_exists($alias, $this->config->aliases))
			{
				throw FilterException::forNoAlias($alias);
			}

			if (is_array($this->config->aliases[$alias]))
			{
				$classNames = $this->config->aliases[$alias];
			}
			else
			{
				$classNames = [$this->config->aliases[$alias]];
			}

			foreach ($classNames as $className)
			{
				$class = new $className();

				if (! $class instanceof FilterInterface)
				{
					throw FilterException::forIncorrectInterface(get_class($class));
				}

				if ($position === 'before')
				{
					$result = $class->before($this->request, $this->arguments[$alias] ?? null);

					if ($result instanceof RequestInterface)
					{
						$this->request = $result;
						continue;
					}

					// If the response object was sent back,
					// then send it and quit.
					if ($result instanceof ResponseInterface)
					{
						// short circuit - bypass any other filters
						return $result;
					}

					// Ignore an empty result
					if (empty($result))
					{
						continue;
					}

					return $result;
				}
				elseif ($position === 'after')
				{
					$result = $class->after($this->request, $this->response, $this->arguments[$alias] ?? null);

					if ($result instanceof ResponseInterface)
					{
						$this->response = $result;
						continue;
					}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				}
			}
		}

		return $position === 'before' ? $this->request : $this->response;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Runs through our list of filters provided by the configuration
	 * object to get them ready for use, including getting uri masks
	 * to proper regex, removing those we can from the possibilities
	 * based on HTTP method, etc.
	 *
	 * The resulting $this->filters is an array of only filters
	 * that should be applied to this request.
	 *
	 * We go ahead an process the entire tree because we'll need to
	 * run through both a before and after and don't want to double
	 * process the rows.
	 *
	 * @param string $uri
	 *
	 * @return Filters
	 */
	public function initialize(string $uri = null)
	{
		if ($this->initialized === true)
		{
			return $this;
		}

<<<<<<< HEAD
		if ($this->modules->shouldDiscover('filters'))
		{
			$this->discoverFilters();
		}

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$this->processGlobals($uri);
		$this->processMethods();
		$this->processFilters($uri);

<<<<<<< HEAD
		// Set the toolbar filter to the last position to be executed
		if (in_array('toolbar', $this->filters['after'], true) &&
			($count = count($this->filters['after'])) > 1 &&
			$this->filters['after'][$count - 1] !== 'toolbar'
		)
		{
			array_splice($this->filters['after'], array_search('toolbar', $this->filters['after'], true), 1);
			$this->filters['after'][] = 'toolbar';
		}

		$this->processAliasesToClass('before');
		$this->processAliasesToClass('after');

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$this->initialized = true;

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Returns the processed filters array.
	 *
	 * @return array
	 */
	public function getFilters(): array
	{
		return $this->filters;
	}

	/**
<<<<<<< HEAD
	 * Returns the filtersClass array.
	 *
	 * @return array
	 */
	public function getFiltersClass(): array
	{
		return $this->filtersClass;
	}

	/**
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Adds a new alias to the config file.
	 * MUST be called prior to initialize();
	 * Intended for use within routes files.
	 *
	 * @param string      $class
	 * @param string|null $alias
	 * @param string      $when
	 * @param string      $section
	 *
	 * @return $this
	 */
	public function addFilter(string $class, string $alias = null, string $when = 'before', string $section = 'globals')
	{
		$alias = $alias ?? md5($class);

		if (! isset($this->config->{$section}))
		{
			$this->config->{$section} = [];
		}

		if (! isset($this->config->{$section}[$when]))
		{
			$this->config->{$section}[$when] = [];
		}

		$this->config->aliases[$alias] = $class;

		$this->config->{$section}[$when][] = $alias;

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Ensures that a specific filter is on and enabled for the current request.
	 *
	 * Filters can have "arguments". This is done by placing a colon immediately
	 * after the filter name, followed by a comma-separated list of arguments that
	 * are passed to the filter when executed.
	 *
	 * @param string $name
	 * @param string $when
	 *
<<<<<<< HEAD
	 * @return Filters
=======
	 * @return \CodeIgniter\Filters\Filters
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function enableFilter(string $name, string $when = 'before')
	{
		// Get parameters and clean name
		if (strpos($name, ':') !== false)
		{
			list($name, $params) = explode(':', $name);

			$params = explode(',', $params);
			array_walk($params, function (&$item) {
				$item = trim($item);
			});

			$this->arguments[$name] = $params;
		}

		if (! array_key_exists($name, $this->config->aliases))
		{
			throw FilterException::forNoAlias($name);
		}

<<<<<<< HEAD
		$classNames = (array) $this->config->aliases[$name];

		foreach ($classNames as $className)
		{
			$this->argumentsClass[$className] = $this->arguments[$name] ?? null;
		}

		if (! isset($this->filters[$when][$name]))
		{
			$this->filters[$when][]    = $name;
			$this->filtersClass[$when] = array_merge($this->filtersClass[$when], $classNames);
=======
		if (! isset($this->filters[$when][$name]))
		{
			$this->filters[$when][] = $name;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Returns the arguments for a specified key, or all.
	 *
	 * @param string|null $key
	 *
	 * @return mixed
	 */
	public function getArguments(string $key = null)
	{
		return is_null($key) ? $this->arguments : $this->arguments[$key];
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD
=======
	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	// Processors
	//--------------------------------------------------------------------

	/**
	 * Add any applicable (not excluded) global filter settings to the mix.
	 *
	 * @param string $uri
	 *
	 * @return void
	 */
	protected function processGlobals(string $uri = null)
	{
		if (! isset($this->config->globals) || ! is_array($this->config->globals))
		{
			return;
		}

		$uri = strtolower(trim($uri, '/ '));

		// Add any global filters, unless they are excluded for this URI
		$sets = [
			'before',
			'after',
		];

		foreach ($sets as $set)
		{
			if (isset($this->config->globals[$set]))
			{
				// look at each alias in the group
				foreach ($this->config->globals[$set] as $alias => $rules)
				{
					$keep = true;
					if (is_array($rules))
					{
						// see if it should be excluded
						if (isset($rules['except']))
						{
							// grab the exclusion rules
							$check = $rules['except'];
							if ($this->pathApplies($uri, $check))
							{
								$keep = false;
							}
						}
					}
					else
					{
						$alias = $rules; // simple name of filter to apply
					}

					if ($keep)
					{
						$this->filters[$set][] = $alias;
					}
				}
			}
		}
	}

<<<<<<< HEAD
	/**
	 * Add any method-specific filters to the mix.
=======
	//--------------------------------------------------------------------

	/**
	 * Add any method-specific flters to the mix.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return void
	 */
	protected function processMethods()
	{
		if (! isset($this->config->methods) || ! is_array($this->config->methods))
		{
			return;
		}

		// Request method won't be set for CLI-based requests
		$method = strtolower($_SERVER['REQUEST_METHOD'] ?? 'cli');

		if (array_key_exists($method, $this->config->methods))
		{
			$this->filters['before'] = array_merge($this->filters['before'], $this->config->methods[$method]);
			return;
		}
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Add any applicable configured filters to the mix.
	 *
	 * @param string $uri
	 *
	 * @return void
	 */
	protected function processFilters(string $uri = null)
	{
		if (! isset($this->config->filters) || ! $this->config->filters)
		{
			return;
		}

		$uri = strtolower(trim($uri, '/ '));

		// Add any filters that apply to this URI
		foreach ($this->config->filters as $alias => $settings)
		{
			// Look for inclusion rules
			if (isset($settings['before']))
			{
				$path = $settings['before'];
				if ($this->pathApplies($uri, $path))
				{
					$this->filters['before'][] = $alias;
				}
			}

			if (isset($settings['after']))
			{
				$path = $settings['after'];
				if ($this->pathApplies($uri, $path))
				{
					$this->filters['after'][] = $alias;
				}
			}
		}
	}

	/**
<<<<<<< HEAD
	 * Maps filter aliases to the equivalent filter classes
	 *
	 * @param  string $position
	 * @throws FilterException
	 *
	 * @return void
	 */
	protected function processAliasesToClass(string $position)
	{
		foreach ($this->filters[$position] as $alias => $rules)
		{
			if (is_numeric($alias) && is_string($rules))
			{
				$alias = $rules;
			}

			if (! array_key_exists($alias, $this->config->aliases))
			{
				throw FilterException::forNoAlias($alias);
			}

			if (is_array($this->config->aliases[$alias]))
			{
				$this->filtersClass[$position] = array_merge($this->filtersClass[$position], $this->config->aliases[$alias]);
			}
			else
			{
				$this->filtersClass[$position][] = $this->config->aliases[$alias];
			}
		}

		// when using enableFilter() we already write the class name in ->filtersClass as well as the
		// alias in ->filters. This leads to duplicates when using route filters.
		// Since some filters like rate limiters rely on being executed once a request we filter em here.
		$this->filtersClass[$position] = array_unique($this->filtersClass[$position]);
	}

	/**
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Check paths for match for URI
	 *
	 * @param string $uri   URI to test against
	 * @param mixed  $paths The path patterns to test
	 *
	 * @return boolean True if any of the paths apply to the URI
	 */
	private function pathApplies(string $uri, $paths)
	{
		// empty path matches all
		if (empty($paths))
		{
			return true;
		}

		// make sure the paths are iterable
		if (is_string($paths))
		{
			$paths = [$paths];
		}

		// treat each paths as pseudo-regex
		foreach ($paths as $path)
		{
			// need to escape path separators
			$path = str_replace('/', '\/', trim($path, '/ '));
			// need to make pseudo wildcard real
			$path = strtolower(str_replace('*', '.*', $path));
			// Does this rule apply here?
			if (preg_match('#^' . $path . '$#', $uri, $match) === 1)
			{
				return true;
			}
		}

		return false;
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
