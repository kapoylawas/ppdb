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

use CodeIgniter\Language\Language;

class MockLanguage extends Language
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Stores the data that should be
	 * returned by the 'requireFile()' method.
	 *
	 * @var mixed
	 */
	protected $data;

	//--------------------------------------------------------------------

	/**
	 * Sets the data that should be returned by the
	 * 'requireFile()' method to allow easy overrides
	 * during testing.
	 *
	 * @param array       $data
	 * @param string      $file
	 * @param string|null $locale
	 *
	 * @return $this
	 */
	public function setData(string $file, array $data, string $locale = null)
	{
		$this->language[$locale ?? $this->locale][$file] = $data;

		return $this;
	}

	//--------------------------------------------------------------------

	/**
	 * Provides an override that allows us to set custom
	 * data to be returned easily during testing.
	 *
	 * @param string $path
	 *
<<<<<<< HEAD
	 * @return array
=======
	 * @return array|mixed
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected function requireFile(string $path): array
	{
		return $this->data ?? [];
	}

	//--------------------------------------------------------------------

	/**
	 * Arbitrarily turnoff internationalization support for testing
	 */
	public function disableIntlSupport()
	{
		$this->intlSupport = false;
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
