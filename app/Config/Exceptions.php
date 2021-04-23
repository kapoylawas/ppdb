<<<<<<< HEAD
<?php

namespace Config;
=======
<?php namespace Config;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Config\BaseConfig;

/**
 * Setup how the exception handler works.
<<<<<<< HEAD
 */
class Exceptions extends BaseConfig
{
	/**
	 * --------------------------------------------------------------------------
	 * LOG EXCEPTIONS?
	 * --------------------------------------------------------------------------
	 * If true, then exceptions will be logged
	 * through Services::Log.
	 *
	 * Default: true
	 *
	 * @var boolean
	 */
	public $log = true;

	/**
	 * --------------------------------------------------------------------------
	 * DO NOT LOG STATUS CODES
	 * --------------------------------------------------------------------------
	 * Any status codes here will NOT be logged if logging is turned on.
	 * By default, only 404 (Page Not Found) exceptions are ignored.
	 *
	 * @var array
	 */
	public $ignoreCodes = [404];

	/**
	 * --------------------------------------------------------------------------
	 * Error Views Path
	 * --------------------------------------------------------------------------
	 * This is the path to the directory that contains the 'cli' and 'html'
	 * directories that hold the views used to generate errors.
	 *
	 * Default: APPPATH.'Views/errors'
	 *
	 * @var string
	 */
=======
 *
 * @package Config
 */
class Exceptions extends BaseConfig
{
	/*
	 |--------------------------------------------------------------------------
	 | LOG EXCEPTIONS?
	 |--------------------------------------------------------------------------
	 | If true, then exceptions will be logged
	 | through Services::Log.
	 |
	 | Default: true
	 */
	public $log = true;

	/*
	 |--------------------------------------------------------------------------
	 | DO NOT LOG STATUS CODES
	 |--------------------------------------------------------------------------
	 | Any status codes here will NOT be logged if logging is turned on.
	 | By default, only 404 (Page Not Found) exceptions are ignored.
	 */
	public $ignoreCodes = [ 404 ];

	/*
	|--------------------------------------------------------------------------
	| Error Views Path
	|--------------------------------------------------------------------------
	| This is the path to the directory that contains the 'cli' and 'html'
	| directories that hold the views used to generate errors.
	|
	| Default: APPPATH.'Views/errors'
	*/
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public $errorViewPath = APPPATH . 'Views/errors';
}
