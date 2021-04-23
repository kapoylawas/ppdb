<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

/**
 * -------------------------------------------------------------------
 * AUTO-LOADER
 * -------------------------------------------------------------------
<<<<<<< HEAD
 *
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 * This file defines the namespaces and class maps so the Autoloader
 * can find the files as needed.
 *
 * NOTE: If you use an identical key in $psr4 or $classmap, then
 * the values in this file will overwrite the framework's values.
 */
class Autoload extends AutoloadConfig
{
<<<<<<< HEAD
=======
	

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * -------------------------------------------------------------------
	 * Namespaces
	 * -------------------------------------------------------------------
	 * This maps the locations of any namespaces in your application to
	 * their location on the file system. These are used by the autoloader
	 * to locate files the first time they have been instantiated.
	 *
	 * The '/app' and '/system' directories are already mapped for you.
	 * you may change the name of the 'App' namespace if you wish,
	 * but this should be done prior to creating any namespaced classes,
	 * else you will need to modify all of those classes for this to work.
	 *
	 * Prototype:
	 *
	 *   $psr4 = [
	 *       'CodeIgniter' => SYSTEMPATH,
	 *       'App'	       => APPPATH
	 *   ];
	 *
<<<<<<< HEAD
	 * @var array<string, string>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public $psr4 = [
		APP_NAMESPACE => APPPATH, // For custom app namespace
		'Config'      => APPPATH . 'Config',
<<<<<<< HEAD
=======
		'Dompdf'      => APPPATH . 'ThirdParty/dompdf/src',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	];

	/**
	 * -------------------------------------------------------------------
	 * Class Map
	 * -------------------------------------------------------------------
	 * The class map provides a map of class names and their exact
	 * location on the drive. Classes loaded in this manner will have
	 * slightly faster performance because they will not have to be
	 * searched for within one or more directories as they would if they
	 * were being autoloaded through a namespace.
	 *
	 * Prototype:
	 *
	 *   $classmap = [
	 *       'MyClass'   => '/path/to/class/file.php'
	 *   ];
	 *
<<<<<<< HEAD
	 * @var array<string, string>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public $classmap = [];
}
