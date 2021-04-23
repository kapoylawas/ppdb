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

namespace CodeIgniter\Security;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Security\Exceptions\SecurityException;
<<<<<<< HEAD
use Config\App;

/**
 * Class Security
 *
 * Provides methods that help protect your site against
 * Cross-Site Request Forgery attacks.
 */
class Security implements SecurityInterface
{
=======

/**
 * HTTP security handler.
 */
class Security
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * CSRF Hash
	 *
	 * Random hash for Cross Site Request Forgery protection cookie
	 *
<<<<<<< HEAD
	 * @var string|null
	 */
	protected $hash = null;

	/**
	 * CSRF Token Name
	 *
	 * Token name for Cross Site Request Forgery protection cookie.
	 *
	 * @var string
	 */
	protected $tokenName = 'csrf_token_name';

	/**
	 * CSRF Header Name
=======
	 * @var string
	 */
	protected $CSRFHash;

	/**
	 * CSRF Expire time
	 *
	 * Expiration time for Cross Site Request Forgery protection cookie.
	 * Defaults to two hours (in seconds).
	 *
	 * @var integer
	 */
	protected $CSRFExpire = 7200;

	/**
	 * CSRF Token name
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * Token name for Cross Site Request Forgery protection cookie.
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $headerName = 'X-CSRF-TOKEN';

	/**
	 * CSRF Cookie Name
	 *
	 * Cookie name for Cross Site Request Forgery protection cookie.
	 *
	 * @var string
	 */
	protected $cookieName = 'csrf_cookie_name';

	/**
	 * CSRF Expires
	 *
	 * Expiration time for Cross Site Request Forgery protection cookie.
	 *
	 * Defaults to two hours (in seconds).
	 *
	 * @var integer
	 */
	protected $expires = 7200;
=======
	protected $CSRFTokenName = 'CSRFToken';

	/**
	 * CSRF Header name
	 *
	 * Token name for Cross Site Request Forgery protection cookie.
	 *
	 * @var string
	 */
	protected $CSRFHeaderName = 'CSRFToken';

	/**
	 * CSRF Cookie name
	 *
	 * Cookie name for Cross Site Request Forgery protection cookie.
	 *
	 * @var string
	 */
	protected $CSRFCookieName = 'CSRFToken';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * CSRF Regenerate
	 *
<<<<<<< HEAD
	 * Regenerate CSRF Token on every request.
	 *
	 * @var boolean
	 */
	protected $regenerate = true;

	/**
	 * CSRF Redirect
	 *
	 * Redirect to previous page with error on failure.
	 *
	 * @var boolean
	 */
	protected $redirect = true;

	/**
	 * CSRF SameSite
	 *
	 * Setting for CSRF SameSite cookie token.
	 *
	 * Allowed values are: None - Lax - Strict - ''.
	 *
	 * Defaults to `Lax` as recommended in this link:
	 *
	 * @see https://portswigger.net/web-security/csrf/samesite-cookies
	 *
	 * @var string 'Lax'|'None'|'Strict'
	 */
	protected $samesite = 'Lax';
=======
	 * If true, the CSRF Token will be regenerated on every request.
	 * If false, will stay the same for the life of the cookie.
	 *
	 * @var boolean
	 */
	protected $CSRFRegenerate = true;

	/**
	 * Typically will be a forward slash
	 *
	 * @var string
	 */
	protected $cookiePath = '/';

	/**
	 * Set to .your-domain.com for site-wide cookies
	 *
	 * @var string
	 */
	protected $cookieDomain = '';

	/**
	 * Cookie will only be set if a secure HTTPS connection exists.
	 *
	 * @var boolean
	 */
	protected $cookieSecure = false;

	/**
	 * List of sanitize filename strings
	 *
	 * @var array
	 */
	public $filenameBadChars = [
		'../',
		'<!--',
		'-->',
		'<',
		'>',
		"'",
		'"',
		'&',
		'$',
		'#',
		'{',
		'}',
		'[',
		']',
		'=',
		';',
		'?',
		'%20',
		'%22',
		'%3c', // <
		'%253c', // <
		'%3e', // >
		'%0e', // >
		'%28', // (
		'%29', // )
		'%2528', // (
		'%26', // &
		'%24', // $
		'%3f', // ?
		'%3b', // ;
		'%3d',       // =
	];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Constructor.
	 *
	 * Stores our configuration and fires off the init() method to setup
	 * initial state.
	 *
	 * @param App $config
	 *
	 * @throws SecurityException
	 */
	public function __construct($config)
	{
		$security = config('Security');
		// Store CSRF-related configurations
		$this->tokenName  = $security->tokenName ?? $config->CSRFTokenName ?? $this->tokenName;
		$this->headerName = $security->headerName ?? $config->CSRFHeaderName ?? $this->headerName;
		$this->cookieName = $security->cookieName ?? $config->CSRFCookieName ?? $this->cookieName;
		$this->expires    = $security->expires ?? $config->CSRFExpire ?? $this->expires;
		$this->regenerate = $security->regenerate ?? $config->CSRFRegenerate ?? $this->regenerate;
		$this->samesite   = $security->samesite ?? $config->CSRFSameSite ?? $this->samesite;

		if (! in_array(strtolower($this->samesite), ['none', 'lax', 'strict', ''], true))
		{
			throw SecurityException::forInvalidSameSite($this->samesite);
		}

		if (isset($config->cookiePrefix))
		{
			$this->cookieName = $config->cookiePrefix . $this->cookieName;
		}

		$this->generateHash();
	}

	//--------------------------------------------------------------------

	/**
	 * CSRF Verify
	 *
	 * @param RequestInterface $request
	 *
	 * @return $this|false
	 *
	 * @throws SecurityException
	 *
	 * @deprecated Use `CodeIgniter\Security\Security::verify()` instead of using this method.
	 */
	public function CSRFVerify(RequestInterface $request)
	{
		return $this->verify($request);
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the CSRF Hash.
	 *
	 * @return string|null
	 *
	 * @deprecated Use `CodeIgniter\Security\Security::getHash()` instead of using this method.
	 */
	public function getCSRFHash(): ?string
	{
		return $this->getHash();
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the CSRF Token Name.
	 *
	 * @return string
	 *
	 * @deprecated Use `CodeIgniter\Security\Security::getTokenName()` instead of using this method.
	 */
	public function getCSRFTokenName(): string
	{
		return $this->getTokenName();
=======
	 * Security constructor.
	 *
	 * Stores our configuration and fires off the init() method to
	 * setup initial state.
	 *
	 * @param \Config\App $config
	 *
	 * @throws \Exception
	 */
	public function __construct($config)
	{
		// Store our CSRF-related settings
		$this->CSRFExpire     = $config->CSRFExpire;
		$this->CSRFTokenName  = $config->CSRFTokenName;
		$this->CSRFHeaderName = $config->CSRFHeaderName;
		$this->CSRFCookieName = $config->CSRFCookieName;
		$this->CSRFRegenerate = $config->CSRFRegenerate;

		if (isset($config->cookiePrefix))
		{
			$this->CSRFCookieName = $config->cookiePrefix . $this->CSRFCookieName;
		}

		// Store cookie-related settings
		$this->cookiePath   = $config->cookiePath;
		$this->cookieDomain = $config->cookieDomain;
		$this->cookieSecure = $config->cookieSecure;

		$this->CSRFSetHash();

		unset($config);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * CSRF Verify
	 *
	 * @param RequestInterface $request
	 *
	 * @return $this|false
<<<<<<< HEAD
	 *
	 * @throws SecurityException
	 */
	public function verify(RequestInterface $request)
	{
		// If it's not a POST request we will set the CSRF cookie.
		if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
		{
			return $this->sendCookie($request);
		}

		// Does the token exist in POST, HEADER or optionally php:://input - json data.
		if ($request->hasHeader($this->headerName) && ! empty($request->getHeader($this->headerName)->getValue()))
		{
			$tokenName = $request->getHeader($this->headerName)->getValue();
		}
		else
		{
			$json = json_decode($request->getBody());

			if (! empty($request->getBody()) && ! empty($json) && json_last_error() === JSON_ERROR_NONE)
			{
				$tokenName = $json->{$this->tokenName} ?? null;
			}
			else
			{
				$tokenName = null;
			}
		}

		$token = $_POST[$this->tokenName] ?? $tokenName;

		// Does the tokens exist in both the POST/POSTed JSON and COOKIE arrays and match?
		if (! isset($token, $_COOKIE[$this->cookieName]) || $token !== $_COOKIE[$this->cookieName])
=======
	 * @throws \Exception
	 */
	public function CSRFVerify(RequestInterface $request)
	{
		// If it's not a POST request we will set the CSRF cookie
		if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
		{
			return $this->CSRFSetCookie($request);
		}

		// Do the tokens exist in _POST, HEADER or optionally php:://input - json data
		$CSRFTokenValue = $_POST[$this->CSRFTokenName] ??
			(! is_null($request->getHeader($this->CSRFHeaderName)) && ! empty($request->getHeader($this->CSRFHeaderName)->getValue()) ?
				$request->getHeader($this->CSRFHeaderName)->getValue() :
				(! empty($request->getBody()) && ! empty($json = json_decode($request->getBody())) && json_last_error() === JSON_ERROR_NONE ?
					($json->{$this->CSRFTokenName} ?? null) :
					null));

		// Do the tokens exist in both the _POST/POSTed JSON and _COOKIE arrays?
		if (! isset($CSRFTokenValue, $_COOKIE[$this->CSRFCookieName]) || $CSRFTokenValue !== $_COOKIE[$this->CSRFCookieName]
		) // Do the tokens match?
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			throw SecurityException::forDisallowedAction();
		}

<<<<<<< HEAD
		if (isset($_POST[$this->tokenName]))
		{
			// We kill this since we're done and we don't want to pollute the POST array.
			unset($_POST[$this->tokenName]);
			$request->setGlobal('post', $_POST);
		}
		elseif (isset($json->{$this->tokenName}))
		{
			// We kill this since we're done and we don't want to pollute the JSON data.
			unset($json->{$this->tokenName});
=======
		// We kill this since we're done and we don't want to pollute the _POST array
		if (isset($_POST[$this->CSRFTokenName]))
		{
			unset($_POST[$this->CSRFTokenName]);
			$request->setGlobal('post', $_POST);
		}
		// We kill this since we're done and we don't want to pollute the JSON data
		elseif (isset($json->{$this->CSRFTokenName}))
		{
			unset($json->{$this->CSRFTokenName});
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			$request->setBody(json_encode($json));
		}

		// Regenerate on every submission?
<<<<<<< HEAD
		if ($this->regenerate)
		{
			// Nothing should last forever.
			$this->hash = null;
			unset($_COOKIE[$this->cookieName]);
		}

		$this->generateHash();
		$this->sendCookie($request);

		log_message('info', 'CSRF token verified.');
=======
		if ($this->CSRFRegenerate)
		{
			// Nothing should last forever
			$this->CSRFHash = null;
			unset($_COOKIE[$this->CSRFCookieName]);
		}

		$this->CSRFSetHash();
		$this->CSRFSetCookie($request);

		log_message('info', 'CSRF token verified');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $this;
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Returns the CSRF Hash.
	 *
	 * @return string|null
	 */
	public function getHash(): ?string
	{
		return $this->hash;
	}

	//--------------------------------------------------------------------

	/**
	 * Returns the CSRF Token Name.
	 *
	 * @return string
	 */
	public function getTokenName(): string
	{
		return $this->tokenName;
=======
	 * CSRF Set Cookie
	 *
	 * @codeCoverageIgnore
	 *
	 * @param RequestInterface|\CodeIgniter\HTTP\IncomingRequest $request
	 *
	 * @return Security|false
	 */
	public function CSRFSetCookie(RequestInterface $request)
	{
		$expire        = time() + $this->CSRFExpire;
		$secure_cookie = (bool) $this->cookieSecure;

		if ($secure_cookie && ! $request->isSecure())
		{
			return false;
		}

		setcookie(
				$this->CSRFCookieName, $this->CSRFHash, $expire, $this->cookiePath, $this->cookieDomain, $secure_cookie, true                // Enforce HTTP only cookie for security
		);

		log_message('info', 'CSRF cookie sent');

		return $this;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Returns the CSRF Header Name.
	 *
	 * @return string
	 */
	public function getHeaderName(): string
	{
		return $this->headerName;
=======
	 * Returns the current CSRF Hash.
	 *
	 * @return string
	 */
	public function getCSRFHash(): string
	{
		return $this->CSRFHash;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Returns the CSRF Cookie Name.
	 *
	 * @return string
	 */
	public function getCookieName(): string
	{
		return $this->cookieName;
=======
	 * Returns the CSRF Token Name.
	 *
	 * @return string
	 */
	public function getCSRFTokenName(): string
	{
		return $this->CSRFTokenName;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Check if CSRF cookie is expired.
	 *
	 * @return boolean
	 */
	public function isExpired(): bool
	{
		return $this->expires === 0;
	}

	//--------------------------------------------------------------------

	/**
	 * Check if request should be redirect on failure.
	 *
	 * @return boolean
	 */
	public function shouldRedirect(): bool
	{
		return $this->redirect;
=======
	 * Sets the CSRF Hash and cookie.
	 *
	 * @return string
	 * @throws \Exception
	 */
	protected function CSRFSetHash(): string
	{
		if ($this->CSRFHash === null)
		{
			// If the cookie exists we will use its value.
			// We don't necessarily want to regenerate it with
			// each page load since a page could contain embedded
			// sub-pages causing this feature to fail
			if (isset($_COOKIE[$this->CSRFCookieName]) && is_string($_COOKIE[$this->CSRFCookieName]) && preg_match('#^[0-9a-f]{32}$#iS', $_COOKIE[$this->CSRFCookieName]) === 1
			)
			{
				return $this->CSRFHash = $_COOKIE[$this->CSRFCookieName];
			}

			$rand           = random_bytes(16);
			$this->CSRFHash = bin2hex($rand);
		}

		return $this->CSRFHash;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Sanitize Filename
	 *
	 * Tries to sanitize filenames in order to prevent directory traversal attempts
	 * and other security threats, which is particularly useful for files that
	 * were supplied via user input.
	 *
	 * If it is acceptable for the user input to include relative paths,
	 * e.g. file/in/some/approved/folder.txt, you can set the second optional
	 * parameter, $relative_path to TRUE.
	 *
<<<<<<< HEAD
	 * @param string  $str          Input file name
	 * @param boolean $relativePath Whether to preserve paths
	 *
	 * @return string
	 */
	public function sanitizeFilename(string $str, bool $relativePath = false): string
	{
		// List of sanitize filename strings
		$bad = [
			'../',
			'<!--',
			'-->',
			'<',
			'>',
			"'",
			'"',
			'&',
			'$',
			'#',
			'{',
			'}',
			'[',
			']',
			'=',
			';',
			'?',
			'%20',
			'%22',
			'%3c',
			'%253c',
			'%3e',
			'%0e',
			'%28',
			'%29',
			'%2528',
			'%26',
			'%24',
			'%3f',
			'%3b',
			'%3d',
		];

		if (! $relativePath)
=======
	 * @param string  $str           Input file name
	 * @param boolean $relative_path Whether to preserve paths
	 *
	 * @return string
	 */
	public function sanitizeFilename(string $str, bool $relative_path = false): string
	{
		$bad = $this->filenameBadChars;

		if (! $relative_path)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$bad[] = './';
			$bad[] = '/';
		}

		$str = remove_invisible_characters($str, false);

		do
		{
			$old = $str;
			$str = str_replace($bad, '', $str);
		}
		while ($old !== $str);

		return stripslashes($str);
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD

	/**
	 * Generates the CSRF Hash.
	 *
	 * @return string
	 */
	protected function generateHash(): string
	{
		if (is_null($this->hash))
		{
			// If the cookie exists we will use its value.
			// We don't necessarily want to regenerate it with
			// each page load since a page could contain embedded
			// sub-pages causing this feature to fail
			if (isset($_COOKIE[$this->cookieName])
				&& is_string($_COOKIE[$this->cookieName])
				&& preg_match('#^[0-9a-f]{32}$#iS', $_COOKIE[$this->cookieName]) === 1
			)
			{
				return $this->hash = $_COOKIE[$this->cookieName];
			}

			$this->hash = bin2hex(random_bytes(16));
		}

		return $this->hash;
	}

	//--------------------------------------------------------------------

	/**
	 * CSRF Send Cookie
	 *
	 * @param RequestInterface $request
	 *
	 * @return             Security|false
	 * @codeCoverageIgnore
	 */
	protected function sendCookie(RequestInterface $request)
	{
		$config = new App();

		$expires = $this->isExpired() ? $this->expires : time() + $this->expires;
		$path    = $config->cookiePath ?? '/';
		$domain  = $config->cookieDomain ?? '';
		$secure  = $config->cookieSecure ?? false;

		if ($secure && ! $request->isSecure())
		{
			return false;
		}

		if (PHP_VERSION_ID < 70300)
		{
			// In PHP < 7.3.0, there is a "hacky" way to set the samesite parameter
			$samesite = '';

			if (! empty($this->samesite))
			{
				$samesite = '; samesite=' . $this->samesite;
			}

			setcookie($this->cookieName, $this->hash, $expires, $path . $samesite, $domain, $secure, true);
		}
		else
		{
			// PHP 7.3 adds another function signature allowing setting of samesite
			$params = [
				'expires'  => $expires,
				'path'     => $path,
				'domain'   => $domain,
				'secure'   => $secure,
				'httponly' => true, // Enforce HTTP only cookie for security
			];

			if (! empty($this->samesite))
			{
				$params['samesite'] = $this->samesite;
			}

			// @phpstan-ignore-next-line @todo ignore to be removed in 4.1 with rector 0.9
			setcookie($this->cookieName, $this->hash, $params);
		}

		log_message('info', 'CSRF cookie sent.');

		return $this;
	}
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
