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

use CodeIgniter\Log\Handlers\FileHandler;
=======
<?php namespace CodeIgniter\Test\Mock;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Class MockFileLogger
 *
 * Extends FileHandler, exposing some inner workings
 */
<<<<<<< HEAD
class MockFileLogger extends FileHandler
=======

class MockFileLogger extends \CodeIgniter\Log\Handlers\FileHandler
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	/**
	 * Where would the log be written?
	 */
	public $destination;

	//--------------------------------------------------------------------

	public function __construct(array $config)
	{
		parent::__construct($config);
		$this->handles     = $config['handles'] ?? [];
		$this->destination = $this->path . 'log-' . date('Y-m-d') . '.' . $this->fileExtension;
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
