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

namespace CodeIgniter\View;

<<<<<<< HEAD
use CodeIgniter\Autoloader\FileLocator;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\View\Exceptions\ViewException;
use Config\Services;
use Config\Toolbar;
use Config\View as ViewConfig;
use Psr\Log\LoggerInterface;
use RuntimeException;

/**
 * Class View
 */
class View implements RendererInterface
{
=======
use CodeIgniter\View\Exceptions\ViewException;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class View
 *
 * @package CodeIgniter\View
 */
class View implements RendererInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Data that is made available to the Views.
	 *
	 * @var array
	 */
	protected $data = [];

	/**
	 * Merge savedData and userData
	 */
	protected $tempData = null;

	/**
	 * The base directory to look in for our Views.
	 *
	 * @var string
	 */
	protected $viewPath;

	/**
	 * The render variables
	 *
	 * @var array
	 */
	protected $renderVars = [];

	/**
	 * Instance of FileLocator for when
	 * we need to attempt to find a view
	 * that's not in standard place.
	 *
<<<<<<< HEAD
	 * @var FileLocator
=======
	 * @var \CodeIgniter\Autoloader\FileLocator
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $loader;

	/**
	 * Logger instance.
	 *
<<<<<<< HEAD
	 * @var LoggerInterface
=======
	 * @var \CodeIgniter\Log\Logger
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $logger;

	/**
	 * Should we store performance info?
	 *
	 * @var boolean
	 */
	protected $debug = false;

	/**
	 * Cache stats about our performance here,
	 * when CI_DEBUG = true
	 *
	 * @var array
	 */
	protected $performanceData = [];

	/**
<<<<<<< HEAD
	 * @var ViewConfig
=======
	 * @var \Config\View
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $config;

	/**
	 * Whether data should be saved between renders.
	 *
	 * @var boolean
	 */
	protected $saveData;

	/**
	 * Number of loaded views
	 *
	 * @var integer
	 */
	protected $viewsCount = 0;

	/**
	 * The name of the layout being used, if any.
	 * Set by the `extend` method used within views.
	 *
<<<<<<< HEAD
	 * @var string|null
=======
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $layout;

	/**
	 * Holds the sections and their data.
	 *
	 * @var array
	 */
	protected $sections = [];

	/**
	 * The name of the current section being rendered,
	 * if any.
	 *
<<<<<<< HEAD
	 * @var string|null
	 */
	protected $currentSection;

	/**
	 * Constructor
	 *
	 * @param ViewConfig       $config
	 * @param string|null      $viewPath
	 * @param FileLocator|null $loader
	 * @param boolean|null     $debug
	 * @param LoggerInterface  $logger
	 */
	public function __construct(ViewConfig $config, string $viewPath = null, FileLocator $loader = null, bool $debug = null, LoggerInterface $logger = null)
	{
		$this->config   = $config;
		$this->viewPath = rtrim($viewPath, '\\/ ') . DIRECTORY_SEPARATOR;
		$this->loader   = $loader ?? Services::locator();
		$this->logger   = $logger ?? Services::logger();
		$this->debug    = $debug ?? CI_DEBUG;
		$this->saveData = (bool) $config->saveData;
	}

=======
	 * @var string
	 */
	protected $currentSection;

	//--------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @param \Config\View    $config
	 * @param string          $viewPath
	 * @param mixed           $loader
	 * @param boolean         $debug
	 * @param LoggerInterface $logger
	 */
	public function __construct($config, string $viewPath = null, $loader = null, bool $debug = null, LoggerInterface $logger = null)
	{
		$this->config   = $config;
		$this->viewPath = rtrim($viewPath, '/ ') . '/';
		$this->loader   = is_null($loader) ? Services::locator() : $loader;
		$this->logger   = is_null($logger) ? Services::logger() : $logger;
		$this->debug    = is_null($debug) ? CI_DEBUG : $debug;
		$this->saveData = $config->saveData ?? null;
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Builds the output based upon a file name and any
	 * data that has already been set.
	 *
	 * Valid $options:
<<<<<<< HEAD
	 *  - cache      Number of seconds to cache for
	 *  - cache_name Name to use for cache
	 *
	 * @param string       $view     File name of the view source
	 * @param array|null   $options  Reserved for 3rd-party uses since
	 *                               it might be needed to pass additional info
	 *                               to other template engines.
	 * @param boolean|null $saveData If true, saves data for subsequent calls,
	 *                               if false, cleans the data after displaying,
	 *                               if null, uses the config setting.
=======
	 *     - cache 		number of seconds to cache for
	 *  - cache_name	Name to use for cache
	 *
	 * @param string  $view
	 * @param array   $options
	 * @param boolean $saveData
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return string
	 */
	public function render(string $view, array $options = null, bool $saveData = null): string
	{
		$this->renderVars['start'] = microtime(true);

		// Store the results here so even if
		// multiple views are called in a view, it won't
		// clean it unless we mean it to.
<<<<<<< HEAD
		$saveData                    = $saveData ?? $this->saveData;
		$fileExt                     = pathinfo($view, PATHINFO_EXTENSION);
		$realPath                    = empty($fileExt) ? $view . '.php' : $view; // allow Views as .html, .tpl, etc (from CI3)
		$this->renderVars['view']    = $realPath;
		$this->renderVars['options'] = $options ?? [];
=======
		if (is_null($saveData))
		{
			$saveData = $this->saveData;
		}
		$fileExt                     = pathinfo($view, PATHINFO_EXTENSION);
		$realPath                    = empty($fileExt) ? $view . '.php' : $view; // allow Views as .html, .tpl, etc (from CI3)
		$this->renderVars['view']    = $realPath;
		$this->renderVars['options'] = $options;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// Was it cached?
		if (isset($this->renderVars['options']['cache']))
		{
<<<<<<< HEAD
			$cacheName = $this->renderVars['options']['cache_name'] ?? str_replace('.php', '', $this->renderVars['view']);
			$cacheName = str_replace(['\\', '/'], '', $cacheName);

			$this->renderVars['cacheName'] = $cacheName;
=======
			$this->renderVars['cacheName'] = $this->renderVars['options']['cache_name'] ?? str_replace('.php', '', $this->renderVars['view']);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

			if ($output = cache($this->renderVars['cacheName']))
			{
				$this->logPerformance($this->renderVars['start'], microtime(true), $this->renderVars['view']);
<<<<<<< HEAD

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				return $output;
			}
		}

		$this->renderVars['file'] = $this->viewPath . $this->renderVars['view'];

		if (! is_file($this->renderVars['file']))
		{
			$this->renderVars['file'] = $this->loader->locateFile($this->renderVars['view'], 'Views', empty($fileExt) ? 'php' : $fileExt);
		}

		// locateFile will return an empty string if the file cannot be found.
		if (empty($this->renderVars['file']))
		{
			throw ViewException::forInvalidFile($this->renderVars['view']);
		}

		// Make our view data available to the view.
<<<<<<< HEAD
		$this->tempData = $this->tempData ?? $this->data;

		if ($saveData)
		{
			$this->data = $this->tempData;
		}

		// Save current vars
		$renderVars = $this->renderVars;

		$output = (function (): string {
			extract($this->tempData);
			ob_start();
			include $this->renderVars['file'];
			return ob_get_clean() ?: '';
		})();

		// Get back current vars
		$this->renderVars = $renderVars;
=======

		if (is_null($this->tempData))
		{
			$this->tempData = $this->data;
		}

		extract($this->tempData);

		if ($saveData)
		{
			$this->data = $this->tempData;
		}

		ob_start();
		include($this->renderVars['file']); // PHP will be processed
		$output = ob_get_contents();
		@ob_end_clean();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		// When using layouts, the data has already been stored
		// in $this->sections, and no other valid output
		// is allowed in $output so we'll overwrite it.
		if (! is_null($this->layout) && empty($this->currentSection))
		{
			$layoutView   = $this->layout;
			$this->layout = null;
<<<<<<< HEAD
			// Save current vars
			$renderVars = $this->renderVars;
			$output     = $this->render($layoutView, $options, $saveData);
			// Get back current vars
			$this->renderVars = $renderVars;
=======
			$output       = $this->render($layoutView, $options, $saveData);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		$this->logPerformance($this->renderVars['start'], microtime(true), $this->renderVars['view']);

<<<<<<< HEAD
		if (($this->debug && (! isset($options['debug']) || $options['debug'] === true))
			&& in_array('CodeIgniter\Filters\DebugToolbar', service('filters')->getFiltersClass()['after'], true)
		)
		{
			$toolbarCollectors = config(Toolbar::class)->collectors;

			if (in_array(Views::class, $toolbarCollectors, true))
			{
				// Clean up our path names to make them a little cleaner
				$this->renderVars['file'] = clean_path($this->renderVars['file']);
				$this->renderVars['file'] = ++$this->viewsCount . ' ' . $this->renderVars['file'];

				$output = '<!-- DEBUG-VIEW START ' . $this->renderVars['file'] . ' -->' . PHP_EOL
=======
		if ($this->debug && (! isset($options['debug']) || $options['debug'] === true))
		{
			$toolbarCollectors = config(\Config\Toolbar::class)->collectors;

			if (in_array(\CodeIgniter\Debug\Toolbar\Collectors\Views::class, $toolbarCollectors))
			{
				// Clean up our path names to make them a little cleaner
				foreach (['APPPATH', 'SYSTEMPATH', 'ROOTPATH'] as $path)
				{
					if (strpos($this->renderVars['file'], constant($path)) === 0)
					{
						$this->renderVars['file'] = str_replace(constant($path), $path . '/', $this->renderVars['file']);
						break;
					}
				}
				$this->renderVars['file'] = ++$this->viewsCount . ' ' . $this->renderVars['file'];
				$output                   = '<!-- DEBUG-VIEW START ' . $this->renderVars['file'] . ' -->' . PHP_EOL
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					. $output . PHP_EOL
					. '<!-- DEBUG-VIEW ENDED ' . $this->renderVars['file'] . ' -->' . PHP_EOL;
			}
		}

		// Should we cache?
		if (isset($this->renderVars['options']['cache']))
		{
			cache()->save($this->renderVars['cacheName'], $output, (int) $this->renderVars['options']['cache']);
		}

		$this->tempData = null;

		return $output;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Builds the output based upon a string and any
	 * data that has already been set.
	 * Cache does not apply, because there is no "key".
	 *
<<<<<<< HEAD
	 * @param string       $view     The view contents
	 * @param array|null   $options  Reserved for 3rd-party uses since
	 *                               it might be needed to pass additional info
	 *                               to other template engines.
	 * @param boolean|null $saveData If true, saves data for subsequent calls,
	 *                               if false, cleans the data after displaying,
	 *                               if null, uses the config setting.
=======
	 * @param string  $view     The view contents
	 * @param array   $options  Reserved for 3rd-party uses since
	 *                          it might be needed to pass additional info
	 *                          to other template engines.
	 * @param boolean $saveData If true, will save data for use with any other calls,
	 *                          if false, will clean the data after displaying the view,
	 *                             if not specified, use the config setting.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return string
	 */
	public function renderString(string $view, array $options = null, bool $saveData = null): string
	{
<<<<<<< HEAD
		$start          = microtime(true);
		$saveData       = $saveData ?? $this->saveData;
		$this->tempData = $this->tempData ?? $this->data;
=======
		$start = microtime(true);

		if (is_null($saveData))
		{
			$saveData = $this->saveData;
		}

		if (is_null($this->tempData))
		{
			$this->tempData = $this->data;
		}

		extract($this->tempData);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		if ($saveData)
		{
			$this->data = $this->tempData;
		}

<<<<<<< HEAD
		$output = (function (string $view): string {
			extract($this->tempData);
			ob_start();
			eval('?>' . $view);
			return ob_get_clean() ?: '';
		})($view);

		$this->logPerformance($start, microtime(true), $this->excerpt($view));
=======
		ob_start();
		$incoming = '?>' . $view;
		eval($incoming);
		$output = ob_get_contents();
		@ob_end_clean();

		$this->logPerformance($start, microtime(true), $this->excerpt($view));

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$this->tempData = null;

		return $output;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Extract first bit of a long string and add ellipsis
	 *
	 * @param  string  $string
	 * @param  integer $length
	 * @return string
	 */
	public function excerpt(string $string, int $length = 20): string
	{
		return (strlen($string) > $length) ? substr($string, 0, $length - 3) . '...' : $string;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Sets several pieces of view data at once.
	 *
	 * @param array  $data
	 * @param string $context The context to escape it for: html, css, js, url
	 *                        If null, no escaping will happen
	 *
	 * @return RendererInterface
	 */
	public function setData(array $data = [], string $context = null): RendererInterface
	{
<<<<<<< HEAD
		if ($context)
=======
		if (! empty($context))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$data = \esc($data, $context);
		}

		$this->tempData = $this->tempData ?? $this->data;
		$this->tempData = array_merge($this->tempData, $data);

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Sets a single piece of view data.
	 *
	 * @param string $name
	 * @param mixed  $value
	 * @param string $context The context to escape it for: html, css, js, url
	 *                        If null, no escaping will happen
	 *
	 * @return RendererInterface
	 */
	public function setVar(string $name, $value = null, string $context = null): RendererInterface
	{
<<<<<<< HEAD
		if ($context)
=======
		if (! empty($context))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$value = \esc($value, $context);
		}

		$this->tempData        = $this->tempData ?? $this->data;
		$this->tempData[$name] = $value;

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Removes all of the view data from the system.
	 *
	 * @return RendererInterface
	 */
	public function resetData(): RendererInterface
	{
		$this->data = [];

		return $this;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Returns the current data that will be displayed in the view.
	 *
	 * @return array
	 */
	public function getData(): array
	{
<<<<<<< HEAD
		return $this->tempData ?? $this->data;
	}

=======
		return is_null($this->tempData) ? $this->data : $this->tempData;
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Specifies that the current view should extend an existing layout.
	 *
	 * @param string $layout
	 *
	 * @return void
	 */
	public function extend(string $layout)
	{
		$this->layout = $layout;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Starts holds content for a section within the layout.
	 *
	 * @param string $name
	 */
	public function section(string $name)
	{
		$this->currentSection = $name;

		ob_start();
	}

<<<<<<< HEAD
	/**
	 * @throws RuntimeException
=======
	//--------------------------------------------------------------------

	/**
	 *
	 *
	 * @throws \Laminas\Escaper\Exception\RuntimeException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function endSection()
	{
		$contents = ob_get_clean();

		if (empty($this->currentSection))
		{
<<<<<<< HEAD
			throw new RuntimeException('View themes, no current section.');
=======
			throw new \RuntimeException('View themes, no current section.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		// Ensure an array exists so we can store multiple entries for this.
		if (! array_key_exists($this->currentSection, $this->sections))
		{
			$this->sections[$this->currentSection] = [];
		}
		$this->sections[$this->currentSection][] = $contents;

		$this->currentSection = null;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Renders a section's contents.
	 *
	 * @param string $sectionName
	 */
	public function renderSection(string $sectionName)
	{
		if (! isset($this->sections[$sectionName]))
		{
			echo '';

			return;
		}

		foreach ($this->sections[$sectionName] as $key => $contents)
		{
			echo $contents;
			unset($this->sections[$sectionName][$key]);
		}
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Used within layout views to include additional views.
	 *
	 * @param string     $view
	 * @param array|null $options
<<<<<<< HEAD
	 * @param boolean    $saveData
=======
	 * @param null       $saveData
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return string
	 */
	public function include(string $view, array $options = null, $saveData = true): string
	{
		return $this->render($view, $options, $saveData);
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Returns the performance data that might have been collected
	 * during the execution. Used primarily in the Debug Toolbar.
	 *
	 * @return array
	 */
	public function getPerformanceData(): array
	{
		return $this->performanceData;
	}

<<<<<<< HEAD
=======
	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Logs performance data for rendering a view.
	 *
	 * @param float  $start
	 * @param float  $end
	 * @param string $view
<<<<<<< HEAD
	 *
	 * @return void
	 */
	protected function logPerformance(float $start, float $end, string $view)
	{
		if ($this->debug)
		{
			$this->performanceData[] = [
				'start' => $start,
				'end'   => $end,
				'view'  => $view,
			];
		}
	}
=======
	 */
	protected function logPerformance(float $start, float $end, string $view)
	{
		if (! $this->debug)
		{
			return;
		}

		$this->performanceData[] = [
			'start' => $start,
			'end'   => $end,
			'view'  => $view,
		];
	}

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
