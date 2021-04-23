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

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Security\Security;

class MockSecurity extends Security
{
<<<<<<< HEAD
	public function sendCookie(RequestInterface $request)
	{
		$_COOKIE['csrf_cookie_name'] = $this->hash;

		return $this;
	}
=======
	public function CSRFSetCookie(RequestInterface $request)
	{
		$_COOKIE['csrf_cookie_name'] = $this->CSRFHash;

		return $this;
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
