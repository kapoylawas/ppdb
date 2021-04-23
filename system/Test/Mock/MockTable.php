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

use BadMethodCallException;
use CodeIgniter\View\Table;

class MockTable extends Table
{
=======
<?php namespace CodeIgniter\Test\Mock;

class MockTable extends \CodeIgniter\View\Table {

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	// Override inaccessible protected method
	public function __call($method, $params)
	{
		if (is_callable([$this, '_' . $method]))
		{
			return call_user_func_array([$this, '_' . $method], $params);
		}

		throw new BadMethodCallException('Method ' . $method . ' was not found');
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
