<?php
<<<<<<< HEAD

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\Encryption\Exceptions;

use CodeIgniter\Exceptions\DebugTraceableTrait;
use CodeIgniter\Exceptions\ExceptionInterface;
use RuntimeException;
=======
namespace CodeIgniter\Encryption\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

/**
 * Encryption exception
 */
<<<<<<< HEAD
class EncryptionException extends RuntimeException implements ExceptionInterface
{
	use DebugTraceableTrait;

	/**
	 * Thrown when no driver is present in the active encryption session.
	 *
	 * @return static
	 */
=======
class EncryptionException extends \RuntimeException implements ExceptionInterface
{

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public static function forNoDriverRequested()
	{
		return new static(lang('Encryption.noDriverRequested'));
	}

<<<<<<< HEAD
	/**
	 * Thrown when the handler requested is not available.
	 *
	 * @param string $handler
	 *
	 * @return static
	 */
	public static function forNoHandlerAvailable(string $handler)
	{
		return new static(lang('Encryption.noHandlerAvailable', [$handler]));
	}

	/**
	 * Thrown when the handler requested is unknown.
	 *
	 * @param string $driver
	 *
	 * @return static
	 */
=======
	public static function forNoHandlerAvailable()
	{
		return new static(lang('Encryption.noHandlerAvailable'));
	}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public static function forUnKnownHandler(string $driver = null)
	{
		return new static(lang('Encryption.unKnownHandler', [$driver]));
	}

<<<<<<< HEAD
	/**
	 * Thrown when no starter key is provided for the current encryption session.
	 *
	 * @return static
	 */
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public static function forNeedsStarterKey()
	{
		return new static(lang('Encryption.starterKeyNeeded'));
	}

<<<<<<< HEAD
	/**
	 * Thrown during data decryption when a problem or error occurred.
	 *
	 * @return static
	 */
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public static function forAuthenticationFailed()
	{
		return new static(lang('Encryption.authenticationFailed'));
	}
<<<<<<< HEAD

	/**
	 * Thrown during data encryption when a problem or error occurred.
	 *
	 * @return static
	 */
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public static function forEncryptionFailed()
	{
		return new static(lang('Encryption.encryptionFailed'));
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
