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
=======
<?php namespace CodeIgniter\Test\Mock;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Session\Session;

/**
 * Class MockSession
 *
 * Provides a safe way to test the Session class itself,
 * that doesn't interact with the session or cookies at all.
 */
class MockSession extends Session
{
	/**
	 * Holds our "cookie" data.
	 *
	 * @var array
	 */
	public $cookies = [];

	public $didRegenerate = false;

	//--------------------------------------------------------------------

	/**
	 * Sets the driver as the session handler in PHP.
	 * Extracted for easier testing.
	 */
	protected function setSaveHandler()
	{
		//        session_set_save_handler($this->driver, true);
	}

	//--------------------------------------------------------------------

	/**
	 * Starts the session.
	 * Extracted for testing reasons.
	 */
	protected function startSession()
	{
		//        session_start();
<<<<<<< HEAD
		$this->setCookie();
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	/**
	 * Takes care of setting the cookie on the client side.
	 * Extracted for testing reasons.
	 */
	protected function setCookie()
	{
<<<<<<< HEAD
		if (PHP_VERSION_ID < 70300)
		{
			$sameSite = '';
			if ($this->cookieSameSite !== '')
			{
				$sameSite = '; samesite=' . $this->cookieSameSite;
			}

			$this->cookies[] = [
				$this->sessionCookieName,
				session_id(),
				empty($this->sessionExpiration) ? 0 : time() + $this->sessionExpiration,
				$this->cookiePath . $sameSite, // Hacky way to set SameSite for PHP 7.2 and earlier
				$this->cookieDomain,
				$this->cookieSecure,
				true,
			];
		}
		else
		{
			// PHP 7.3 adds another function signature allowing setting of samesite
			$params = [
				'expires'  => empty($this->sessionExpiration) ? 0 : time() + $this->sessionExpiration,
				'path'     => $this->cookiePath,
				'domain'   => $this->cookieDomain,
				'secure'   => $this->cookieSecure,
				'httponly' => true,
			];

			if ($this->cookieSameSite !== '')
			{
				$params['samesite'] = $this->cookieSameSite;
			}

			$this->cookies[] = [
				$this->sessionCookieName,
				session_id(),
				$params,
			];
		}
=======
		$this->cookies[] = [
			$this->sessionCookieName,
			session_id(),
			(empty($this->sessionExpiration) ? 0 : time() + $this->sessionExpiration),
			$this->cookiePath,
			$this->cookieDomain,
			$this->cookieSecure,
			true,
		];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	//--------------------------------------------------------------------

	public function regenerate(bool $destroy = false)
	{
		$this->didRegenerate              = true;
		$_SESSION['__ci_last_regenerate'] = time();
	}

	//--------------------------------------------------------------------
}
