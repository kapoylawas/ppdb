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

namespace CodeIgniter\Test;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Testable response from a controller
 */
<<<<<<< HEAD
class ControllerResponse
{
	/**
	 * The request.
	 *
	 * @var RequestInterface
=======
class ControllerResponse {

	/**
	 * The request.
	 *
	 * @var \CodeIgniter\HTTP\IncomingRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $request;

	/**
	 * The response.
	 *
<<<<<<< HEAD
	 * @var ResponseInterface
=======
	 * @var \CodeIgniter\HTTP\Response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $response;

	/**
	 * The message payload.
	 *
	 * @var string
	 */
	protected $body;

	/**
	 * DOM for the body.
	 *
	 * @var DOMParser
	 */
	protected $dom;

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->dom = new DOMParser();
	}

	//--------------------------------------------------------------------
	// Getters / Setters
	//--------------------------------------------------------------------

	/**
	 * Set the body & DOM.
	 *
	 * @param string $body
	 *
	 * @return $this
	 */
	public function setBody(string $body)
	{
		$this->body = $body;

		if (! empty($body))
		{
			$this->dom = $this->dom->withString($body);
		}

		return $this;
	}

	/**
	 * Retrieve the body.
	 *
	 * @return string
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Set the request.
	 *
<<<<<<< HEAD
	 * @param RequestInterface $request
=======
	 * @param \CodeIgniter\HTTP\RequestInterface $request
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return $this
	 */
	public function setRequest(RequestInterface $request)
	{
		$this->request = $request;

		return $this;
	}

	/**
	 * Set the response.
	 *
<<<<<<< HEAD
	 * @param ResponseInterface $response
=======
	 * @param \CodeIgniter\HTTP\ResponseInterface $response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return $this
	 */
	public function setResponse(ResponseInterface $response)
	{
		$this->response = $response;

		$this->setBody($response->getBody() ?? '');

		return $this;
	}

	/**
	 * Request accessor.
	 *
<<<<<<< HEAD
	 * @return RequestInterface
=======
	 * @return \CodeIgniter\HTTP\IncomingRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function request()
	{
		return $this->request;
	}

	/**
	 * Response accessor.
	 *
<<<<<<< HEAD
	 * @return ResponseInterface
=======
	 * @return \CodeIgniter\HTTP\Response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function response()
	{
		return $this->response;
	}

	//--------------------------------------------------------------------
	// Simple Response Checks
	//--------------------------------------------------------------------

	/**
	 * Boils down the possible responses into a boolean valid/not-valid
	 * response type.
	 *
	 * @return boolean
	 */
	public function isOK(): bool
	{
		// Only 200 and 300 range status codes
		// are considered valid.
		if ($this->response->getStatusCode() >= 400 || $this->response->getStatusCode() < 200)
		{
			return false;
		}

		// Empty bodies are not considered valid.
		if (empty($this->response->getBody()))
		{
			return false;
		}

		return true;
	}

	/**
<<<<<<< HEAD
	 * Returns whether or not the Response was a redirect or RedirectResponse
=======
	 * Returns whether or not the Response was a redirect response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return boolean
	 */
	public function isRedirect(): bool
	{
<<<<<<< HEAD
		return $this->response instanceof RedirectResponse
			|| $this->response->hasHeader('Location')
			|| $this->response->hasHeader('Refresh');
=======
		return $this->response instanceof RedirectResponse;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------
	// Utility
	//--------------------------------------------------------------------

	/**
	 * Forward any unrecognized method calls to our DOMParser instance.
	 *
	 * @param  string $function Method name
	 * @param  mixed  $params   Any method parameters
	 * @return mixed
	 */
	public function __call($function, $params)
	{
		if (method_exists($this->dom, $function))
		{
			return $this->dom->{$function}(...$params);
		}
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
