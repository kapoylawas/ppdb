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

namespace CodeIgniter;

<<<<<<< HEAD
use CodeIgniter\HTTP\Exceptions\HTTPException;
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Validation\Exceptions\ValidationException;
use CodeIgniter\Validation\Validation;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class Controller
<<<<<<< HEAD
 */
class Controller
{
	/**
	 * Helpers that will be automatically loaded on class instantiation.
=======
 *
 * @package CodeIgniter
 */
class Controller
{

	/**
	 * An array of helpers to be automatically loaded
	 * upon class instantiation.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @var array
	 */
	protected $helpers = [];

<<<<<<< HEAD
	/**
	 * Instance of the main Request object.
	 *
	 * @var RequestInterface
=======
	//--------------------------------------------------------------------

	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $request;

	/**
	 * Instance of the main response object.
	 *
<<<<<<< HEAD
	 * @var ResponseInterface
=======
	 * @var HTTP\Response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $response;

	/**
	 * Instance of logger to use.
	 *
<<<<<<< HEAD
	 * @var LoggerInterface
=======
	 * @var Log\Logger
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $logger;

	/**
<<<<<<< HEAD
	 * Should enforce HTTPS access for all methods in this controller.
	 *
	 * @var integer Number of seconds to set HSTS header
=======
	 * Whether HTTPS access should be enforced
	 * for all methods in this controller.
	 *
	 * @var integer  Number of seconds to set HSTS header
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $forceHTTPS = 0;

	/**
<<<<<<< HEAD
	 * Once validation has been run, will hold the Validation instance.
=======
	 * Once validation has been run,
	 * will hold the Validation instance.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @var Validation
	 */
	protected $validator;

	//--------------------------------------------------------------------

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 *
	 * @throws HTTPException
=======
	 * @param RequestInterface         $request
	 * @param ResponseInterface        $response
	 * @param \Psr\Log\LoggerInterface $logger
	 *
	 * @throws \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		$this->request  = $request;
		$this->response = $response;
		$this->logger   = $logger;

		if ($this->forceHTTPS > 0)
		{
			$this->forceHTTPS($this->forceHTTPS);
		}

<<<<<<< HEAD
		// Autoload helper files.
		helper($this->helpers);
=======
		$this->loadHelpers();
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * A convenience method to use when you need to ensure that a single
	 * method is reached only via HTTPS. If it isn't, then a redirect
	 * will happen back to this method and HSTS header will be sent
	 * to have modern browsers transform requests automatically.
	 *
	 * @param integer $duration The number of seconds this link should be
	 *                          considered secure for. Only with HSTS header.
	 *                          Default value is 1 year.
	 *
<<<<<<< HEAD
	 * @throws HTTPException
=======
	 * @throws \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function forceHTTPS(int $duration = 31536000)
	{
		force_https($duration, $this->request, $this->response);
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Provides a simple way to tie into the main CodeIgniter class and
	 * tell it how long to cache the current page for.
=======
	 * Provides a simple way to tie into the main CodeIgniter class
	 * and tell it how long to cache the current page for.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @param integer $time
	 */
	protected function cachePage(int $time)
	{
		CodeIgniter::cache($time);
	}

	//--------------------------------------------------------------------

	/**
	 * Handles "auto-loading" helper files.
<<<<<<< HEAD
	 *
	 * @deprecated Use `helper` function instead of using this method.
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function loadHelpers()
	{
		if (empty($this->helpers))
		{
			return;
		}

<<<<<<< HEAD
		helper($this->helpers);
=======
		foreach ($this->helpers as $helper)
		{
			helper($helper);
		}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * A shortcut to performing validation on input data. If validation
	 * is not successful, a $errors property will be set on this class.
	 *
	 * @param array|string $rules
	 * @param array        $messages An array of custom error messages
	 *
	 * @return boolean
	 */
	protected function validate($rules, array $messages = []): bool
	{
		$this->validator = Services::validation();

		// If you replace the $rules array with the name of the group
		if (is_string($rules))
		{
			$validation = config('Validation');

			// If the rule wasn't found in the \Config\Validation, we
			// should throw an exception so the developer can find it.
			if (! isset($validation->$rules))
			{
				throw ValidationException::forRuleNotFound($rules);
			}

			// If no error message is defined, use the error message in the Config\Validation file
			if (! $messages)
			{
				$errorName = $rules . '_errors';
				$messages  = $validation->$errorName ?? [];
			}

			$rules = $validation->$rules;
		}

<<<<<<< HEAD
		return $this->validator->withRequest($this->request)->setRules($rules, $messages)->run();
	}
=======
		return $this->validator
			->withRequest($this->request)
			->setRules($rules, $messages)
			->run();
	}

	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
