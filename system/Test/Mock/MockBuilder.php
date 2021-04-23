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

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\ConnectionInterface;

<<<<<<< HEAD
class MockBuilder extends BaseBuilder
{
=======
class MockBuilder extends BaseBuilder {

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public function __construct($tableName, ConnectionInterface &$db, array $options = null)
	{
		parent::__construct($tableName, $db, $options);
	}
<<<<<<< HEAD
=======

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
