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

namespace CodeIgniter\Debug\Toolbar\Collectors;

use CodeIgniter\View\RendererInterface;
use Config\Services;

/**
 * Views collector
 */
class Events extends BaseCollector
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Whether this collector has data that can
	 * be displayed in the Timeline.
	 *
	 * @var boolean
	 */
	protected $hasTimeline = false;

	/**
	 * Whether this collector needs to display
	 * content in a tab or not.
	 *
	 * @var boolean
	 */
	protected $hasTabContent = true;

	/**
	 * Whether this collector has data that
	 * should be shown in the Vars tab.
	 *
	 * @var boolean
	 */
	protected $hasVarData = false;

	/**
	 * The 'title' of this Collector.
	 * Used to name things in the toolbar HTML.
	 *
	 * @var string
	 */
	protected $title = 'Events';

	/**
	 * Instance of the Renderer service
	 *
	 * @var RendererInterface
	 */
	protected $viewer;

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->viewer = Services::renderer();
	}

	//--------------------------------------------------------------------

	/**
	 * Child classes should implement this to return the timeline data
	 * formatted for correct usage.
	 *
	 * @return array
	 */
	protected function formatTimelineData(): array
	{
		$data = [];

<<<<<<< HEAD
		$rows = $this->viewer->getPerformanceData(); // @phpstan-ignore-line
=======
		$rows = $this->viewer->getPerformanceData();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		foreach ($rows as $info)
		{
			$data[] = [
				'name'      => 'View: ' . $info['view'],
				'component' => 'Views',
				'start'     => $info['start'],
				'duration'  => $info['end'] - $info['start'],
			];
		}

		return $data;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the data of this collector to be formatted in the toolbar
	 *
	 * @return array
	 */
	public function display(): array
	{
		$data = [
			'events' => [],
		];

		foreach (\CodeIgniter\Events\Events::getPerformanceLogs() as $row)
		{
			$key = $row['event'];

			if (! array_key_exists($key, $data['events']))
			{
				$data['events'][$key] = [
					'event'    => $key,
<<<<<<< HEAD
					'duration' => ($row['end'] - $row['start']) * 1000,
=======
					'duration' => number_format(($row['end'] - $row['start']) * 1000, 2),
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					'count'    => 1,
				];

				continue;
			}

<<<<<<< HEAD
			$data['events'][$key]['duration'] += ($row['end'] - $row['start']) * 1000;
			$data['events'][$key]['count']++;
		}

		foreach ($data['events'] as &$row)
		{
			$row['duration'] = number_format($row['duration'], 2);
		}

=======
			$data['events'][$key]['duration'] += number_format(($row['end'] - $row['start']) * 1000, 2);
			$data['events'][$key]['count']++;
		}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		return $data;
	}

	//--------------------------------------------------------------------

	/**
	 * Gets the "badge" value for the button.
	 *
	 * @return integer
	 */
	public function getBadgeValue(): int
	{
		return count(\CodeIgniter\Events\Events::getPerformanceLogs());
	}

	//--------------------------------------------------------------------

	/**
	 * Display the icon.
	 *
	 * Icon from https://icons8.com - 1em package
	 *
	 * @return string
	 */
	public function icon(): string
	{
		return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEASURBVEhL7ZXNDcIwDIVTsRBH1uDQDdquUA6IM1xgCA6MwJUN2hk6AQzAz0vl0ETUxC5VT3zSU5w81/mRMGZysixbFEVR0jSKNt8geQU9aRpFmp/keX6AbjZ5oB74vsaN5lSzA4tLSjpBFxsjeSuRy4d2mDdQTWU7YLbXTNN05mKyovj5KL6B7q3hoy3KwdZxBlT+Ipz+jPHrBqOIynZgcZonoukb/0ckiTHqNvDXtXEAaygRbaB9FvUTjRUHsIYS0QaSp+Dw6wT4hiTmYHOcYZsdLQ2CbXa4ftuuYR4x9vYZgdb4vsFYUdmABMYeukK9/SUme3KMFQ77+Yfzh8eYF8+orDuDWU5LAAAAAElFTkSuQmCC';
	}
}
