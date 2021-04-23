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

namespace CodeIgniter\Images\Exceptions;
=======
<?php namespace CodeIgniter\Images\Exceptions;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class ImageException extends FrameworkException implements ExceptionInterface
{
	public static function forMissingImage()
	{
		return new static(lang('Images.sourceImageRequired'));
	}

	public static function forFileNotSupported()
	{
		return new static(lang('Images.fileNotSupported'));
	}

	public static function forMissingAngle()
	{
		return new static(lang('Images.rotationAngleRequired'));
	}

	public static function forInvalidDirection(string $dir = null)
	{
		return new static(lang('Images.invalidDirection', [$dir]));
	}

	public static function forInvalidPath()
	{
		return new static(lang('Images.invalidPath'));
	}

	public static function forEXIFUnsupported()
	{
		return new static(lang('Images.exifNotSupported'));
	}

	public static function forInvalidImageCreate(string $extra = null)
	{
		return new static(lang('Images.unsupportedImageCreate') . ' ' . $extra);
	}

	public static function forSaveFailed()
	{
		return new static(lang('Images.saveFailed'));
	}

	public static function forInvalidImageLibraryPath(string $path = null)
	{
		return new static(lang('Images.libPathInvalid', [$path]));
	}

	public static function forImageProcessFailed()
	{
		return new static(lang('Images.imageProcessFailed'));
	}
}
