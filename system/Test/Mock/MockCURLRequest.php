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

use CodeIgniter\HTTP\CURLRequest;

/**
 * Class MockCURLRequest
 *
 * Simply allows us to not actually call cURL during the
 * test runs. Instead, we can set the desired output
 * and get back the set options.
 */
class MockCURLRequest extends CURLRequest
{
<<<<<<< HEAD
	public $curl_options;

=======

	public $curl_options;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	protected $output = '';

	//--------------------------------------------------------------------

	public function setOutput($output)
	{
		$this->output = $output;

		return $this;
	}

	//--------------------------------------------------------------------

<<<<<<< HEAD
	protected function sendRequest(array $curlOptions = []): string
	{
		// Save so we can access later.
		$this->curl_options = $curlOptions;
=======
	protected function sendRequest(array $curl_options = []): string
	{
		// Save so we can access later.
		$this->curl_options = $curl_options;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		return $this->output;
	}

	//--------------------------------------------------------------------
	// for testing purposes only
	public function getBaseURI()
	{
		return $this->baseURI;
	}

	// for testing purposes only
	public function getDelay()
	{
		return $this->delay;
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
