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
 *
 * This filter is not intended to be used from the command line.
 *
 * @codeCoverageIgnore
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

namespace CodeIgniter\Filters;

<<<<<<< HEAD
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
=======
use CodeIgniter\HTTP\RequestInterface;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Security\Exceptions\SecurityException;
use Config\Services;

/**
 * CSRF filter.
 *
 * This filter is not intended to be used from the command line.
 *
 * @codeCoverageIgnore
 */
class CSRF implements FilterInterface
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
<<<<<<< HEAD
	 * @param RequestInterface|IncomingRequest $request
	 * @param array|null                       $arguments
	 *
	 * @return mixed
	 * @throws SecurityException
=======
	 * @param RequestInterface|\CodeIgniter\HTTP\IncomingRequest $request
	 * @param array|null                                         $arguments
	 *
	 * @return mixed
	 * @throws \CodeIgniter\Security\Exceptions\SecurityException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		if ($request->isCLI())
		{
			return;
		}

		$security = Services::security();

		try
		{
<<<<<<< HEAD
			$security->verify($request);
		}
		catch (SecurityException $e)
		{
			if ($security->shouldRedirect() && ! $request->isAJAX())
=======
			$security->CSRFVerify($request);
		}
		catch (SecurityException $e)
		{
			if (config('App')->CSRFRedirect && ! $request->isAJAX())
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			{
				return redirect()->back()->with('error', $e->getMessage());
			}

			throw $e;
		}
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD
	/**
	 * We don't have anything to do here.
	 *
	 * @param RequestInterface|IncomingRequest             $request
	 * @param ResponseInterface|Response $response
	 * @param array|null                                   $arguments
=======

	/**
	 * We don't have anything to do here.
	 *
	 * @param RequestInterface|\CodeIgniter\HTTP\IncomingRequest $request
	 * @param ResponseInterface|\CodeIgniter\HTTP\Response       $response
	 * @param array|null                                         $arguments
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
	}

	//--------------------------------------------------------------------
}
