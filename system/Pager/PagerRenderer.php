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

namespace CodeIgniter\Pager;

<<<<<<< HEAD
use CodeIgniter\HTTP\URI;

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
/**
 * Class PagerRenderer
 *
 * This class is passed to the view that describes the pagination,
 * and is used to get the link information and provide utility
 * methods needed to work with pagination.
<<<<<<< HEAD
 */
class PagerRenderer
{
=======
 *
 * @package CodeIgniter\Pager
 */
class PagerRenderer
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * First page number.
	 *
	 * @var integer
	 */
	protected $first;
<<<<<<< HEAD

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Last page number.
	 *
	 * @var integer
	 */
	protected $last;
<<<<<<< HEAD

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Current page number.
	 *
	 * @var integer
	 */
	protected $current;
<<<<<<< HEAD

	/**
	 * Total number of items.
=======
	/**
	 * Total number of pages? unused?
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @var integer
	 */
	protected $total;
<<<<<<< HEAD

	/**
	 * Total number of pages.
	 *
	 * @var integer
	 */
	protected $pageCount;

	/**
	 * URI base for pagination links
	 *
	 * @var URI
	 */
	protected $uri;

=======
		/**
		 * Page count?
		 *
		 * @var integer
		 */
	protected $pageCount;
	/**
	 * URI base for pagination links
	 *
	 * @var integer
	 */
	protected $uri;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Segment number used for pagination.
	 *
	 * @var integer
	 */
	protected $segment;
<<<<<<< HEAD

	/**
	 * Name of $_GET parameter
	 *
	 * @var string
=======
	/**
	 * Name of $_GET parameter
	 *
	 * @var integer
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $pageSelector;

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
	 * @param array $details
	 */
	public function __construct(array $details)
	{
		$this->first        = 1;
		$this->last         = $details['pageCount'];
		$this->current      = $details['currentPage'];
		$this->total        = $details['total'];
		$this->uri          = $details['uri'];
		$this->pageCount    = $details['pageCount'];
		$this->segment      = $details['segment'] ?? 0;
		$this->pageSelector = $details['pageSelector'] ?? 'page';
	}

	//--------------------------------------------------------------------

	/**
	 * Sets the total number of links that should appear on either
	 * side of the current page. Adjusts the first and last counts
	 * to reflect it.
	 *
	 * @param integer|null $count
	 *
	 * @return PagerRenderer
	 */
	public function setSurroundCount(int $count = null)
	{
		$this->updatePages($count);

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Checks to see if there is a "previous" page before our "first" page.
	 *
	 * @return boolean
	 */
	public function hasPrevious(): bool
	{
		return $this->first > 1;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns a URL to the "previous" page. The previous page is NOT the
	 * page before the current page, but is the page just before the
	 * "first" page.
	 *
	 * You MUST call hasPrevious() first, or this value may be invalid.
	 *
	 * @return string|null
	 */
	public function getPrevious()
	{
		if (! $this->hasPrevious())
		{
			return null;
		}

		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, $this->first - 1);
		}
		else
		{
			$uri->setSegment($this->segment, $this->first - 1);
		}

		return (string) $uri;
	}

	//--------------------------------------------------------------------

	/**
	 * Checks to see if there is a "next" page after our "last" page.
	 *
	 * @return boolean
	 */
	public function hasNext(): bool
	{
		return $this->pageCount > $this->last;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns a URL to the "next" page. The next page is NOT, the
	 * page after the current page, but is the page that follows the
	 * "last" page.
	 *
	 * You MUST call hasNext() first, or this value may be invalid.
	 *
	 * @return string|null
	 */
	public function getNext()
	{
		if (! $this->hasNext())
		{
			return null;
		}

		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, $this->last + 1);
		}
		else
		{
			$uri->setSegment($this->segment, $this->last + 1);
		}

		return (string) $uri;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the URI of the first page.
	 *
	 * @return string
	 */
	public function getFirst(): string
	{
		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, 1);
		}
		else
		{
			$uri->setSegment($this->segment, 1);
		}

		return (string) $uri;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the URI of the last page.
	 *
	 * @return string
	 */
	public function getLast(): string
	{
		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, $this->pageCount);
		}
		else
		{
			$uri->setSegment($this->segment, $this->pageCount);
		}

		return (string) $uri;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the URI of the current page.
	 *
	 * @return string
	 */
	public function getCurrent(): string
	{
		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, $this->current);
		}
		else
		{
			$uri->setSegment($this->segment, $this->current);
		}

		return (string) $uri;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns an array of links that should be displayed. Each link
	 * is represented by another array containing of the URI the link
	 * should go to, the title (number) of the link, and a boolean
	 * value representing whether this link is active or not.
	 *
	 * @return array
	 */
	public function links(): array
	{
		$links = [];

		$uri = clone $this->uri;

		for ($i = $this->first; $i <= $this->last; $i ++)
		{
			$links[] = [
				'uri'    => (string) ($this->segment === 0 ? $uri->addQuery($this->pageSelector, $i) : $uri->setSegment($this->segment, $i)),
				'title'  => (int) $i,
				'active' => ($i === $this->current),
			];
		}

		return $links;
	}

	//--------------------------------------------------------------------

	/**
	 * Updates the first and last pages based on $surroundCount,
	 * which is the number of links surrounding the active page
	 * to show.
	 *
	 * @param integer|null $count The new "surroundCount"
	 */
	protected function updatePages(int $count = null)
	{
		if (is_null($count))
		{
			return;
		}

		$this->first = $this->current - $count > 0 ? (int) ($this->current - $count) : 1;
		$this->last  = $this->current + $count <= $this->pageCount ? (int) ($this->current + $count) : (int) $this->pageCount;
	}

	//--------------------------------------------------------------------

	/**
	 * Checks to see if there is a "previous" page before our "first" page.
	 *
	 * @return boolean
	 */
	public function hasPreviousPage(): bool
	{
		return $this->current > 1;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns a URL to the "previous" page.
	 *
	 * You MUST call hasPreviousPage() first, or this value may be invalid.
	 *
	 * @return string|null
	 */
	public function getPreviousPage()
	{
		if (! $this->hasPreviousPage())
		{
			return null;
		}

		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, $this->current - 1);
		}
		else
		{
			$uri->setSegment($this->segment, $this->current - 1);
		}

		return (string) $uri;
	}

	//--------------------------------------------------------------------

	/**
	 * Checks to see if there is a "next" page after our "last" page.
	 *
	 * @return boolean
	 */
	public function hasNextPage(): bool
	{
		return $this->current < $this->last;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns a URL to the "next" page.
	 *
	 * You MUST call hasNextPage() first, or this value may be invalid.
	 *
	 * @return string|null
	 */
	public function getNextPage()
	{
		if (! $this->hasNextPage())
		{
			return null;
		}

		$uri = clone $this->uri;

		if ($this->segment === 0)
		{
			$uri->addQuery($this->pageSelector, $this->current + 1);
		}
		else
		{
			$uri->setSegment($this->segment, $this->current + 1);
		}

		return (string) $uri;
	}
<<<<<<< HEAD

	/**
	 * Returns the page number of the first page.
	 *
	 * @return integer
	 */
	public function getFirstPageNumber(): int
	{
		return $this->first;
	}

	/**
	 * Returns the page number of the current page.
	 *
	 * @return integer
	 */
	public function getCurrentPageNumber(): int
	{
		return $this->current;
	}

	/**
	 * Returns the page number of the last page.
	 *
	 * @return integer
	 */
	public function getLastPageNumber(): int
	{
		return $this->last;
	}

	/**
	 * Returns the previous page number.
	 *
	 * @return integer|null
	 */
	public function getPreviousPageNumber(): ?int
	{
		return ($this->current === 1) ? null : $this->current - 1;
	}

	/**
	 * Returns the next page number.
	 *
	 * @return integer|null
	 */
	public function getNextPageNumber(): ?int
	{
		return ($this->current === $this->pageCount) ? null : $this->current + 1;
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
