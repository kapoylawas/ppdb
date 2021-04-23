<?php

/**
<<<<<<< HEAD
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
 * Common Functions for testing
 *
 * Several application-wide utility methods.
 *
 * @package  CodeIgniter
 * @category Common Functions
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

if (! function_exists('is_cli'))
{
	/**
	 * Is CLI?
	 *
	 * Test to see if a request was made from the command line.
	 * You can set the return value for testing.
	 *
<<<<<<< HEAD
	 * @param  boolean $newReturn return value to set
	 * @return boolean
	 */
	function is_cli(bool $newReturn = null): bool
	{
		// PHPUnit always runs via CLI.
		static $returnValue = true;

		if ($newReturn !== null)
		{
			$returnValue = $newReturn;
		}

		return $returnValue;
	}
}
=======
	 * @param  boolean $new_return return value to set
	 * @return boolean
	 */
	function is_cli(bool $new_return = null): bool
	{
		// PHPUnit always runs via CLI.
		static $return_value = true;

		if ($new_return !== null)
		{
			$return_value = $new_return;
		}

		return $return_value;
	}
}

//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
