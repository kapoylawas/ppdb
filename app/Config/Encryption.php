<?php
<<<<<<< HEAD

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Encryption configuration.
 *
 * These are the settings used for encryption, if you don't pass a parameter
 * array to the encrypter for creation/initialization.
 */
class Encryption extends BaseConfig
{
<<<<<<< HEAD
	/**
	 * --------------------------------------------------------------------------
	 * Encryption Key Starter
	 * --------------------------------------------------------------------------
	 *
	 * If you use the Encryption class you must set an encryption key (seed).
	 * You need to ensure it is long enough for the cipher and mode you plan to use.
	 * See the user guide for more info.
	 *
	 * @var string
	 */
	public $key = '';

	/**
	 * --------------------------------------------------------------------------
	 * Encryption Driver to Use
	 * --------------------------------------------------------------------------
	 *
	 * One of the supported encryption drivers.
	 *
	 * Available drivers:
	 * - OpenSSL
	 * - Sodium
	 *
	 * @var string
	 */
	public $driver = 'OpenSSL';

	/**
	 * --------------------------------------------------------------------------
	 * SodiumHandler's Padding Length in Bytes
	 * --------------------------------------------------------------------------
	 *
	 * This is the number of bytes that will be padded to the plaintext message
	 * before it is encrypted. This value should be greater than zero.
	 *
	 * See the user guide for more information on padding.
	 *
	 * @var integer
	 */
	public $blockSize = 16;

	/**
	 * --------------------------------------------------------------------------
	 * Encryption digest
	 * --------------------------------------------------------------------------
	 *
	 * HMAC digest to use, e.g. 'SHA512' or 'SHA256'. Default value is 'SHA512'.
	 *
	 * @var string
	 */
	public $digest = 'SHA512';
=======
	/*
	  |--------------------------------------------------------------------------
	  | Encryption Key Starter
	  |--------------------------------------------------------------------------
	  |
	  | If you use the Encryption class you must set an encryption key (seed).
	  | You need to ensure it is long enough for the cipher and mode you plan to use.
	  | See the user guide for more info.
	 */

	public $key = 'aBigsecret_ofAtleast32Characters';

	/*
	  |--------------------------------------------------------------------------
	  | Encryption driver to use
	  |--------------------------------------------------------------------------
	  |
	  | One of the supported drivers, eg 'OpenSSL' or 'Sodium'.
	  | The default driver, if you don't specify one, is 'OpenSSL'.
	 */
	public $driver = 'OpenSSL';

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
