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

use CodeIgniter\HTTP\Response;

/**
 * Class MockResponse
 */
class MockResponse extends Response
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * If true, will not write output. Useful during testing.
	 *
	 * @var boolean
	 */
	protected $pretend = true;

	// for testing
	public function getPretend()
	{
		return $this->pretend;
	}

	// artificial error for testing
	public function misbehave()
	{
		$this->statusCode = 0;
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
