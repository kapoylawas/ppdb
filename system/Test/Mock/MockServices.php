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

use \CodeIgniter\Config\BaseService;
use CodeIgniter\Autoloader\FileLocator;

class MockServices extends BaseService
{
	public $psr4 = [
		'Tests/Support' => TESTPATH . '_support/',
	];

=======
<?php namespace CodeIgniter\Test\Mock;

use \CodeIgniter\Config\BaseService;

class MockServices extends BaseService
{

	public $psr4     = [
		'Tests/Support' => TESTPATH . '_support/',
	];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public $classmap = [];

	//--------------------------------------------------------------------

	public function __construct()
	{
		// Don't call the parent since we don't want the default mappings.
		// parent::__construct();
	}

	//--------------------------------------------------------------------
	public static function locator(bool $getShared = true)
	{
<<<<<<< HEAD
		return new FileLocator(static::autoloader());
	}
=======
		return new \CodeIgniter\Autoloader\FileLocator(static::autoloader());
	}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
