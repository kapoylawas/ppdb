<<<<<<< HEAD
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Images\Handlers\GDHandler;
use CodeIgniter\Images\Handlers\ImageMagickHandler;
=======
<?php namespace Config;

use CodeIgniter\Config\BaseConfig;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

class Images extends BaseConfig
{
	/**
	 * Default handler used if no other handler is specified.
	 *
	 * @var string
	 */
	public $defaultHandler = 'gd';

	/**
	 * The path to the image library.
	 * Required for ImageMagick, GraphicsMagick, or NetPBM.
	 *
	 * @var string
	 */
	public $libraryPath = '/usr/local/bin/convert';

	/**
	 * The available handler classes.
	 *
<<<<<<< HEAD
	 * @var array<string, string>
	 */
	public $handlers = [
		'gd'      => GDHandler::class,
		'imagick' => ImageMagickHandler::class,
=======
	 * @var \CodeIgniter\Images\Handlers\BaseHandler[]
	 */
	public $handlers = [
		'gd'      => \CodeIgniter\Images\Handlers\GDHandler::class,
		'imagick' => \CodeIgniter\Images\Handlers\ImageMagickHandler::class,
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	];
}
