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

namespace CodeIgniter\HTTP\Exceptions;

<<<<<<< HEAD
=======
use CodeIgniter\Exceptions\ExceptionInterface;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use CodeIgniter\Exceptions\FrameworkException;

/**
 * Things that can go wrong with HTTP
 */
<<<<<<< HEAD
class HTTPException extends FrameworkException
{
	/**
	 * For CurlRequest
	 *
	 * @return HTTPException
=======
class HTTPException extends FrameworkException implements ExceptionInterface
{

	/**
	 * For CurlRequest
	 *
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @codeCoverageIgnore
	 */
	public static function forMissingCurl()
	{
		return new static(lang('HTTP.missingCurl'));
	}

	/**
	 * For CurlRequest
	 *
	 * @param string $cert
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forSSLCertNotFound(string $cert)
	{
		return new static(lang('HTTP.sslCertNotFound', [$cert]));
	}

	/**
	 * For CurlRequest
	 *
	 * @param string $key
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidSSLKey(string $key)
	{
		return new static(lang('HTTP.invalidSSLKey', [$key]));
	}

	/**
	 * For CurlRequest
	 *
	 * @param string $errorNum
	 * @param string $error
	 *
	 * @return             \CodeIgniter\HTTP\Exceptions\HTTPException
	 *
	 * Not testable with travis-ci; we over-ride the method which triggers it
	 * @codeCoverageIgnore
	 */
	public static function forCurlError(string $errorNum, string $error)
	{
		return new static(lang('HTTP.curlError', [$errorNum, $error]));
	}

	/**
	 * For IncomingRequest
	 *
	 * @param string $type
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidNegotiationType(string $type)
	{
		return new static(lang('HTTP.invalidNegotiationType', [$type]));
	}

	/**
	 * For Message
	 *
	 * @param string $protocols
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidHTTPProtocol(string $protocols)
	{
		return new static(lang('HTTP.invalidHTTPProtocol', [$protocols]));
	}

	/**
	 * For Negotiate
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forEmptySupportedNegotiations()
	{
		return new static(lang('HTTP.emptySupportedNegotiations'));
	}

	/**
	 * For RedirectResponse
	 *
	 * @param string $route
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidRedirectRoute(string $route)
	{
		return new static(lang('HTTP.invalidRoute', [$route]));
	}

	/**
	 * For Response
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forMissingResponseStatus()
	{
		return new static(lang('HTTP.missingResponseStatus'));
	}

	/**
	 * For Response
	 *
	 * @param integer $code
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidStatusCode(int $code)
	{
		return new static(lang('HTTP.invalidStatusCode', [$code]));
	}

	/**
	 * For Response
	 *
	 * @param integer $code
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forUnkownStatusCode(int $code)
	{
		return new static(lang('HTTP.unknownStatusCode', [$code]));
	}

	/**
	 * For URI
	 *
	 * @param string $uri
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forUnableToParseURI(string $uri)
	{
		return new static(lang('HTTP.cannotParseURI', [$uri]));
	}

	/**
	 * For URI
	 *
	 * @param integer $segment
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forURISegmentOutOfRange(int $segment)
	{
		return new static(lang('HTTP.segmentOutOfRange', [$segment]));
	}

	/**
	 * For URI
	 *
	 * @param integer $port
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidPort(int $port)
	{
		return new static(lang('HTTP.invalidPort', [$port]));
	}

	/**
	 * For URI
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forMalformedQueryString()
	{
		return new static(lang('HTTP.malformedQueryString'));
	}

	/**
	 * For Uploaded file move
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forAlreadyMoved()
	{
		return new static(lang('HTTP.alreadyMoved'));
	}

	/**
	 * For Uploaded file move
	 *
	 * @param string|null $path
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forInvalidFile(string $path = null)
	{
		return new static(lang('HTTP.invalidFile'));
	}

	/**
	 * For Uploaded file move
	 *
	 * @param string $source
	 * @param string $target
	 * @param string $error
	 *
<<<<<<< HEAD
	 * @return HTTPException
=======
	 * @return \CodeIgniter\HTTP\Exceptions\HTTPException
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public static function forMoveFailed(string $source, string $target, string $error)
	{
		return new static(lang('HTTP.moveFailed', [$source, $target, $error]));
	}

<<<<<<< HEAD
	/**
	 * For Invalid SameSite attribute setting
	 *
	 * @param string $samesite
	 *
	 * @return HTTPException
	 */
	public static function forInvalidSameSiteSetting(string $samesite)
	{
		return new static(lang('Security.invalidSameSiteSetting', [$samesite]));
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
