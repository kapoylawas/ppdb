<<<<<<< HEAD
<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\Test\Mock;

use Config\App;

class MockCLIConfig extends App
{
	public $baseURL = 'http://example.com/';
=======
<?php namespace CodeIgniter\Test\Mock;

class MockCLIConfig extends \Config\App
{
	public $baseURL = 'http://example.com';
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	public $uriProtocol = 'REQUEST_URI';

	public $cookiePrefix   = '';
	public $cookieDomain   = '';
	public $cookiePath     = '/';
	public $cookieSecure   = false;
	public $cookieHTTPOnly = false;
<<<<<<< HEAD
	public $cookieSameSite = 'Lax';
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	public $proxyIPs = '';

	public $CSRFProtection  = false;
	public $CSRFTokenName   = 'csrf_test_name';
	public $CSRFCookieName  = 'csrf_cookie_name';
	public $CSRFExpire      = 7200;
	public $CSRFRegenerate  = true;
	public $CSRFExcludeURIs = ['http://example.com'];
<<<<<<< HEAD
	public $CSRFSameSite    = 'Lax';
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	public $CSPEnabled = false;

	public $defaultLocale    = 'en';
	public $negotiateLocale  = false;
	public $supportedLocales = [
		'en',
		'es',
	];
}
